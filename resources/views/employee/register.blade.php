<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="col-md-4 mx-auto">

<div class="card p-4">

<h3>Employee Register</h3>

<form id="registerForm">

@csrf

<input type="text" name="name" class="form-control mb-3" placeholder="Name">

<input type="email" name="email" class="form-control mb-3" placeholder="Email">

<input type="password" name="password" class="form-control mb-3" placeholder="Password">

<button class="btn btn-success w-100">Register</button>

</form>

<div id="errorBox"></div>
<div id="successBox"></div>

</div>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$('#registerForm').submit(function(e){

e.preventDefault();

$.ajax({

url:'/employee/register',
type:'POST',
data:$(this).serialize(),

success:function(response){

if(response.status==false){

let errors=response.errors;
let errorHtml='<div class="alert alert-danger">';

$.each(errors,function(key,value){
errorHtml+=value[0]+'<br>';
});

errorHtml+='</div>';

$('#errorBox').html(errorHtml);

}else{

$('#errorBox').html('');
$('#successBox').html('<div class="alert alert-success">'+response.message+'</div>');

$('#registerForm')[0].reset();

}

}

});

});

</script>
</body>
</html>