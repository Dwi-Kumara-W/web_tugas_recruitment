@extends('layouts.mainlayout')
@section('title', 'Account')

@section('content')
    <h1>Ini Halaman Account</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="account-add" class="btn btn-primary">Add Data</a>
        {{-- <a href="student-deleted" class="btn btn-info">Show Deleted Data</a> --}}
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Account List</h3>

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
                <th>Name</th>
                <th>Email</th>
                <th>username device</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->device->username }}</td>
                    <td>
                        {{-- <a href="device/{{ $device->id }}">detail</a>
                        <a href="device-edit/{{ $device->id }}">edit</a> --}}
                        <a href="account-delete/{{ $user->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->withQueryString()->links() }}
@endsection
