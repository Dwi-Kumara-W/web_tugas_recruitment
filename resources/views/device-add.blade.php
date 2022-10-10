@extends('layouts.mainlayout')
@section('title', 'Student | Add New')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="device" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>


            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>

    </div>
@endsection
