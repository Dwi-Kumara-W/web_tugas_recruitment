@extends('layouts.mainlayout')
@section('title', 'Order | Edit')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="/order/{{ $order->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="target">Target</label>
                <input type="text" class="form-control" name="target" id="target" value="{{ $order->target }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                    value="{{ $order->nama_produk }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_aksi">Jumlah Aksi</label>
                <input type="number" class="form-control" name="jumlah_aksi" id="jumlah_aksi"
                    value="{{ $order->jumlah_aksi }}" required>
            </div>

            <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="{{ $order->status }}">{{ $order->status }}</option>
                    @if ($order->status == 'PENDING')
                        <option value="PROSES">PROSES</option>
                        <option value="SUCCES">SUCCES</option>
                    @elseif ($order->status == 'PROSES')
                        <option value="PENDING">PENDING</option>
                        <option value="SUCCES">SUCCES</option>
                    @elseif ($order->status == 'SUCCES')
                        <option value="PENDING">PENDING</option>
                        <option value="PROSES">PROSES</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>

    </div>
@endsection
