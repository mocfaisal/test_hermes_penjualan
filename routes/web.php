<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
})->name('frontend.home');

Route::get('/admin', function () {
    return redirect()->route('backend.home');
});

Route::group(['namespace' => 'App'], function () {
    Route::group(['namespace' => 'Livewire'], function () {
        Route::group(['namespace' => 'Frontend'], function () {
            Route::group(['namespace' => 'Home'], function () {
                Route::prefix('home')->group(function () {
                    Route::get('/', Index::class)->name('home');
                });
            });



            Route::group(['namespace' => 'Transaction'], function () {
                Route::prefix('transaction')->group(function () {
                    Route::group(['namespace' => 'Cart'], function () {
                        Route::prefix('cart')->group(function () {
                            Route::get('/', Index::class)->name('cart.index');
                        });
                    });

                    Route::group(['namespace' => 'Checkout'], function () {
                        Route::prefix('checkout')->group(function () {
                            Route::get('/', Index::class)->name('checkout.index');
                        });
                    });

                    Route::group(['namespace' => 'Report'], function () {
                        Route::prefix('report')->group(function () {
                            Route::get('/', Index::class)->name('report.index');
                        });
                    });
                });
            });

            Route::group(['namespace' => 'Product'], function () {
                Route::prefix('product')->group(function () {
                    Route::get('/', Index::class)->name('product.index');
                    Route::get('/detail/{id_product}', Detail::class)->name('product.detail');
                });
            });

            Route::group(['namespace' => 'Auth'], function () {
                Route::prefix('auth')->group(function () {
                    Route::get('/logout', 'Login@logout')->name('frontend.auth.logout');

                    Route::middleware('guest')->group(function () {
                        Route::prefix('login')->group(function () {
                            Route::get('/', Login::class)->name('frontend.auth.login');
                        });

                        // Route::prefix('register')->group(function () {
                        //     Route::get('/', Register::class)->name('frontend.auth.register');
                        // });

                        // Route::group(['namespace' => 'ForgotPass'], function () {
                        //     Route::prefix('forgot_pass')->group(function () {
                        //         Route::get('/', Index::class)->name('frontend.auth.forgot_pass');
                        //         Route::get('/reset-password/{token}', Reset::class)->name('password.reset');
                        //     });
                        // });
                    });
                });
            });
        });

        Route::group(['namespace' => 'Backend'], function () {
            Route::prefix('admin')->group(function () {
                Route::middleware('auth.admin')->group(function () {
                    Route::group(['namespace' => 'Home'], function () {
                        Route::prefix('home')->group(function () {
                            Route::get('/', Index::class)->name('backend.home');
                        });
                    });

                    Route::group(['namespace' => 'Master'], function () {
                        Route::prefix('master')->group(function () {
                            Route::group(['namespace' => 'Product'], function () {
                                Route::prefix('product')->group(function () {
                                    Route::get('/', Index::class)->name('backend.admin.master.product');
                                    Route::post('/table', 'Index@getData')->name('backend.admin.master.product.getData.table');
                                });
                            });
                        });
                    });
                });

                Route::group(['namespace' => 'Auth'], function () {
                    Route::prefix('auth')->group(function () {
                        Route::get('/logout', 'Login@logout')->name('backend.auth.logout');

                        Route::middleware('guest')->group(function () {
                            Route::prefix('login')->group(function () {
                                Route::get('/', Login::class)->name('backend.auth.login');
                            });
                        });
                    });
                });
            });
        });
    });
});


Route::get('/login', function () {
    return redirect()->route('frontend.auth.login');
})->name('auth.login');

Route::get('/logout', function () {
    return redirect()->route('frontend.auth.logout');
})->name('auth.logout');

Route::get('/admin/login', function () {
    return redirect()->route('backend.auth.login');
});

Route::get('/admin/logout', function () {
    return redirect()->route('backend.auth.logout');
});
