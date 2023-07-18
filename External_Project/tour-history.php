<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:register.php');
} else {
	if (isset($_REQUEST['bkid'])) {
		$bid = intval($_GET['bkid']);
		// echo $bid;
		$email = $_SESSION['login'];
		$sql = "SELECT FromDate FROM bookingTB WHERE UEmail='$email' and BookingID='$bid'";
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($query)) {
			$fdate = $row['FromDate'];

			$a = explode("/", $fdate);
			$val = array_reverse($a);
			$mydate = implode("/", $val);
			$cdate = date('Y/m/d');
			$date1 = date_create("$cdate");
			$date2 = date_create("$fdate");
			$diff = date_diff($date1, $date2);
			echo $df = $diff->format("%a");
			if ($df > 1) {
				$status = 2;
				$cancelby = 'u';
				$sql1 = "UPDATE bookingTB SET Status='$status', CancelledBy='$cancelby' WHERE UEmail='$email' and BookingID='$bid'";
				$query1 = mysqli_query($con, $sql1);
				if (!$query1) {
					die("Error" . mysqli_error($conn));
				}
				$msg = "Booking Cancelled successfully";
			} else {
				$error = "You can't cancel booking before 24 hours";
			}
		}
	}

?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Tourism Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Tourism Management System In PHP" />
		<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/style_u.css" rel='stylesheet' type='text/css' />
		<!-- Font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Bootstrap JS Link -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Tour History</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();">
						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
						<p>
						<table border="2" width="100%">
							<tr align="center" border="2">
								<th>#</th>
								<th>Booking Id</th>
								<th>Package Name</th>
								<th>From</th>
								<th>To</th>
								<th>Comment</th>
								<th>Status</th>
								<th>Booking Date</th>
								<th>Action</th>
							</tr>
							<?php

							$uemail = $_SESSION['login'];;
							$sql = "SELECT bookingTB.BookingID as bookid , bookingTB.PackageID as pkgid,packageTB.PackageName as packagename,bookingTB.FromDate as fromdate,
							bookingTB.ToDate as todate,bookingTB.Comment as comment,bookingTB.Status as status,bookingTB.RegDate as regdate,bookingTB.CancelledBy as cancelby,bookingTB.UpdateDate as upddate from bookingTB join packageTB on packageTB.PackageID=bookingTB.PackageID where UEmail='$uemail'";
							$query = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($query)) {	?>
								<tr align="center" border="2">
									<td><?php echo htmlentities($cnt); ?></td>
									<td>#BK<?php echo htmlentities($row['bookid']); ?></td>
									<td><a href="package-details.php?pkgid=<?php echo htmlentities($row['pkgid']); ?>"><?php echo htmlentities($row['packagename']); ?></a></td>
									<td><?php echo htmlentities($row['fromdate']); ?></td>
									<td><?php echo htmlentities($row['todate']); ?></td>
									<td><?php echo htmlentities($row['comment']); ?></td>
									<td><?php if ($row['status'] == 0) {
											echo "Pending";
										}
										if ($row['status'] == 1) {
											echo "Confirmed by admin " .$row['upddate'] ;
										}
										if ($row['status'] == 2 and  $row['cancelby'] == 'u') {
											echo "Canceled by you ";
										}
										if ($row['status'] == 2 and $row['cancelby'] == 'a') {
											echo "Canceled by admin " .$row['upddate'];
										}
										?></td>
									<td><?php echo htmlentities($row['regdate']); ?></td>
									<?php if ($row['status'] == 2) { ?>
									<td>Cancelled</td>
									<?php } else { ?>
										<td><a href="tour-history.php?bkid=<?php echo htmlentities($row['bookid']); ?>" onclick="return confirm('Do you really want to cancel booking')"><i class="fa fa-trash-o" style="font-size:30px;color:red"></i></a></td>
									<?php } ?>
								</tr>
							<?php $cnt = $cnt + 1;
							}
							?>
						</table>

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