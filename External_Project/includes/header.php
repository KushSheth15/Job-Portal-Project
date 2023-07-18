<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Header</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>

<?php if ($_SESSION['login']) { ?>
	<div class="top-header">
		<div class="container">
			<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
				<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
				<li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li>
			</ul>
			<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
				<li class="tol">Welcome :</li>
				<li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
				<li class="sigi"><a href="logout.php">/ Logout</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
<?php
} else {
?>
	<div class="top-header">
		<div class="container">
			<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<!-- <li class="hm"><a href="admin/index.php"> Admin </a></li> -->
			</ul>
			<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">

				<li class="reg"><a href="register.php"><i class="fa fa-user-plus"></i>Register</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
<?php } ?>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.php">
			<img src="logo.png" alt="" width="70" height="70"><h2><i>Tourismbly</i></h2>
			</a>
		</div>

		<div class="lock fadeInDown animated" data-wow-delay=".5s">
			<li><i class="fa fa-lock"></i></li>
			<li>
				<div class="securetxt">SAFE &amp; SECURE </div>
			</li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container mb-5">
	<div class="row py-3">
		<div class="col">
			<nav class="navbar navbar-expand-lg navbar-dark" style="background:#3a4c6a;">
				<a href="" class="navbar-brand" style="background:none">
				<img src="logo.png" alt="" width="20" height="20"><i>Tourismbly</i></a></img>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#aaa">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="aaa">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><a href="index.php" class="nav-link" style="background:none">Home</a></li>
						<li class="nav-item"><a href="page.php?type=aboutus" class="nav-link" style="background:none">About us</a></li>
						<li class="nav-item"><a href="package-list.php" class="nav-link" style="background:none">Tour Packages</a></li>
						<li class="nav-item"><a href="review.php" class="nav-link" style="background:none">Reviews</a></li>
						<li class="nav-item"><a href="page.php?type=privacy" class="nav-link" style="background:none">Privacy Policy</a></li>
						<li class="nav-item"><a href="page.php?type=terms" class="nav-link" style="background:none">Terms of Use</a></li>
						<li class="nav-item"><a href="page.php?type=contact" class="nav-link" style="background:none">Contact Us</a></li>
						<?php if ($_SESSION['login']) { ?>
							<li class="nav-item"><a href="#" class="nav-link"  data-toggle="modal" data-target="#myModal3">Write Us </a> </li>
						<?php } else { ?>
							<li class="nav-item"><a href="enquiry.php" class="nav-link" style="background:none"> Enquiry </a> </li>
						<?php } ?>
					</ul>
					
				</div>
			</nav>
		</div>
	</div>
</div>
</body>
</html>
