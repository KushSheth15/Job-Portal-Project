<?php
session_start();
error_reporting(0);
include('connection.php');

// code for cancel
if (isset($_REQUEST['eid'])) {
	$eid = intval($_GET['eid']);
	$status = 1;
	$date=date("Y/m/d").date("h:i:sa");
	$sql = "UPDATE enquiryTB SET Status='$status' Admindate='$date' WHERE  EnquiryID='$eid'";
	$query = mysqli_query($con, $sql);

	$msg = "Enquiry  successfully read";
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>TMS | Admin manage Issues</title>
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
	<link href="bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="manage.css" rel='stylesheet' type='text/css' />
	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
	<link href="font-awesome.css" rel="stylesheet">
	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Bootstrap JS Link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="js/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="table-style.css" />
	<link rel="stylesheet" type="text/css" href="basictable.css" />
	<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table').basictable();

			$('#table-breakpoint').basictable({
				breakpoint: 768
			});

			$('#table-swap-axis').basictable({
				swapAxis: true
			});

			$('#table-force-off').basictable({
				forceResponsive: false
			});

			$('#table-no-resize').basictable({
				noResize: true
			});

			$('#table-two-axis').basictable();

			$('#table-max-height').basictable({
				tableWrapper: true
			});
		});
	</script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
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

		body {
			background: linear-gradient(to bottom, #ccccff 0%, #ccffcc 100%);
		}
	</style>
	<script language="javascript" type="text/javascript">
		var popUpWin = 0;

		function popUpWindow(URLStr, left, top, width, height) {
			if (popUpWin) {
				if (!popUpWin.closed) popUpWin.close();
			}
			popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
		}
	</script>
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<!-- <?php include('header.php'); ?> -->
				<div class="clearfix"> </div>
			</div>
			<!--heder end here-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Issues</li>
			</ol>
			<div class="agile-grids">
				<!-- tables -->
				<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h2>Manage Issues</h2>
						<table id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Mobile No.</th>
									<th>Email Id</th>
									<th>Issues </th>
									<th>Description </th>
									<th>Posting date </th>
									<th>Action </th>

								</tr>
							</thead>
							<tbody>
								<?php $sql = "SELECT issuesTB.IssueID as id,registrationTB.Name as fname,registrationTB.MobileNo as mnumber,registrationTB.Email as email,issuesTB.Issue as issue,issuesTB.description as Description,issuesTB.PostingDate as PostingDate from issuesTB join registrationTB on registrationTB.Email=issuesTB.UserEmail";
								$query = mysqli_query($con, $sql);


								while ($row = mysqli_fetch_array($query)) {				?>
									<tr>
										<td width="120">#00<?php echo htmlentities($row['id']); ?></td>
										<td width="50"><?php echo htmlentities($row['fname']); ?></td>
										<td width="50"><?php echo htmlentities($row['mnumber']); ?></td>
										<td width="50"><?php echo htmlentities($row['email']); ?></td>

										<td width="200"><?php echo htmlentities($row['issue']); ?></a></td>
										<td width="400"><?php echo htmlentities($row['Description']); ?></td>

										<td width="50"><?php echo htmlentities($row['PostingDate']); ?></td>


										<td><a href="javascript:void(0);" onClick="popUpWindow('updateissue.php?iid=<?php echo ($row['id']); ?>');">View </a>
										</td>

									</tr>
								<?php }
								?>
							</tbody>
						</table>
					</div>
					</table>


				</div>
				<!-- script-for sticky-nav -->
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
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">
				</div>
				
				<?php include('footer.php'); ?>
				<!--COPY rights end here-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
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
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- /Bootstrap Core JavaScript -->

</body>

</html>
<?php  ?>