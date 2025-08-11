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
        </dl>
      </div>
      <div class="card-footer text-muted">
        Created {{ $student->created_at->diffForHumans() }} • Updated {{ $student->updated_at->diffForHumans() }}
      </div>
    </div>
  </div>
</div>
@endsection
