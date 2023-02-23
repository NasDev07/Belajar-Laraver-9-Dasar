@extends('layouts.mainlayout')

@section('title', 'Students Del')

@section('content')

    <div class="mt-4">
        <h2>Are you sure to delete data : {{ $student->name }} ({{ $student->nis }})</h2>

        <form class="d-inline-block" action="/student-destroy/{{ $student->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
        <a href="/students" class="btn btn-primary btn-sm">Cance</a>
    </div>

@endsection
