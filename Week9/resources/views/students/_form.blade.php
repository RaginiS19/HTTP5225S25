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
