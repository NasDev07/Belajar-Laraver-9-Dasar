@extends('layouts.mainlayout')

@section('title', 'Students Detail')

@section('content')

    <h2>Anda Sedang Melihat Data Detail dari Siswa {{ $student->name }}</h2>

    <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Class</th>
                    <th scope="col">Homeroom Teacher</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td>{{ $student->nis }}</td>
                    <td>
                        @if ($student->gende == 'P')
                            Perempuan
                        @else
                            Laki-Laki
                        @endif
                    </td>
                    <td>{{ $student->class->name }}</td>
                    <td>{{ $student->class->homeroomTeacher->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <h3>Extracurriculars</h3>
        <ol>
            @foreach ($student->extracurriculars as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
