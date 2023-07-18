<?php
session_start();
error_reporting(0);
include('includes/connection.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title> Package List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style_u.css" rel='stylesheet' type='text/css' />
	<!-- <link href="css/style.css" rel='stylesheet' type='text/css' /> -->

	<link rel="stylesheet" href="css/morris.css" type="text/css" />

	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
	<!-- Bootstrap JS Link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
	<link rel="stylesheet" href="css/mdb.min.css" />
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
	<!--- banner ---->

	<div class="container">
		<div>
			<!-- <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Package List</h1> -->
		</div>
	</div>
	<!--- /banner ---->
	<!--- rooms ---->
	<div class="rooms">
		<div class="container">

			<div class="room-bottom">
				<h3>Package List</h3><br>

				<?php
				$limit = 4;
				if (isset($_GET["pages"])) {
					$page = $_GET["pages"];
				} else {
					$page = 1;
				}
				$offset = ($page - 1) * $limit;
				$sql = "SELECT * from packageTB order by rand() LIMIT {$offset},{$limit}";
				$query = mysqli_query($con, $sql);
				?>
				<section class="text-center mb-4">
					<div class="row">
						<?php
						while ($row = mysqli_fetch_array($query)) { ?>
							<!-- <div class="rom-btm"> -->
							<div class="col-lg-3 col-md-12 mb-3">
								<div class="card">
									<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
										<img src="./Admin/images/<?php echo htmlentities($row['Image']); ?>" class="img-responsive" alt="">
										<a href="package-details.php?pkgid=<?php echo htmlentities($row[0]); ?>">
											<div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
										</a>
									</div>
									<div class="card-body">

										<h5 class="card-title"><?php echo htmlentities($row['PackageName']); ?></h5>
										<h6 class="card-text"><?php echo htmlentities($row['PackageType']); ?></h6>
										<p class="card-text"><b>Package Location :</b><?php echo htmlentities($row['Lname']); ?></p>
										<h5><?php echo htmlentities($row['Price']); ?></h5>
										<a href="package-details.php?pkgid=<?php echo htmlentities($row[0]); ?>&&Price=<?php echo htmlentities($row[4]); ?>" class="btn btn-primary">Book</a>

									</div>
									<!-- <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
										<a href="package-details.php?pkgid=<?php echo htmlentities($row['PackageID']); ?>" class="view">Details</a>
									</div> -->

								</div>
							</div>
						<?php }
						?>
						<?php
						$sql1 = "select * from packageTB";
						$qry1 = mysqli_query($con, $sql1);
						$total_rec = mysqli_num_rows($qry1);
						$limit = 4;
						$pages = ceil($total_rec / $limit);
						?>
						<nav aria-label="...">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="package-list.php?pages=<?php echo $page - 1; ?>">previous</a></li>
								<?php
								for ($i = 1; $i <= $pages; $i++) {
									if ($i == $page) {
										$active = "active";
									} else {
										$active = "";
									}
								?>
									<li class="<?php echo $active; ?>"><a class="page-link" href="package-list.php?pages=<?php echo $i; ?> mr-sm-2"><?php echo $i; ?></a></li>
								<?php
								}
								?>
								<li class="page-item"><a class="page-link" href="package-list.php?pages=<?php echo $page + 1; ?>">next</a></li>
							</ul>
						</nav>

					</div>
				</section>



			</div>
		</div>
	</div>
	<!--- /rooms ---->

	<!--- /footer-top ---->
	<?php include('includes/footer.php'); ?>

	<!-- write us -->
	<?php include('includes/write-us.php'); ?>
	<!-- //write us -->
</body>

</html>