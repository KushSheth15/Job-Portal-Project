<?php
include("includes/connection.php");
session_start();
if (isset($_POST['buy'])) {
  $rid = $_SESSION['uid'];
  $pid = $_GET['pid'];
  $cnumber = $_POST['number'];
  $cname = $_POST['cname'];
  $date = $_POST['date'];
  $cvv = md5($_POST['cvv']);
  $sql = "insert into paymentTB(cnumber,cname,date,cvv) values('$cnumber','$cname','$date','$cvv')";
  $qry = mysqli_query($con, $sql);
  if (!$qry) {
    die("Error" . mysqli_error($conn));
  }
  if ($qry) {
    header("Location:thankyou.php");
  }
}
?>


<head>
  <title>Tourismbly</title>
  <!-- <link rel = "icon" type = "image/png" href = "onlinelogomaker-052922-1701-3361.png"> -->
  <link href='payment.css' rel='stylesheet' type='text/css'>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container">
    <br>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php" style="background-color:white;background:none;">Home </a><i class="fa fa-angle-right"> </i>
        <a href="package-list.php" style="background-color:white;background:none"> Package List </a><i class="fa fa-angle-right"></i>
        <a href="package-details.php?pkgid=<?php echo $_SESSION['pid']; ?>&&Price=<?php echo $_SESSION['Price']; ?>" style="background-color:white;background:none"> Package Detail </a><i class="fa fa-angle-right"></i> Payment
      </li>
    </ol>
  </div>
  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card shopping-cart" style="border-radius: 15px;">
            <div class="card-body text-black">

              <div class="row">
                <div class="col-lg-6 px-5 py-4">
                  <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase"><b>Your Package</b></h3>
                  <?php
                  include('includes/connection.php');
                  $id = $_GET['pid'];
                  $email = $_SESSION['login'];

                  $sql = "select PackageName,PackageType,Image,Pprice from bookingTB s,packageTB p where BookingID IN(select max(BookingID) from bookingTB where UEmail='$email') and p.PackageID='$id'";

                  $qry = mysqli_query($con, $sql);
                  $tot = mysqli_num_rows($qry);
                  if ($tot > 0) {
                    while ($row = mysqli_fetch_array($qry)) {
                  ?>
                      <div class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0">

                          <img src="./Admin/images/<?php echo htmlentities($row['Image']); ?>" class="img-fluid" style="width: 150px" alt="Generic placeholder image" />
                        </div>
                        <div class="flex-grow-2 ms-4">
                          <!--<a href="#!" class="float-end text-black" style="background:none;margin-left:18em";><i class="fas fa-times"></i></a>-->
                          <button type="button" style="margin-left:10em" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h5 class="text-primary" style="margin-left:1em" ;><?php echo htmlentities($row['PackageName']); ?></h5>
                          <h6 style="color: #9e9e9e;margin-left:1em">Type: <?php echo htmlentities($row['PackageType']); ?></h6>
                          <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3" style="margin-left:1em">Price: <?php echo htmlentities($row['Pprice']); ?></p>

                          </div>
                        </div>
                      </div>


                      <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">


                      <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                        <h5 class="fw-bold mb-0">Total:</h5>
                        <h5 class="fw-bold mb-0"><?php echo htmlentities($row['Pprice']); ?>/-</h5>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </div>
                <div class="col-lg-6 px-5 py-4">

                  <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase"><b>Payment</b></h3>

                  <form class="mb-5" method="post">

                    <div class="form-outline mb-5">
                      <input type="text" id="typeText" class="form-control form-control-lg" size="17" name="number" minlength="12" maxlength="12" />
                      <label class="form-label" for="typeText">Card Number</label>
                    </div>

                    <div class="form-outline mb-5">
                      <input type="text" id="typeName" class="form-control form-control-lg" size="17" name="cname" />
                      <label class="form-label" for="typeName">Name on card</label>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-5">
                        <div class="form-outline">
                          <input type="text" id="typeExp" class="form-control form-control-lg" name="date" size="7" id="exp" minlength="7" maxlength="7" />
                          <label class="form-label" for="typeExp">Expiration</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-5">
                        <div class="form-outline">
                          <input type="password" id="typeText" class="form-control form-control-lg" name="cvv" size="1" minlength="3" maxlength="3" />
                          <label class="form-label" for="typeText">Cvv</label>
                        </div>
                      </div>
                    </div>
                    <?php
                    if ($_SESSION['login']) {
                    ?>
                      <button type="submit" class="btn btn-primary btn-block btn-lg" name="buy">Buy now</button>
                    <?php
                    } else {
                    ?>
                      <button type="submit" class="btn btn-primary btn-block btn-lg"><a href="Register.php" style="color:white" ;>Register</a></button>
                    <?php
                    }
                    ?>
                    </br>
                    <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                      <a href="package-list.php?pages=<?php echo 1; ?>" style="background:none" ;><i class="fas fa-angle-left me-2"></i>Back to PackageList</a>
                    </h5>

                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>