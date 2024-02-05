<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_product extends Model {
    use HasFactory;
    protected $table = "m_product";
    protected $id = "id";
    // protected $fillable = ['*'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
