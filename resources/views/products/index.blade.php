@extends('layouts.main')

@section('content')
<h1>Daftar Barang Inventaris</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@auth
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('products.insert') }}" class="btn btn-primary mb-3">Tambah Data otomatis</a>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    @endif
@endauth

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $products->firstItem() + $loop->index }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <td>Rp {{ number_format($p->price) }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->description ?? '-' }}</td>
            <td>{{ $p->status }}</td>
            <td>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Update</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                @else
                    <span class="text-muted">Hanya admin</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection
