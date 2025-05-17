<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Produk::create($request->all());
        return redirect('/produk');
    }

    public function edit(Produk $produk)
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks', 'produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $produk->update($request->all());
        return redirect('/produk');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('/produk');
    }
}


