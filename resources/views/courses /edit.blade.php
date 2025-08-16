@extends('layouts.app')
@section('title','Edit Course')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><strong>Edit Course</strong></div>
      <div class="card-body">
        <form action="{{ route('courses.update',$course) }}" method="POST" novalidate>
          @csrf @method('PUT')
          @include('courses._form')
          <div class="d-flex justify-content-end">
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
