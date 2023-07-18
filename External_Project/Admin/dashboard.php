<?php
include("connection.php");
?>
<!DOCTYPE HTML>
<html>

<head>
	<title> Admin Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
	<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="font-awesome.css" rel="stylesheet">

	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />

	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Bootstrap JS Link -->
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<style>
		body {
			background: linear-gradient(to bottom, #ccccff 0%, #ccffcc 100%);
		}
	</style>
</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">

				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php" style="background-color:white;">Home</a> <i class="fa fa-angle-right"></i></li>
				</ol>
				<div class="card-deck">
					<div class="col-md-3 four-grid">
						<div class="card bg-primary">
							<div class="card-body text-center">
								<i class="fa fa-user-alt" style='font-size:30px;color:white'></i>

								<p class="card-text">
								<h3>User</h3>
								</p>
								<?php
								$sql = "SELECT RegisterID from registrationTB";
								$qry = mysqli_query($con, $sql);
								$cnt = mysqli_num_rows($qry);
								?> <p class="card-text">
								<h4><?php echo htmlentities($cnt); ?>
								</h4>
								</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 four-grid">
						<div class="card bg-warning">
							<div class="card-body text-center">
								<i class="fas fa-home" style='font-size:30px;color:white' aria-hidden="true"></i>

								<p class="card-text">
								<h3>Bookings</h3>
								</p>
								<?php

								$sql1 = "SELECT BookingID from bookingTB";
								$qry1 = mysqli_query($con, $sql1);
								$cnt1 = mysqli_num_rows($qry1);
								?>
								<p class="card-text">
								<h4><?php echo htmlentities($cnt1); ?></h4>
								</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 four-grid">
						<div class="card bg-danger">
							<div class="card-body text-center">

								<i class="far fa-folder" style='font-size:30px;color:white' aria-hidden="true"></i>

								<p class="card-text">
								<h3>Enquiries</h3>
								</p>
								<?php
								$sql2 = "SELECT EnquiryID from enquiryTB";
								$qry2 = mysqli_query($con, $sql2);
								$cnt2 = mysqli_num_rows($qry2);
								?>
								<p class="card-text">
								<h4><?php echo htmlentities($cnt2); ?></h4>
								</p>

							</div>

						</div>
					</div>
					
					<div class="col-md-3 four-grid">
						<div class="card bg-primary">
							<div class="card-body text-center">

								<i class="fas fa-archive" style='font-size:30px;color:white' aria-hidden="true"></i>

								<p class="card-text" style='font-size:10px'>
								<h3>packages</h3>
								</p>
								<?php
								$sql3 = "SELECT PackageID from packageTB";
								$qry3 = mysqli_query($con, $sql3);
								$cnt3 = mysqli_num_rows($qry3);
								?>
								<p class="card-text">
								<h4><?php echo htmlentities($cnt3); ?></h4>
								</p>

							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="far fa-folder" style='font-size:30px;color:white' aria-hidden="true"></i>
							</div>
							<div class="four-text" style="color:white">
								<h2>Issues</h2>
								<?php
								$sql4 = "SELECT IssueID from issuesTB";
								$qry4 = mysqli_query($con, $sql4);
								$cnt4 = mysqli_num_rows($qry4);
								?>
								<h4><?php echo htmlentities($cnt4); ?></h4>

							</div>

						</div>
					</div>


					<div class="clearfix"></div>
				</div>
			</div>

			<div class="inner-block">

			</div>
			<?php include('footer.php'); ?>
		</div>
	</div>

	<?php include('sidebarmenu.php'); ?>
	<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>
	<script>
		$(document).ready(function() {
			jQuery('.small-graph-box').hover(function() {
				jQuery(this).find('.box-button').fadeIn('fast');
			}, function() {
				jQuery(this).find('.box-button').fadeOut('fast');
			});
			jQuery('.small-graph-box .box-close').click(function() {
				jQuery(this).closest('.small-graph-box').fadeOut(200);
				return false;
			});

			function gd(year, day, month) {
				return new Date(year, month - 1, day).getTime();
			}

			graphArea2 = Morris.Area({
				element: 'hero-area',
				padding: 10,
				behaveLikeLine: true,
				gridEnabled: false,
				gridLineColor: '#dddddd',
				axes: true,
				resize: true,
				smooth: true,
				pointSize: 0,
				lineWidth: 0,
				fillOpacity: 0.85,
				data: [{
						period: '2014 Q1',
						iphone: 2668,
						ipad: null,
						itouch: 2649
					},
					{
						period: '2014 Q2',
						iphone: 15780,
						ipad: 13799,
						itouch: 12051
					},
					{
						period: '2014 Q3',
						iphone: 12920,
						ipad: 10975,
						itouch: 9910
					},
					{
						period: '2014 Q4',
						iphone: 8770,
						ipad: 6600,
						itouch: 6695
					},
					{
						period: '2015 Q1',
						iphone: 10820,
						ipad: 10924,
						itouch: 12300
					},
					{
						period: '2015 Q2',
						iphone: 9680,
						ipad: 9010,
						itouch: 7891
					},
					{
						period: '2015 Q3',
						iphone: 4830,
						ipad: 3805,
						itouch: 1598
					},
					{
						period: '2015 Q4',
						iphone: 15083,
						ipad: 8977,
						itouch: 5185
					},
					{
						period: '2016 Q1',
						iphone: 10697,
						ipad: 4470,
						itouch: 2038
					},
					{
						period: '2016 Q2',
						iphone: 8442,
						ipad: 5723,
						itouch: 1801
					}
				],
				lineColors: ['#ff4a43', '#a2d200', '#22beef'],
				xkey: 'period',
				redraw: true,
				ykeys: ['iphone', 'ipad', 'itouch'],
				labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
				pointSize: 2,
				hideHover: 'auto',
				resize: true
			});


		});
	</script>
</body>

</html>
<?php  ?>