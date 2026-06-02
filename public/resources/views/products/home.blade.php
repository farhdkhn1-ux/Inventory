@extends('layouts.main')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height:50vh;">
    <div class="text-center">
        <h1 class="display-4">Inventory App</h1>
        <p class="lead text-muted">Selamat datang pada aplikasi inventaris sederhana Laravel.</p>
        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary me-2">Kelola Produk</a>
            <a href="{{ route('categories.index') }}" class="btn btn-success">Kelola Kategori</a>
        </div>
    </div>
</div>
@endsection
