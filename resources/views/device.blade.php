@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')
    <h1>Ini Halaman Device</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="device-add" class="btn btn-primary">Add Data</a>
        {{-- <a href="student-deleted" class="btn btn-info">Show Deleted Data</a> --}}
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Device List</h3>

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
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $device)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $device->username }}</td>
                    <td>
                        {{-- <a href="device/{{ $device->id }}">detail</a>
                        <a href="device-edit/{{ $device->id }}">edit</a> --}}
                        <a href="device-delete/{{ $device->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $devices->withQueryString()->links() }}
@endsection
