<?php
$error = 0;
$msg = 0;
include("connection.php");
$sql1 = "select * from packageTB where PackageID=" . $_GET['pid'];
$qry1 = mysqli_query($con, $sql1);
if (isset($_POST["update"])) {
	$pname = $_POST["pname"];
	$ptype = $_POST["ptype"];
	$plocation = $_POST["plocation"];
	$pprice = $_POST["pprice"];
	$pfeature = $_POST["pfeatures"];
	$pdetail = $_POST["pdetails"];
	//$pimage = $_FILES["pimage"]["name"];
	$sql = "update packageTB set PackageName='$pname',PackageType='$ptype',Lname='$plocation',Price='$pprice',Features='$pfeature',Details='$pdetail' where PackageID=" . $_GET['pid'];
	$qry = mysqli_query($con, $sql);
	if (!$qry) {
		die("Error" .mysqli_error($con));
	}
	if ($qry) {
		$msg = "Package Updated successfuly";
	} else {
		$error = "Package not updated";
	}
}

?>

<html>

<head>

	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
	<!-- Font awesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		.form-control:focus {
			border-color: blue;
			box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
		}

		body {
			background: linear-gradient(to bottom, #ccccff 0%, #ccffcc 100%);
		}
	</style>
</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">

				<div class="clearfix"> </div>
			</div>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php" style="background-color:white;">Home</a><i class="fa fa-angle-right"></i>Manage Package </li>
			</ol>
			<div class="grid-form">
				<div class="grid-form1">
					<h3>Manage Package</h3>
					<?php if ($error) { ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } else if ($msg) { ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php
					} ?>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">

						<?php while($row = mysqli_fetch_array($qry1))
						{
							?>	
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="pname" id="packagename" value="<?php echo htmlentities($row[1]); ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="ptype" id="packagetype" value="<?php echo htmlentities($row[2]); ?>" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="plocation" id="packagelocation" value="<?php echo htmlentities($row[3]); ?>" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="pprice" id="packageprice" value="<?php echo htmlentities($row[4]); ?>" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="pfeatures" id="packagefeatures" value="<?php echo htmlentities($row[5]); ?>" required>
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
									<div class="col-sm-8">
										<input type="textarea" class="form-control" name="pdetails" id="packagedetails" value="<?php echo htmlentities($row[6]); ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
									<div class="col-sm-8">
										<img src="<?php echo "images/" . $row[7]; ?>" height="60px" height="60px"> <a href="change-image.php?pid=<?php echo htmlentities($row[0]); ?>" style="background-color:white" ;>Change Image</a>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" name="update" class="btn-primary btn">Update</button>
									</div>
								</div>
								<?php
						}
								?>
						</div>
						</form>
						<div class="panel-footer">

						</div>
						</form>
					</div>
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
				<div class="inner-block">

				</div>
			</div>
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
</body>

</html>