@extends('layouts.app')
@section('title','Create Course')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><strong>Create Course</strong></div>
      <div class="card-body">
        <form action="{{ route('courses.store') }}" method="POST" novalidate>
          @csrf
          @include('courses._form')
          <div class="d-flex justify-content-end">
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
