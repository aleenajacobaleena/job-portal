<!DOCTYPE html>
<html>
<head>

<title>Employee Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h3>Employee Profile</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="/employee/profile" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Name</label>
<input type="text" class="form-control" value="{{ $employee->name }}" disabled>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" class="form-control" value="{{ $employee->email }}" disabled>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
</div>

<div class="mb-3">
<label>Skills</label>
<input type="text" name="skills" class="form-control" value="{{ $employee->skills }}">
</div>

<div class="mb-3">
<label>Experience</label>
<input type="text" name="experience" class="form-control" value="{{ $employee->experience }}">
</div>

<div class="mb-3">
<label>Profile Image</label>
<input type="file" name="image" class="form-control">

@if($employee->image)
<img src="{{ asset('uploads/'.$employee->image) }}" width="100">
@endif

</div>

<div class="mb-3">
<label>Resume</label>
<input type="file" name="resume" class="form-control">

@if($employee->resume)
<a href="{{ asset('uploads/'.$employee->resume) }}" target="_blank">View Resume</a>
@endif

</div>

<button class="btn btn-primary">Update Profile</button>

</form>

</div>

</body>
</html>