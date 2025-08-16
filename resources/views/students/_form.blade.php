@include('partials.errors')

<div class="mb-3">
  <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
  <input type="text" id="fname" name="fname" class="form-control"
         value="{{ old('fname', $student->fname ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
  <input type="text" id="lname" name="lname" class="form-control"
         value="{{ old('lname', $student->lname ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" id="email" name="email" class="form-control"
         value="{{ old('email', $student->email ?? '') }}">
</div>

<div class="mb-3">
  <label class="form-label">Select Courses</label>
  <div class="row">
    @foreach($courses as $course)
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="course_ids[]" 
                 value="{{ $course->id }}" id="course_{{ $course->id }}"
                 {{ in_array($course->id, old('course_ids', $student->courses->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
          <label class="form-check-label" for="course_{{ $course->id }}">
            {{ $course->name }}
            @if($course->professor)
              <small class="text-muted">(Prof. {{ $course->professor->name }})</small>
            @endif
          </label>
        </div>
      </div>
    @endforeach
  </div>
</div>
