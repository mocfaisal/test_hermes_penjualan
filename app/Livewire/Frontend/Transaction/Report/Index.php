<?php

namespace App\Livewire\Frontend\Transaction\Report;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Table\transaction as tr_transaction;
use App\Models\Table\transaction_detail as tr_transaction_detail;
use App\Models\Table\m_product;
use Barryvdh\DomPDF\Facade\Pdf;
use Nette\Utils\Random;

class Index extends Component {
    public $user_id = null;
    public $date_start = null;
    public $date_end = null;

    function __construct() {
        $this->user_id = session()->get('user_id');
    }

    public function render() {
        return view('livewire.frontend.transaction.report.index')->layout('components.layouts.frontend.portal.main');
    }

    function searchData() {
        $data = $this->dataCart();
        return $data;
    }

    function printReport() {
        $this->skipRender();

        $filename = Random::generate(10) . '.pdf';

        // $pdf = PDF::loadview('livewire.frontend.transaction.report.reportViewPDF', ['viewData' => $this->searchData()]);
        // return response()->streamDownload(function () use ($pdf) {
        //     echo $pdf->stream();
        // }, $filename);


        $pdfContent = PDF::loadview(
            'livewire.frontend.transaction.report.reportViewPDF',
            [
                'viewData' => $this->searchData(),
                'date' => ['start' => $this->date_start, 'end' => $this->date_end]
            ]
        )->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            $filename
        );
    }

    #[Computed]
    function dataCart() {
        $new_data = null;

        if ($this->date_start > $this->date_end) {
            $this->date_start = $this->date_end;
        }

        if (!empty($this->date_start) && !empty($this->date_end)) {
            $data =  tr_transaction::select('*')
                ->where('id_user', $this->user_id)
                // ->where('status', 'complete')
                ->whereBetween('tgl_trx', [$this->date_start, $this->date_end])
                ->get();

            foreach ($data as $key => $val) {
                $val->detail = tr_transaction_detail::where('id_transaction', $val->id)->get();
                $new_data[] = $val;
            }
            return $new_data;
        } else {
            return false;
        }
    }
}
