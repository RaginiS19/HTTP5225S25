@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Student Details</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>First Name:</strong> {{ $student->fname }}
            </div>
            <div class="mb-3">
                <strong>Last Name:</strong> {{ $student->lname }}
            </div>
            <div class="mb-3">
                <strong>Email:</strong> {{ $student->email }}
            </div>
            <div class="mb-3">
                <strong>Created At:</strong> {{ $student->created_at }}
            </div>
            <div class="mb-3">
                <strong>Updated At:</strong> {{ $student->updated_at }}
            </div>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection