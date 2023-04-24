<?php
session_start();
include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forget Password - Vitalia</title>
	<style>
		body {
			background-color: #f2f2f2;
		}
		h2 {
			color: green;
		}
		form {
			background-color: white;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 5px grey;
			margin-top: 50px;
			margin-bottom: 50px;
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			font-weight: bold;
		}
		input[type=email], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h2>Forget Password - Vitalia</h2>
	<form action="forget_core.php" method="POST">
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>

		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
