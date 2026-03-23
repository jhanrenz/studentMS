@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Courses</h4>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
</div>


<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this course?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection