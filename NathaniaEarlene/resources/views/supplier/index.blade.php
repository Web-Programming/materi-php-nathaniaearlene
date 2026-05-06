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
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @for ($i = 0; $i < count($products); $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $products[$i]['name'] }}</td>
                        <td>{{ number_format($products[$i]['price'], 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ url('/produk/' . $products[$i]['id'] )}}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ url('/produk/' . $products[$i]['id'] . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endfor --}}
                @foreach ($supplier as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>
                            <a href="{{ url('/supplier/' . $item['id'] )}}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ url('/supplier/' . $item['id'] . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection