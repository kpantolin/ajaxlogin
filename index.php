<?php

session_start();

if(isset($_SESSION['email'])){

	header("location: main.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
	
</head>
<body>



<div class = "container">

	<div class="row justify-content-center"> 

		<div class = "col-md-6 mt-5">

			<div class="card">
				<div class="card-header">

					<h1 class = "text-center"> LOGIN PAGE</h1>
				</div>
				<div class="card-body">



					<form>

						<div class= "form-group">
							<label for="email">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email" >
						</div>

						<div class= "form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" >
						</div>

						<div class= "form-group">
						<button class="btn btn-block btn-primary" type="button" onclick="login()">LOGIN</button>

						</div>

					</form>

				</div>
				<div class="card-footer text-center">Copyright KP2021 &copy;</div>

			</div>
		</div>

	</div>


</div>


<script>

function login(){
	var email = $("#email").val();
	var password = $("#password").val();

	if(email == "" || password == "" ) {
		Swal.fire({icon: 'error', title: 'Oops...', text: 'Please input your Email and Password!',});
	} else {
	
		$.ajax ({
		url: "login.php",
		type: "POST",
		data: {Email: email, Password: password},
		cache: false,

		success: function(data){

		if(data){
			Swal.fire({icon: 'sucess', title: 'Sucess', text: 'Successfully logged in!',});
			window.location.href = "main.php";


		} else if(data = 0){
		Swal.fire({icon: 'error', title: 'Oops......', text: 'Incorrect Email or Password!',});
		} else {
			Swal.fire({icon: 'error', title: 'Oops......', text: 'Something went wrong!',});
		}



		}
	}); 
}
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>