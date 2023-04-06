@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')
<h1>Ini Halaman Students</h1>
<div class="my-4 d-flex justify-content-between">
    <a href="/student-add" class="btn btn-primary btn-sm">Add Data</a>
    <a href="/students-deleted" class="btn btn-info btn-sm">Show Deleted Data</a>
</div>

{{-- notifikasi --}}
@if (Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<h3>Student List</h3>

{{-- Search --}}
<div class="my-3 col-12 col-sm-8 col-md-5">
    <form action="" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="Keyword" aria-label="Keyword">
            <button class="input-group-text btn btn-primary" id="basic-addon1">Search</button>
        </div>
    </form>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Nis</th>
                <th scope="col">Class</th>
                <th scope="col">Action</th>

                {{-- <th scope="col">Class</th>
                <th scope="col">Extracurriculars</th>
                <th scope="col">Homerrom Teacher</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
            <tr class="table-hover">
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->gende }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->class->name }}</td>
                <td>
                    @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 3)
                    -
                    @else
                    <a href="student-detail/{{ $data->slug }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="student-edit/{{ $data->id }}" class="btn btn-primary btn-sm">Edit</a>
                    @endif

                    @if (Auth::user()->role_id == 1)
                    <a href="student-delete/{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a>
                    @endif
                </td>

                {{-- <td>{{ $data->class['name'] }}</td>
                <td>
                    @foreach ($data->extracurriculars as $item)
                    - {{ $item->name }} <br>
                    @endforeach
                </td>
                <td>{{ $data->class->homeroomTeacher->name }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-4">
        {{ $studentList->withQueryString()->links() }}
    </div>
</div>
@endsection
