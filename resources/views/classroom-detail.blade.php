@extends('layouts.mainlayout')

@section('title', 'Class Detail')

@section('content')

    <h2>Anda sedang meliat data dari Class {{ $class->name }}</h2>

    <div class="mt-5">
        <strong> Homeroom Teacher : </strong>{{ $class->homeroomTeacher->name }}
    </div>

    <div class="mt-4">
        <h4>List Students</h4>
        <ol>
            @foreach ($class->students as $item)
                <li>
                    {{ $item->name }}
                </li>
            @endforeach
        </ol>
    </div>

@endsection
