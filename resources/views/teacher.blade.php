@extends('layouts.mainlayout')

@section('title', 'Teacher')

@section('content')
    <h1>Halaman Teacher</h1>

    <div class="my-4">
        <a href="#" class="btn btn-primary btn-sm">Add Data</a>
    </div>

    <h3>Data List Teacher</h3>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacherList as $data)
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="/teacher-detail/{{ $data->id }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
