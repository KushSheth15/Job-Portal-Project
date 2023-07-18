<?php
// $msg = 0;
// $error = 0;
session_start();
error_reporting(0);
include('connection.php');
if ($_POST['submit'] == "Update") {
	$pagetype = $_GET['type'];
	$pagedetails = $_POST['pgedetails'];
	$sql = "UPDATE pageTB SET Detail='$pagedetails' where Type='$pagetype'";
	$qry = mysqli_query($con, $sql);
	if(!$qry)
	{
		die("Error".mysqli_error($con));
	}
	if ($qry) {
		$msg = "Page data updated  successfully";
	} else {
		$error = "Page data not updated successfully";
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Admin Package Creation</title>
	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
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

		#submit {
			margin-left: 25em;
		}
	</style>

	<script type="text/JavaScript">
		<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
	</script>
	<script type="text/javascript" src="nicEdit.js"></script>
	<script type="text/javascript">
		bkLib.onDomLoaded(function() {
			nicEditors.allTextAreas()
		});
	</script>

</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">

				<div class="clearfix"> </div>
			</div>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="dashboard.php" style="background-color:white;">Home</a><i class="fa fa-angle-right"></i>Update Page Data </li>
			</ol>
			<div class="grid-form">
				<div class="grid-form1">
					<h3>Update Page Data</h3>
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
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select page : </label></br>
									<div class="col-sm-8">
										<select name="menu1" class="form-control" data-role="select-dropdown" data-profile="minimal" onChange="MM_jumpMenu('parent',this,0)">
											<option value="" selected="selected" class="form-control">Select Pages</option>
											<option value="manage-pages.php?type=terms">Terms and Condition</option>
											<option value="manage-pages.php?type=privacy">Privacy and Policy</option>
											<option value="manage-pages.php?type=aboutus">About us</option>
											<option value="manage-pages.php?type=contact">Contact us</option>
										</select>
									</div>
								</div><br><br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Selected Page : </label></br>
									<div class="col-sm-8">
										<?php

										switch ($_GET['type']) {
											case "terms":
												echo "Terms and Conditions";
												break;

											case "privacy":
												echo "Privacy And Policy";
												break;

											case "aboutus":
												echo "About US";
												break;
											
											case "contact":
												echo "Contact Us";
												break;
											default:
												echo "";
												break;
										}
										?>
									</div>
								</div><br><br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Details : </label></br>
									<div class="col-sm-8">


										<textarea class="form-control" rows="9" cols="70" name="pgedetails" id="pgedetails" placeholder="Package Details" required>
										<?php
										$pagetype = $_GET['type'];
										$sql = "select Detail from pageTB where Type='$pagetype'";
										$qry = mysqli_query($con, $sql);
										if (!$qry) {
											die("Error" . mysqli_error($con));
										}
										while ($row = mysqli_fetch_array($qry)) {
											echo htmlentities($row['Detail']);
										}
										?>
                                        </textarea>
									</div>
								</div>
								<br><br>
								<div class="row">
									<div class="col-sm-8 col-sm-offset-3">
										<button type="submit" name="submit" value="Update" id="submit" class="btn-primary btn">Update</button>
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
	<script src="js/bootstrap.min.js"></script>

</body>

</html>