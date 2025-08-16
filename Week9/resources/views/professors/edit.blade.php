@extends('layouts.app')
@section('title','Edit Professor')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><strong>Edit Professor</strong></div>
      <div class="card-body">
        <form action="{{ route('professors.update', $professor) }}" method="POST" novalidate>
          @csrf @method('PUT')
          @include('professors._form')
          <div class="d-flex justify-content-end">
            <a href="{{ route('professors.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
