<!DOCTYPE html>
<html>
<head>

<title>Employee Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f5f5f5;
}

/* Sidebar */
.sidebar{
height:100vh;
background:#212529;
color:#fff;
padding:20px;
}

.sidebar h4{
margin-bottom:20px;
}

.sidebar a{
color:#fff;
display:block;
padding:10px;
margin-bottom:10px;
text-decoration:none;
border-radius:5px;
}

.sidebar a:hover{
background:#343a40;
}

/* Content */
.content{
padding:20px;
}

/* Cards */
.card{
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

</style>

</head>

<body>

<div class="container-fluid">

<div class="row">

<!-- Sidebar -->
<div class="col-md-2 sidebar">

<h4>Employee Panel</h4>

<a href="#">🏠 Dashboard</a>
<a href="/employee/profile" class="{{ request()->is('employee/profile') ? 'active' : '' }}">
👤 Profile
</a><a href="#">💼 Jobs</a>
<a href="#">📄 Applied Jobs</a>

<a href="/employee/logout" class="btn btn-danger mt-3 w-100">Logout</a>

</div>

<!-- Main Content -->
<div class="col-md-10 content">

<!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm mb-4">

<div class="container-fluid">

<span class="navbar-brand mb-0 h5">Dashboard</span>

<span>
Welcome, <b>{{ session('employee_email') }}</b>
</span>

</div>

</nav>

<!-- Dashboard Cards -->
<div class="row">

<div class="col-md-4">
<div class="card p-3">
<h5>Total Applications</h5>
<p>0</p>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h5>Saved Jobs</h5>
<p>0</p>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h5>Profile Status</h5>
<p class="text-success">Active</p>
</div>
</div>

</div>

<!-- Welcome Section -->
<div class="card p-4 mt-4">

<h4>Welcome to your Dashboard 👋</h4>

<p>
This is your employee panel where you can manage your profile and job applications.
</p>

<ul>
<li>Update your profile</li>
<li>Browse available jobs</li>
<li>Apply for jobs</li>
<li>Track your applications</li>
</ul>

</div>

</div>

</div>

</div>

</body>
</html>