@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')

    <div class="mt-5">
        <h2>Are you sure to delete data : {{ $user->name }}</h2>

        <form style="display: inline-block" action="/account-destroy/{{ $user->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="/account" class="btn btn-primary">Cancel</a>
    </div>

@endsection
