@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')

    <h3 class="mt-3">Student Deleted List</h3>
    <div class="my-4 d-flex justify-content-between">
        <a href="/students" class="btn btn-primary btn-sm">Back</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentDeleted as $data)
                    <tr class="table-hover">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->gende }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>
                            <a href="student/{{ $data->id }}/restore" class="btn btn-info btn-sm">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
