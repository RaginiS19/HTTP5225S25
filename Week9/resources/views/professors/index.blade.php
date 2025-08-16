@extends('layouts.app')
@section('title','Professors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Professors</h1>
  <a href="{{ route('professors.create') }}" class="btn btn-primary">Create Professor</a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Assigned Course</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($professors as $professor)
            <tr>
              <td>{{ $professor->id }}</td>
              <td>
                <a href="{{ route('professors.show', $professor) }}">
                  {{ $professor->name }}
                </a>
              </td>
              <td>
                @if($professor->course)
                  <span class="badge bg-primary">{{ $professor->course->name }}</span>
                @else
                  <span class="text-muted">No course assigned</span>
                @endif
              </td>
              <td class="text-end">
                <a href="{{ route('professors.edit', $professor) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('professors.destroy', $professor) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this professor?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center p-4">No professors found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $professors->links() }}
</div>
@endsection
