@include('partials.errors')

<div class="mb-3">
  <label for="name" class="form-label">Professor Name <span class="text-danger">*</span></label>
  <input type="text" id="name" name="name" class="form-control"
         value="{{ old('name', $professor->name ?? '') }}" required>
</div>
