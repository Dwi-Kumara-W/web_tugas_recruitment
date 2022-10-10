@extends('layouts.mainlayout')
@section('title', 'Orders')

@section('content')
    <h1>Ini Halaman Orders</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="order-add" class="btn btn-primary">Add Data</a>
        {{-- <a href="student-deleted" class="btn btn-info">Show Deleted Data</a> --}}
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Orders List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="keyword">
                <button class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Target</th>
                <th>Nama Produk</th>
                <th>Jumlah Aksi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->target }}</td>
                    <td>{{ $order->nama_produk }}</td>
                    <td>{{ $order->jumlah_aksi }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="order-edit/{{ $order->id }}">edit</a>
                        <a href="order-delete/{{ $order->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->withQueryString()->links() }}
@endsection
