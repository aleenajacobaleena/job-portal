<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">Employee Dashboard</span>

<a href="/employee/logout" class="btn btn-danger">Logout</a>

</div>

</nav>

<div class="container mt-5">

<div class="card p-4">

<h3>Welcome</h3>

<p>Email : {{ session('employee_email') }}</p>

</div>

</div>

</body>
</html>