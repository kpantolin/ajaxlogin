<?php
	$connection = new mysqli("localhost", "root", "", "membershipSystem");
	$email = $connection->real_escape_string($_POST["Email"]);
		$password = $connection->real_escape_string($_POST["Password"]);
		$data = $connection->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
		if ($data->num_rows > 0) {
			$_SESSION["email"] = $email;
			
			echo 1;
			header("Location: main.php");
			exit();
	}	else{

		echo 0;
	}
?>      
