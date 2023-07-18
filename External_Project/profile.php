<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	if (isset($_POST['submit6'])) {
		$name = $_POST['name'];
		$mobileno = $_POST['mobileno'];
		$email = $_SESSION['login'];

		$sql = "update registrationTB set Name='$name' , MobileNo='$mobileno' where Email='$email'";
		$query = mysqli_query($con, $sql);
		if ($query > 0) {
			$msg = "Profile Updated Successfully";
		}
	}

?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title> Tourism Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Tourism Management System In PHP" />
		<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/style_u.css" rel='stylesheet' type='text/css' />
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

		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>
	</head>

	<body>
		<!-- top-header -->
		<div class="top-header">
			<?php include('includes/header.php'); ?>
			
			<!--- /banner-1 ---->
			<!--- privacy ---->
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Profile!!</h3>
					<form name="chngpwd" method="post">
						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
						<?php
						} else if ($msg) { ?>
							<div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
						<?php
						} ?>

						<?php
						$useremail = $_SESSION['login'];
						$sql = "SELECT * from registrationTB where Email='$useremail'";
						$query = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_array($query)) {
						?>
							<p style="width: 350px;">
								<b>Name</b> <input type="text" name="name" value="<?php echo htmlentities($row['Name']); ?>" class="form-control" id="name" required="">
							</p>

							<p style="width: 350px;">
								<b>Mobile Number</b>
								<input type="text" class="form-control" name="mobileno" maxlength="10" value="<?php echo htmlentities($row['MobileNo']); ?>" id="mobileno" required="">
							</p>

							<p style="width: 350px;">
								<b>Email Id</b>
								<input type="email" class="form-control" name="email" value="<?php echo htmlentities($row['Email']); ?>" id="email" readonly>
							</p>
							<p style="width: 350px;">
								<b>Last Updation Date : </b>
								<?php echo htmlentities($row['LastLoginDate']); ?>
							</p>

							<p style="width: 350px;">
								<b>Reg Date :</b>
								<?php echo htmlentities($row['RegDate']); ?>
							</p>
						<?php
						}
						?>

						<p style="width: 350px;">
							<button type="submit" name="submit6" class="btn-primary btn">Updtae</button>
						</p>
					</form>


				</div>
			</div>
			<!--- /privacy ---->
			<!--- footer-top ---->
			<!--- /footer-top ---->
			<?php include('includes/footer.php'); ?>


			<!-- write us -->
			<?php include('includes/write-us.php'); ?>
	</body>

	</html>
<?php } ?>