<?php
error_reporting(0);
include('connection.php');
if (isset($_REQUEST['bkid'])) {
	$bid = intval($_GET['bkid']);
	$status = 2;
	$cancelby = 'a';
	$updatedate = date("Y/m/d") . " " . date("h:i:s");;
	$sql = "UPDATE bookingTB SET Status='$status',CancelledBy='$cancelby',UpdateDate='$updatedate' WHERE  BookingID='$bid'";
	$qry = mysqli_query($con, $sql);

	$msg = "Booking Cancelled successfully";
}


if (isset($_REQUEST['bckid'])) {
	$bckid = intval($_GET['bckid']);
	$status = 1;
	// $cancelby='a';
	$updatedatec = date("Y/m/d") . " " . date("h:i:s");
	$sql1 = "UPDATE bookingTB SET Status='$status',UpdateDate='$updatedatec' WHERE  BookingID='$bckid'";
	$qry1 = mysqli_query($con, $sql1);

	$msg = "Booking Confirm successfully";
}
?>


<html>

<head>
	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link href="manage.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="table-style.css" />
	<link rel="stylesheet" type="text/css" href="basictable.css" />
	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
					<li class="breadcrumb-item"><a href="dashboard.php" style="background-color:white;">Home</a><i class="fa fa-angle-right"></i>Manage Booking</li>
				</ol>
				<div class="agile-grids">
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2>Manage Booking</h2>
							<div class="container table-responsive py-1">
								<table class="table table-border table-hover">
									<thead class="thead-dark">
										<tr>
											<th scope="">BId</th>
											<th scope="">Name</th>
											<th scope="">Mobile</th>
											<th scope="">Email</th>
											<th scope="">Regfor</th>
											<th scope="">From/To</th>
											<th scope="">comment</th>
											<th scope="">Status</th>
											<th scope="">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "connection.php";
										$qry = "select bookingTB.BookingID as bookid , registrationTB.Name as fname , registrationTB.MobileNo as mnumber , registrationTB.Email as email , PackageTB.PackageName as pname , 
									bookingTB.PackageID as pid , bookingTB.FromDate as fdate , bookingTB.ToDate as tdate , bookingTB.Comment as comment , bookingTB.Status as status , bookingTB.CancelledBy as cancelby , 
									bookingTB.UpdateDate as upddate from registrationTB join bookingTB on bookingTB.UEmail=registrationTB.Email join packageTB on packageTB.PackageID=bookingTB.PackageID";
										$sql = mysqli_query($con, $qry);
										$updatedate = date("Y/m/d");
										$cnt = 1;
										if (!$sql) {
											die("Error" . mysqli_error($con));
										}
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td><?php echo htmlentities($row["bookid"]); ?></td>
												<td><?php echo htmlentities($row["fname"]); ?></td>
												<td><?php echo htmlentities($row["mnumber"]); ?></td>
												<td><?php echo htmlentities($row["email"]); ?></td>
												<td><a href="update-package.php?pid=<?php echo htmlentities($row['pid']); ?>"><?php echo htmlentities($row['pname']); ?></a></td>
												<td><?php echo htmlentities($row["fdate"]); ?> To <?php echo htmlentities($row["tdate"]); ?></td>
												<td><?php echo htmlentities($row["comment"]); ?></td>
												<td><?php echo htmlentities($row["status"] == 0); {
														if ($row['status'] == 0) {
															echo "Pending";
														}
													}
													if ($row['status'] == 1) {
														echo "Confirmed";
													}
													if ($row['status'] == 2 and  $row['cancelby'] == 'a') {
														echo "Canceled by you at " . $row['upddate'];
													}
													if ($row['status'] == 2 and $row['cancelby'] == 'u') {
														echo "Canceled by User at " . $row['upddate'];
													} ?>
												</td>

												<?php if ($row['status'] == 2) {
												?>
													<td>Cancelled</td>
												<?php } else { ?>
													<td><a href="manage-bookings.php?bkid=<?php echo htmlentities($row['bookid']); ?>" onclick="return confirm('Do you really want to cancel booking')" style="background:none" ;><i class="fa fa-times" style="font-size:25px" ;></i></a>&nbsp;
														<a href="manage-bookings.php?bckid=<?php echo htmlentities($row['bookid']); ?>" onclick="return confirm('booking has been confirm')" style="background:none" ;><i class="fa fa-check" style="font-size:25px" ;></i></a>
													</td>
												<?php } ?>

											</tr>
										<?php
											// $cnt = $cnt + 1;
										}
										?>
									</tbody>

								</table>
							</div>
							<?php include('sidebarmenu.php'); ?>
						</div>
						<script>
							$(document).ready(function() {
								var navoffeset = $(".header-main").offset().top;
								$(window).scroll(function() {
									var scrollpos = $(window).scrollTop();
									if (scrollpos >= navoffeset) {
										$(".header-main").addClass("fixed");
									} else {
										$(".header-main").removeClass("fixed");
									}
								});

							});
						</script>
						<div class="inner-block"></div>
						<?php include('footer.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>