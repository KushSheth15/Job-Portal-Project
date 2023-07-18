<?php
session_start();
error_reporting(0);
include('includes/connection.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title> Confirmation </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href='css/payment.css' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!--//end-animate-->
</head>

<body>
	<?php include('includes/header.php'); ?>
	
		<div class="jumbotron text-center">
  <h1 class="display-3">Thank You For Booking</h1>
  <p class="lead"><strong>If any query our administrator contact you</strong></p>
  <hr>
  <p>
    Having trouble? <a href="page.php?type=contact">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
		<!--- /contact ---->
		<?php include('includes/footer.php'); ?>
		
		
		<!-- write us -->
		<?php include('includes/write-us.php'); ?>
		<!-- //write us -->
</body>

</html>