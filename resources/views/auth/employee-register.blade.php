<!DOCTYPE html>
<html>
<head>

<title>Employee Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center bg-primary text-white">
Employee Register
</div>

<div class="card-body">

<form method="POST" action="/employee/register">

@csrf

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary w-100">
Register
</button>

</form>

<div class="text-center mt-3">

Already have account?

<a href="/employee/login">Login</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>