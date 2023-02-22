@extends('layouts.mainlayout')

@section('title', 'Teahteacher detailer')

@section('content')

    <h2>Anda Sedang Melihat Data Detail dari Teacher {{ $teacher->name }}</h2>

    <div class="mt-4">
        <h3>
            Class :
            @if ($teacher->class)
                {{ $teacher->class->name }}
            @else
                -
            @endif
        </h3>
    </div>

    <div class="mt-4">
        <h4>List Student</h4>
        @if ($teacher->class)
            <ol>
                @foreach ($teacher->class->students as $item)
                    <li>{{ $item->name }}</li>
                @endforeach
            </ol>
        @else
        @endif
    </div>


@endsection
