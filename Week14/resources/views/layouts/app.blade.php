<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Student & Course CRUD')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">CRUD Demo</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Students</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('professors.index') }}">Professors</a></li>
    </ul>
  </div>
</nav>
<main class="container">
  @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
  @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
  @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
