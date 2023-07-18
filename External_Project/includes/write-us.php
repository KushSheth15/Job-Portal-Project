<?php
error_reporting(0);
include('connection.php');
if(isset($_POST['submit']))
{
$issue=$_POST['issue'];
$description=$_POST['description'];
$email=$_SESSION['login'];
$sql="INSERT INTO  issuesTB(UserEmail,Issue,description) VALUES('$email','$issue','$description')";
$query = mysqli_query($con,$sql);
if($query)
{
$msg="Info successfully submited ";
// echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again.";
// echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
}
?>	
<head>
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

	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
							<form name="help" method="post">
								<div class="modal-body modal-spa">
									<div class="writ">
										<h4>HOW CAN WE HELP YOU</h4>
											<ul>
												
												<li class="na-me">
													<select id="country" name="issue" class="frm-field required sect" required="">
														<option value="">Select Issue</option> 		
														<option value="Booking Issues">Booking Issues</option>
														<option value="Cancellation"> Cancellation</option>
														<option value="Refund">Refund</option>
														<option value="Other">Other</option>														
													</select>
												</li>
											
												<li class="descrip">
									<input class="special" type="text" placeholder="description"  name="description" required="">
												</li>
													<div class="clearfix"></div>
											</ul>
											<div class="sub-bn">
												<form>
													<button type="submit" name="submit" class="subbtn">Submit</button>
												</form>
											</div>
									</div>
								</div>
								</form>
							</section>
					</div>
				</div>
			</div>