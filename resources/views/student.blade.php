@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')
    <h1>Ini Halaman Students</h1>
    <div class="my-4">
        <a href="/student-add" class="btn btn-primary btn-sm">Add Data</a>
    </div>

    {{-- notifikasi --}}
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @elseif (Session::has('status'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Nis</th>
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
                        <td>
                            <a href="student-detail/{{ $data->id }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="student-edit/{{ $data->id }}" class="btn btn-primary btn-sm">Edit</a>
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
    </div>
@endsection
