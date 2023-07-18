<?php
error_reporting(0);
include("connection.php");
if (isset($_POST["create"])) {
	$pname = $_POST["pname"];
	$ptype = $_POST["ptype"];
	$plocation = $_POST["plocation"];
	$pprice = $_POST["pprice"];
	$pfeature = $_POST["pfeatures"];
	$pdetail = $_POST["pdetails"];
	$pimage = $_FILES["pimage"]["name"];
	move_uploaded_file($_FILES["pimage"]["tmp_name"], "images/" . $_FILES["pimage"]["name"]);
	$sql = "insert into packageTB(PackageID,PackageName,PackageType,Lname,Price,Features,Details,Image,CancelDate,UpdateDate) values('NULL','$pname','$ptype','$plocation','$pprice','$pfeature','$pdetail','$pimage','NULL','NULL')";
	$qry = mysqli_query($con, $sql);
	if (!$qry) {
		die("Error" . mysqli_error($con));
	}
	if ($qry) {
		$msg = "Package created successfuly";
	} else {
		$error = "Package not created";
	}
}
?>

<html>

<head>

	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
	<!-- Bootstrap CSS Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font awesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Bootstrap JS Link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
				<li class="breadcrumb-item"><a href="index.php" style="background-color:white;">Home</a><i class="fa fa-angle-right"></i>Create Package </li>
			</ol>
			<div class="grid-form">
				<div class="grid-form1">
					<h3>Create Package</h3>
					<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="pname" id="packagename" required>
									</div>
								</div><br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="ptype" id="packagetype" required>
									</div>
								</div><br>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="plocation" id="packagelocation" required>
									</div>
								</div><br>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="pprice" id="packageprice" required>
									</div>
								</div><br>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="pfeatures" id="packagefeatures" required>
									</div>
								</div><br>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" cols="50" name="pdetails" id="packagedetails" required></textarea>
									</div>
								</div><br>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
									<div class="col-sm-8">
										<input type="file" name="pimage" id="packageimage" required>
									</div>
								</div><br>

								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" name="create" class="btn-primary btn">Create</button> <button type="reset" class="btn-inverse btn">Reset</button>
									</div>
								</div>
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