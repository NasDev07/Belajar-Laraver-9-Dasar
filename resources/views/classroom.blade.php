@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
    <h1>Ini Halaman Class</h1>
    <div class="my-4">
        <a href="#" class="btn btn-primary btn-sm">Add Data</a>
    </div>
    <h3>Class List</h3>
    <div class="table-responsive">
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>

                    {{-- <th scope="col">Student</th>
                    <th scope="col">Homeroom Teacher</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($classList as $data)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="/class-detail/{{ $data->id }}" class="btn btn-info btn-sm">Detail</a>
                        </td>

                        {{-- <td>
                            @foreach ($data->students as $student)
                                - {{ $student['name'] }} <br>
                            @endforeach
                        </td>
                        <td>{{ $data->homeroomTeacher->name }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
