@extends('layouts.app')
@section('title','Edit Student')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><strong>Edit Student</strong></div>
      <div class="card-body">
        <form action="{{ route('students.update', $student) }}" method="POST" novalidate>
          @csrf @method('PUT')
          @include('students._form')
          <div class="d-flex justify-content-end">
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
