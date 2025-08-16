@extends('layouts.app')
@section('title', $professor->name)

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Prof. {{ $professor->name }}</strong>
        <div>
          <a href="{{ route('professors.edit', $professor) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <a href="{{ route('professors.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
        </div>
      </div>
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-3">Professor Name</dt>
          <dd class="col-sm-9">{{ $professor->name }}</dd>
          <dt class="col-sm-3">Assigned Course</dt>
          <dd class="col-sm-9">
            @if($professor->course)
              <div class="card border-primary">
                <div class="card-body p-3">
                  <h6 class="card-title">{{ $professor->course->name }}</h6>
                  @if($professor->course->description)
                    <p class="card-text text-muted">{{ $professor->course->description }}</p>
                  @endif
                  <div class="mt-2">
                    <strong>Enrolled Students:</strong>
                    @if($professor->course->students->count() > 0)
                      <div class="row mt-2">
                        @foreach($professor->course->students as $student)
                          <div class="col-md-6 mb-1">
                            <span class="badge bg-info">{{ $student->fname }} {{ $student->lname }}</span>
                          </div>
                        @endforeach
                      </div>
                    @else
                      <span class="text-muted">No students enrolled</span>
                    @endif
                  </div>
                </div>
              </div>
            @else
              <span class="text-muted">No course assigned</span>
            @endif
          </dd>
        </dl>
      </div>
      <div class="card-footer text-muted">
        Created {{ $professor->created_at->diffForHumans() }} • Updated {{ $professor->updated_at->diffForHumans() }}
      </div>
    </div>
  </div>
</div>
@endsection
