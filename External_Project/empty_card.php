<?php
session_start();
error_reporting(0);
include('includes/connection.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Empty Card </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='css/empty_card.css' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
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
    <!--//end-animate-->
</head>

<body>
    <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls-text-center">
                            <!-- <img src="https://i.imgur.com/dCdfIKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"> -->
                            <h3><strong>Your Cart is Empty</strong></h3>
                            <h4>Add something to make me happy:)</h4>
                            <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- /contact ---->
    <?php include('includes/footer.php'); ?>


    <!-- write us -->
    <?php include('includes/write-us.php'); ?>
    <!-- //write us -->
</body>

</html>