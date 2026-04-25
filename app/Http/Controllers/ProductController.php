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
}
