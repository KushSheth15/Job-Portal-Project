<?php
error_reporting(0);
include("includes/connection.php");
$msg = 0;
$error = 0;
if (isset($_POST["confirm"])) {
    $email = $_POST['email'];
    $qry = "select Email from registrationTB where Email='$email'";
    $sql = mysqli_query($con, $qry);
    $row = mysqli_num_rows($sql);
    if ($row > 0) {
        $npass = $_POST['npass'];
        $rpass = $_POST['rpass'];
        $qry1 = "update registrationTB set Password='$npass' where Email='$email'";
        $sql1 = mysqli_query($con, $qry1);
        $msg = "Password Change Successfully";
        header("Location:Register.php");
    } else {
        $error = "Email is not valid";
    }
}
?>



<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tourism Management System</title>
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style_u.css" rel='stylesheet' type='text/css' />
    <link href="css/forgot_password.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet"><script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.npass.value != document.chngpwd.rpass.value) {
                alert("New Password and Confirm Password Field do not match  !!");
                document.chngpwd.rpass.focus();
                return false;
            }
            return true;
        }
    </script>
    <style>
        body {
            background-color: #888888;
        }
        
    </style>
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
    <div class="card login-form" style="border-radius:10px;box-shadow: 10px 10px 5px lightblue;">
        <div class="card-body">
            <h3 class="card-title text-center">Change password</h3>
            <div class="card-text">
                <form method="POST">
                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <a class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter your email</label>
                        <input type="text" class="form-control form-control-sm" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your new password</label>
                        <input type="password" class="form-control form-control-sm" name="npass" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Repeat password</label>
                        <input type="password" class="form-control form-control-sm" name="rpass" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block submit-btn" name="confirm">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</body>