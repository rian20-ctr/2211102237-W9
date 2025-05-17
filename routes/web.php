<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return redirect('/produk');
});

// Route resource untuk CRUD produk
Route::resource('produk', ProdukController::class);
