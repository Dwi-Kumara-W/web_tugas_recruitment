@extends('layouts.mainlayout')
@section('title', 'Order')

@section('content')

    <div class="mt-5">
        <h2>Are you sure to delete data : {{ $order->nama_produk }}</h2>

        <form style="display: inline-block" action="/order-destroy/{{ $order->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="/orders" class="btn btn-primary">Cancel</a>
    </div>

@endsection
