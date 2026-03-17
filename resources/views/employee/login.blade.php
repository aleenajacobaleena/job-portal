<!DOCTYPE html>
<html>
<head>

<title>Employee Login</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f5f5f5;
}

.card{
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="col-md-4 mx-auto">

<div class="card p-4">

<h3 class="text-center mb-3">Employee Login</h3>

<form id="loginForm">

@csrf

<input type="email" name="email" class="form-control mb-3" placeholder="Enter Email">

<input type="password" name="password" class="form-control mb-3" placeholder="Enter Password">

<button class="btn btn-primary w-100">Login</button>

</form>

<div id="loginError" class="mt-3"></div>

</div>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
});

$('#loginForm').submit(function(e){

e.preventDefault();

$('#loginError').html('');

$.ajax({

url:'/employee/login',

type:'POST',

data:$(this).serialize(),

success:function(response){

if(response.status==false){

$('#loginError').html(
'<div class="alert alert-danger">'+response.message+'</div>'
);

}else{

window.location=response.redirect;

}

},

error:function(xhr){

$('#loginError').html(
'<div class="alert alert-danger">Something went wrong</div>'
);

}

});

});

</script>

</body>
</html>