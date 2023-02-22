@extends('layouts.mainlayout')

@section('title', 'Extracurricular')

@section('content')
    <h1>Ini Halaman Extracurricular</h1>
    <div class="my-4">
        <a href="#" class="btn btn-primary btn-sm">Add Data</a>
    </div>
    <h3>Extracurricular List</h3>


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>

                    {{-- <th scope="col">Anggota</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($ekskulList as $data)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="/ektracurricular-detail/{{ $data->id }}" class="btn btn-info btn-sm">Detail</a>
                        </td>

                        {{-- <td>
                            @foreach ($data->students as $item)
                                - {{ $item->name }} <br>
                            @endforeach
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
