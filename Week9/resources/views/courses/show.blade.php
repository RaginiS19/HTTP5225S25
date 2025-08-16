@extends('layouts.app')
@section('title', $course->name)

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <strong>{{ $course->name }}</strong>
        <div>
          <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-3">Course Name</dt>
          <dd class="col-sm-9">{{ $course->name }}</dd>
          <dt class="col-sm-3">Description</dt>
          <dd class="col-sm-9">{{ $course->description ?? '—' }}</dd>
          <dt class="col-sm-3">Professor</dt>
          <dd class="col-sm-9">
            @if($course->professor)
              <span class="badge bg-success">{{ $course->professor->name }}</span>
            @else
              <span class="text-muted">No professor assigned</span>
            @endif
          </dd>
          <dt class="col-sm-3">Enrolled Students</dt>
          <dd class="col-sm-9">
            @if($course->students->count() > 0)
              <div class="row">
                @foreach($course->students as $student)
                  <div class="col-md-6 mb-2">
                    <div class="card border-info">
                      <div class="card-body p-2">
                        <h6 class="card-title mb-1">{{ $student->fname }} {{ $student->lname }}</h6>
                        @if($student->email)
                          <small class="text-muted">{{ $student->email }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @else
              <span class="text-muted">No students enrolled</span>
            @endif
          </dd>
        </dl>
      </div>
      <div class="card-footer text-muted">
        Created {{ $course->created_at->diffForHumans() }} • Updated {{ $course->updated_at->diffForHumans() }}
      </div>
    </div>
  </div>
</div>
@endsection
