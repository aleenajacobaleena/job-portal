<!DOCTYPE html>
<html>
<head>

<title>Employee Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center bg-success text-white">
<h4 class="text-center">Employer Login</h4>
</div>

<div class="card-body">

<form method="POST" action="/employer/login">
@csrf

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<button type="submit" class="btn btn-success w-100">
Login
</button>

</form>

<div class="text-center mt-3">

Don't have account?

<a href="/employee/register">Register</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>