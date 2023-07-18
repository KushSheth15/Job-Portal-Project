<?php
session_start();
error_reporting(0);
include('connection.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) {
		$password = md5($_POST['password']);
		$newpassword = md5($_POST['newpassword']);
		$username = $_SESSION['alogin'];
		$sql = "SELECT password FROM adminTB WHERE Uname='$username' and password='$password'";
		$query = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($query)) 
		{
			$sql1 = "update adminTB set password='$newpasseord' where Uname='$username'";
			$qry = mysqli_query($con,$sql1);
			$msg = "Your Password succesfully changed";
		} 
	}
?>

	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Admin Change Password</title>

		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>

		<link href="bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="style_f.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="morris.css" type="text/css" />
		<link href="font-awesome.css" rel="stylesheet">
		<script src="js/jquery-2.1.4.min.js"></script>
		<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
		<script type="text/javascript">
			function valid() {
				if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
					alert("New Password and Confirm Password Field do not match  !!");
					document.chngpwd.confirmpassword.focus();
					return false;
				}
				return true;
			}
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
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="mother-grid-inner">
					<!--header start here-->
					<?php include('header.php'); ?>

					<div class="clearfix"> </div>
				</div>
				<!--heder end here-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Change Password</li>
				</ol>
				<!--grid-->
				<div class="grid-form">

					<div class="grid-form1">

						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

						<div class="panel-body">
							<form name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">

								<div class="form-group">
									<label class="col-md-2 control-label">Current Password</label>
									<div class="col-md-8">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-key"></i>
											</span>
											<input type="password" name="password" class="form-control1" id="exampleInputPassword1" placeholder="Current Password" required="">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label">New Password</label>
									<div class="col-md-8">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-key"></i>
											</span>
											<input type="password" class="form-control1" name="newpassword" id="newpassword" placeholder="New Password" required="">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label">Confirm Password</label>
									<div class="col-md-8">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-key"></i>
											</span>
											<input type="password" class="form-control1" name="confirmpassword" id="confirmpassword" placeholder="Confrim Password" required="">
										</div>
									</div>
								</div>

								<div class="col-sm-8 col-sm-offset-2">
									<button type="submit" name="submit" class="btn-primary btn">Submit</button>
									<button type="reset" class="btn-inverse btn">Reset</button>
								</div>
						</div>

						</form>
					</div>
				</div>
			</div>
		</div>
		<!--//grid-->

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
		<!--inner block end here-->
		<!--copy rights start here-->
		<?php include('includes/footer.php'); ?>
		<!--COPY rights end here-->
		</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include('includes/sidebarmenu.php'); ?>
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
		<script src="js/bootstrap.min.js"></script>

	</body>

	</html>
<?php } ?>