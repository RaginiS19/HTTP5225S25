@extends('layouts.app')
@section('title', $student->fname . ' ' . $student->lname)

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <strong>{{ $student->fname }} {{ $student->lname }}</strong>
        <div>
          <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-3">First Name</dt>
          <dd class="col-sm-9">{{ $student->fname }}</dd>
          <dt class="col-sm-3">Last Name</dt>
          <dd class="col-sm-9">{{ $student->lname }}</dd>
          <dt class="col-sm-3">Email</dt>
          <dd class="col-sm-9">{{ $student->email ?? '—' }}</dd>
          <dt class="col-sm-3">Enrolled Courses</dt>
          <dd class="col-sm-9">
            @if($student->courses->count() > 0)
              <div class="row">
                @foreach($student->courses as $course)
                  <div class="col-md-6 mb-2">
                    <div class="card border-primary">
                      <div class="card-body p-2">
                        <h6 class="card-title mb-1">{{ $course->name }}</h6>
                        @if($course->description)
                          <p class="card-text small text-muted mb-1">{{ $course->description }}</p>
                        @endif
                        @if($course->professor)
                          <small class="text-primary">Prof. {{ $course->professor->name }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @else
              <span class="text-muted">No courses enrolled</span>
            @endif
          </dd>
        </dl>
      </div>
      <div class="card-footer text-muted">
        Created {{ $student->created_at->diffForHumans() }} • Updated {{ $student->updated_at->diffForHumans() }}
      </div>
    </div>
  </div>
</div>
@endsection
