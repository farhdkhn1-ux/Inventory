<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function insert()
{
    $product = new Produk();
    $product->category_id = 1;
    $product->name = 'Nama Produk Baru';
    $product->price = 50000;
    $product->stock = 10;
    $product->description = 'Deskripsi produk';
    $product->status = 'tersedia';
    $product->save();

    return redirect('/products');  // ganti ini
}

    public function update($id)
{
    $product = Produk::find($id);
    $product->name = 'Nama Produk Diupdate';
    $product->price = 75000;
    $product->save();

    return redirect('/products');  // ganti ini
}

public function delete($id)
{
    $product = Produk::find($id);
    $product->delete();

    return redirect('/products');  // ganti ini
}
}