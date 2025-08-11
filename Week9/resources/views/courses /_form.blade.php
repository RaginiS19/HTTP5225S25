@include('partials.errors')

<div class="mb-3">
  <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
  <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $course->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $course->description ?? '') }}</textarea>
</div>
