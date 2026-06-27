@extends('app.master')

@section('title', $title)

@section('sidebar')
    @parent
    @section('submenu-produk')
        <a href="/produk/create" class="list-group-item list-group-item-action ps-4>">Tambah Produk</a>
        <a href="/produk/search" class="list-group-item list-group-item-action ps-4>">Cari Produk</a>
    @endsection

@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">{{ $title }}</h1>

    <p>Nama Produk: {{ $product['name'] }}</p>
    <p>ID Produk: {{ $product['id'] }}</p>
    <p>Price: Rp {{ number_format($product['price'], 2, ',', '.') }}</p>
    <p>Description: {{ $product['description'] }}</p>
    <p>Status: {{ $product['status'] }}</p>
    <p>Aktif: {{ $product['is_active'] }}</p>
    <p>Tanggal Rilis: {{ $product['release_date'] }}</p>
    <hr>
    <a href="{{ url('/produk') }}" class="btn  btn-primary">Kembali</a>
</div>
@endsection