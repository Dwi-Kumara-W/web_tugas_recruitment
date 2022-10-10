@extends('layouts.mainlayout')
@section('title', 'Daftar order | Add New')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form method="POST" action="order" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="target" class="form-label">target</label>
                <input type="text" name="target" id="target" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_aksi" class="form-label">Jumlah Aksi</label>
                <input type="number" name="jumlah_aksi" id="jumlah_aksi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="PENDING">PENDING</option>
                    <option value="PROSES">PROSES</option>
                    <option value="SUCCES">SUCCES</option>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary form-control" type="submit">Simpan</button>
            </div>
        </form>

    </div>
@endsection
