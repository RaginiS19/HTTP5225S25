@extends('layouts.app')
@section('title','Courses')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Courses</h1>
  <a href="{{ route('courses.create') }}" class="btn btn-primary">Create Course</a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Professor</th>
            <th>Students</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($courses as $course)
            <tr>
              <td>{{ $course->id }}</td>
              <td>
                <a href="{{ route('courses.show', $course) }}">
                  {{ $course->name }}
                </a>
              </td>
              <td>{{ Str::limit($course->description, 50) ?? '—' }}</td>
              <td>
                @if($course->professor)
                  <span class="badge bg-success">{{ $course->professor->name }}</span>
                @else
                  <span class="text-muted">No professor assigned</span>
                @endif
              </td>
              <td>
                @if($course->students->count() > 0)
                  <span class="badge bg-info">{{ $course->students->count() }} students</span>
                @else
                  <span class="text-muted">No students enrolled</span>
                @endif
              </td>
              <td class="text-end">
                <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this course?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center p-4">No courses found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $courses->links() }}
</div>
@endsection
