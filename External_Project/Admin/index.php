<?php
include("connection.php");
if (isset($_POST["login"])) {
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	$qry = "select Uname,password from adminTB where Uname='$uname' and password='$pass'";
	$str = mysqli_query($con, $qry) or trigger_error("Query failed : $sql - Error:" . mysqli_error($con), E_USER_ERROR);
	$row = mysqli_num_rows($str);
	if ($row > 0) {
		header("Location:dashboard.php");
	}
}
?>

<head>
	<!-- CSS file -->
	<link rel="stylesheet" href="admin.css" type="text/css">

	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Bootstrap JS Link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<div class="wrapper">
	<form class="form-signin" method="POST">
		<h2 class="form-signin-heading">Admin login</h2>
		<input type="text" class="form-control" placeholder="Username" name="uname" required="" autofocus="" /></br>
		<input type="password" class="form-control" placeholder="Password" name="pass" required="" /></br>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
	</form>
</div>