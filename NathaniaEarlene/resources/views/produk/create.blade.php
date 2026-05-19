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
        <p>Nama Produk: <input type="text" class="form-control mb-3" placeholder="tambah produk..."> <p>
        <p>Price: <input type="number" class="form-control mb-3" placeholder="tambah harga..."> <p>
        <p>Description: <input type="text" class="form-control mb-3" placeholder="tambah deskripsi..."> <p>
        <p>Status: <input type="text" class="form-control mb-3" placeholder="tambah status..."> <p>
        <p>Aktif: <input type="text" class="form-control mb-3" placeholder="tambah aktif..."> <p>
        <p>Tanggal Rilis: <input type="text" class="form-control mb-3" placeholder="tambah tanggal rilis..."> <p>
        <button class="btn btn-primary">Simpan</button>
    <hr>
</div>
@endsection
