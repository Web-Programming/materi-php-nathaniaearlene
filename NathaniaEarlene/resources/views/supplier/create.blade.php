@extends('app.master')

@section('title', $title)

@section('sidebar')
    @parent
    @section('submenu-supplier')
        <a href="/supplier/create" class="list-group-item list-group-item-action ps-4>">Tambah Supplier</a>
        <a href="/supplier/search" class="list-group-item list-group-item-action ps-4>">Cari Supplier</a>
    @endsection

@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">{{ $title }}</h1>

    <div class="tabel-responsive">
        
    </div>
</div>
@endsection