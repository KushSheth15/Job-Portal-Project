
<?php

include("includes/connection.php");
if(!empty($_POST['emailid']))
{
    $email = $_POST['emailid'];
    if(filter_var($email , FILTER_VALIDATE_EMAIL)===false)
    {
        echo "Email is not valid";
    }
    else
    {
        $qry = "select Email from registrationTB where Email='$email'";
        $str = mysqli_query($con , $qry);
        $row = mysqli_num_rows($str);
        if($row > 0)
        {
            echo "<span style='color:red'>Email already exists.</span>";
            echo "<script>$('#submit').prop('disbale',true);</script>";
        }
        else
        {
            echo "<span style='color:green'>Email available for Registration.</span>";
            echo "<script>$('#submit').prop('disable',false);</script>";
        }
    }
}
else
{
    echo "<span style='color:red'>Email is empty</span>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>    
</body>
</html>