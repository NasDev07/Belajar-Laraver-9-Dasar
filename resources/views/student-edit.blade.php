@extends('layouts.mainlayout')

@section('title', 'Students Edit')

@section('content')
    <div class="mt-4 col-7 m-auto">
        <form action="/student/{{ $student->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                    value="{{ $student->name }}" required>
            </div>

            <div class="mb-3">
                <label for="gende" class="form-label">Gender</label>
                <select name="gende" id="gende" class="form-control">
                    <option value="{{ $student->gende }}">{{ $student->gende }}</option>
                    @if ($student->gende == 'L')
                        <option value="P">P</option>
                    @else
                        <option value="L">L</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS"
                    value="{{ $student->nis }}" required>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select name="class_id" id="class" class="form-control">
                    <option value="{{ $student->class->id }}">{{ $student->class->name }}</option>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control" id="photo" name="photo" value="{{ $item->image }}">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
