<?php

$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con,"tmsproject");
if(!$con)
{
    echo "Connection failes ";
}
?>