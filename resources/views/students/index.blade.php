@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Students</h4>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->course->name }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <img src="{{ asset('images/students/'.$student->image) }}" width="70">
            </td>
            <td>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection