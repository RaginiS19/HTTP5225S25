@extends('layouts.app')
@section('title',$course->name)

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <strong>{{ $course->name }}</strong>
        <div>
          <a href="{{ route('courses.edit',$course) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        @if($course->description)
          <p class="mb-0">{{ $course->description }}</p>
        @else
          <em>No description provided.</em>
        @endif
      </div>
      <div class="card-footer text-muted">
        Created {{ $course->created_at->diffForHumans() }} • Updated {{ $course->updated_at->diffForHumans() }}
      </div>
    </div>
  </div>
</div>
@endsection
