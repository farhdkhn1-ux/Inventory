@extends('layouts.main')


@section('content')
@php $isEdit = isset($product); @endphp
<h1>{{ $isEdit ? 'Edit Data Barang' : 'Tambah Data Barang' }}</h1>
<form action="{{ $isEdit ? url('/products/update/'.$product->id) : url('/products') }}" method="POST">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="name" name="name" 
        value="{{ old('name', $product->name ?? '') }}" required>
    </div> 
    <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" class="form-control" id="price" name="price" 
        value="{{ old('price', $product->price ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stock" name="stock" 
        value="{{ old('stock', $product->stock ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') 
                == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach 
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="">Pilih Status</option>
            <option value="tersedia" {{ old('status', $product->status ?? '') 
            == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="habis" {{ old('status', $product->status ?? '') 
            == 'habis' ? 'selected' : '' }}>Habis</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
</form>

@endsection