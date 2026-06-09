<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function insert(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable|string|in:tersedia,habis',
        ]);

        Produk::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'description' => '',
            'status' => $request->status ?: 'tersedia',
        ]);

        return redirect('/products')->with('success', 'Product created successfully.');
    }

    // If GET, create with default values
    $product = new Produk();
    $product->category_id = 1;
    $product->name = 'Nama Produk Baru';
    $product->price = 50000;
    $product->stock = 10;
    $product->description = 'Deskripsi produk';
    $product->status = 'tersedia';
    $product->save();

    return redirect('/products');
}

    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        $categories = Category::all();
        return view('products.create', compact('categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable|string|in:tersedia,habis',
        ]);

        $product = Produk::findOrFail($id);
        $product->update([
            
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'description' => '',
            'status' => $request->status ?: 'tersedia',
        ]);

        return redirect('/products')->with('success', 'Product updated successfully.');
    }

public function destroy($id)
{
    $product = Produk::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}

public function create()
{
    $categories = Category::all();
    return view('products.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'status' => 'nullable|string|in:tersedia,habis',
    ]);

    Produk::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => $request->category_id,
        'description' => '',
        'status' => $request->status ?: 'tersedia',
    ]);

    return redirect('/products')->with('success', 'Product created successfully.');
}
}
