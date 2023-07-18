<?php
include("includes/connection.php");
session_start();
if (isset($_POST['submit2'])) {
    $name = $_POST['fname'];
    $mobile = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    echo $name;
    $qry = "insert into registrationTB(Name,MobileNo,Email,Password) values('$name','$mobile','$email','$pass')";
    $str = mysqli_query($con, $qry);
    if ($str) {
        $_SESSION['msg'] = "Successfully Register! Now You Can Login";
?>
        <script>
            alert("Now you can Login");
        </script>
    <?php
    } else {
        $_SESSION['msg'] = "Register Error! Again Register";
    ?>
        <script>
            alert("Error");
        </script>
<?php
    }
} elseif (isset($_POST['submit1'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $qry = "select Email,Password from registrationTB where Email='$email' and Password='$pass'";
    $str = mysqli_query($con, $qry);
    if (!$str) {
        die("Error" . mysqli_error($con));
    }
    $row = mysqli_num_rows($str);
    echo $row;
    if ($row > 0) {
        $_SESSION['login'] = $_POST['email'];
        // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        header("Location:index.php");
    }
}
?>

<script>
    function check() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_email.php",
            data: 'emailid=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                console.log(data);
                $("#checkava").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
        console.log(emailid);
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Slide Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST" name="signup">
                <label for="chk" aria-hidden="true" style="color:RebeccaPurple">Sign Up</label>
                <input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" class="in" required="">
                <input type="text" value="" placeholder="Mobile Number" maxlength="10" name="mobilenumber" autocomplete="off" class="in" required>
                <input type="text" value="" placeholder="Email ID" name="email" id="email" onBlur="check(this)" autocomplete="off" class="in" required>
                <span id="checkava" style="font-size:14px;color:red" class="spann"></span>
                <input type="password" placeholder="Password" name="pass" class="in" required>
                <input type="submit" name="submit2" id="submit" value="Sign Up" class="button">
            </form>
        </div>

        <div class="login">
            <form method="POST" name="login">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" value="" placeholder="Email id" name="email" id="email" autocomplete="off" class="in" required>
                <input type="password" name="pass" placeholder="Password" class="in" required>
                <a href="forgot-password.php" class="pass">Forgot Password</a>
                <input type="submit" name="submit1" id="submit" value="Login" class="button">
            </form>
        </div>

    </div>
</body>

</html>