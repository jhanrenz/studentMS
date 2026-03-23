@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <h4 class="mb-3">Edit Course</h4>

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" name="name" class="form-control" value="{{ $course->name }}">

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection