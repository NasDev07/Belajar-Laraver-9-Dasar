@extends('layouts.mainlayout')

@section('title', 'Students | Add New')

@section('content')
    <div class="mt-4 col-7 m-auto">
        <form action="/student" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>

            <div class="mb-3">
                <label for="gende" class="form-label">Gender</label>
                <select name="gende" id="gende" class="form-control">
                    <option value="">Select One</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" required>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select name="class_id" id="class" class="form-control">
                    <option value="">Select Class</option>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Send</button>
            </div>
        </form>
    </div>

@endsection
