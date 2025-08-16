@include('partials.errors')

<div class="mb-3">
  <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
  <input type="text" id="name" name="name" class="form-control"
         value="{{ old('name', $course->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $course->description ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label for="professor_id" class="form-label">Professor</label>
  <select id="professor_id" name="professor_id" class="form-select">
    <option value="">Select a professor</option>
    @foreach($professors as $professor)
      <option value="{{ $professor->id }}" 
              {{ old('professor_id', $course->professor_id ?? '') == $professor->id ? 'selected' : '' }}>
        {{ $professor->name }}
      </option>
    @endforeach
  </select>
</div>
