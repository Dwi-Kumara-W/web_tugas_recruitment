@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')

    <div class="mt-5">
        <h2>Are you sure to delete data : {{ $device->username }}</h2>

        <form style="display: inline-block" action="/device-destroy/{{ $device->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>

@endsection
