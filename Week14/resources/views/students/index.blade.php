@extends('layouts.app')
@section('title','Students')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Students</h1>
  <a href="{{ route('students.create') }}" class="btn btn-primary">Create Student</a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($students as $student)
            <tr>
              <td>{{ $student->id }}</td>
              <td>
                <a href="{{ route('students.show', $student) }}">
                  {{ $student->fname }} {{ $student->lname }}
                </a>
              </td>
              <td>{{ $student->email }}</td>
              <td class="text-end">
                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this student?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center p-4">No students found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $students->links() }}
</div>
@endsection
