@extends('layouts.mainlayout')
@section('title', 'Daftar Akun | Add New')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form method="POST" action="register" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="name" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="device">Device</label>
                <select name="device_id" id="device" class="form-control" required>
                    <option value="">Select One</option>
                    {{-- @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary form-control" type="submit">Daftar</button>
            </div>
        </form>

    </div>
@endsection
