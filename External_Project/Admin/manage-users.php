<html>

<head>
	<link href="style_f.css" rel='stylesheet' type='text/css' />
	<link href="manage.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="morris.css" type="text/css" />
	<link rel="stylesheet" href="icon-font.min.css" type='text/css' />
	<link href="font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="table-style.css" />
	<link rel="stylesheet" type="text/css" href="basictable.css" />
	<!-- Bootstrap Core CSS -->
	<link href="bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="js/jquery.basictable.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
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

</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php" style="background-color:white;">Home</a><i class="fa fa-angle-right"></i>Manage User</li>
				</ol>
				<div class="agile-grids">
					<div class="agile-tables">
						<!-- <div class="w3l-table-info"> -->
						<h2>Manage Users</h2>
						<div class="container table-responsive py-1">
							<table class="table table-border table-hover" id="table">
								<thead class="thead-dark">
									<tr>
										<th>Id</th>
										<th scope="">Name</th>
										<th scope="">Mobile</th>
										<th scope="">Email</th>
										<th scope="">RegDate</th>
										<th scope="">UpdateDate</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include "connection.php";
									$qry = "select * from registrationtb";
									$sql = mysqli_query($con, $qry);
									while ($row = mysqli_fetch_array($sql)) {
									?>
										<tr>
											<td><?php echo htmlentities($row[0]); ?></td>
											<td><?php echo htmlentities($row[1]); ?></td>
											<td><?php echo htmlentities($row[2]); ?></td>
											<td><?php echo htmlentities($row[3]); ?></td>
											<td><?php echo htmlentities($row[5]); ?></td>
											<td><?php echo htmlentities($row[6]); ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<?php include('sidebarmenu.php'); ?>
						</div>
					</div>

					<!-- <div class="inner-block"></div> -->
					<?php include('footer.php'); ?>

				</div>
				
			</div>
			
		</div>
	</div>

</body>

</html>