<?php
session_start();
error_reporting(0);
include('includes/connection.php');
$_SESSION['uid']=$_GET['RegisterID'];
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Tourism Management System</title>

	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style_u.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Bootstrap CSS Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font awesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Bootstrap JS Link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

	<?php
	include('includes/header.php');
	?>
	
	<div>
		 <!-- class="banner" -->
	<?php
	include('slide.php');
	?>
		<div class="clearfix"></div>

		<!-- <div class="container" style="margin:0px">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Tourism Management System</h1>
		</div> -->
	</div>


	<!---holiday---->
	<div class="container">
		<div class="holiday">

			<h3>Package List</h3>


			<?php
			$sql = "SELECT * from packageTB order by rand() limit 4";
			$query = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_array($query)) {
			?>
				<div class="rom-btm">
					<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
						<img src="./Admin/images/<?php echo htmlentities($row['Image']); ?>" class="img-responsive" alt="">
					</div>
					<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
						<h4>Package Name: <?php echo htmlentities($row['PackageName']); ?></h4>
						<h6>Package Type : <?php echo htmlentities($row['PackageType']); ?></h6>
						<p><b>Package Location :</b> <?php echo htmlentities($row['Lname']); ?></p>
						<p><b>Features</b> <?php echo htmlentities($row['Features']); ?></p>
					</div>
					<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
						<h5>INR <?php echo htmlentities($row['Price']); ?></h5>
						<a href="package-details.php?pkgid=<?php echo htmlentities($row['PackageID']); ?>" class="view">Details</a>
					</div>
					<div class="clearfix"></div>
				</div>

			<?php }
			?>


			<div><a href="package-list.php" class="view">View More Packages</a></div>
		</div>
		<div class="clearfix"></div>
	</div>



	<!--- routes ---->
	<div class="routes">
		<div class="container">
			<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
				<div class="rou-left">
					<a href="#"><i class="glyphicon glyphicon-list-alt"></i></a>
				</div>
				<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
					<h3>1000+</h3>
					<p>Customer Enquiries</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 routes-left">
				<div class="rou-left">
					<a href="#"><i class="fa fa-user"></i></a>
				</div>
				<div class="rou-rgt">
					<h3>380+</h3>
					<p>Registered Users</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
				<div class="rou-left">
					<a href="#"><i class="fa fa-ticket"></i></a>
				</div>
				<div class="rou-rgt">
					<h3>5000+</h3>
					<p>Bookings</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- Footer -->
	<?php //include('review.php'); ?>
			</br>
	<h3 align="center"> Created By <h3>
			</br>
			<?php include('footer_u.php'); ?>
			<?php include('includes/footer.php'); ?>

			<!-- <?php include('includes/register.php'); ?> -->

			<!-- write us -->
			<?php include('includes/write-us.php'); ?>

</body>

</html>