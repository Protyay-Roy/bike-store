<?php

include ("db_con.php");
session_start();

$email = $_SESSION["admin_email"];

$status = 0;
date_default_timezone_set('Asia/Dhaka');
$session = date('d-M h:i A');

$status = "UPDATE `admin` SET `a_status`='$status',`a_session`='$session' WHERE `a_email`= '$email'";
$query = $con->query($status) or die ("Status Query Failed");

unset($email);

session_destroy();

header("location:login.php");
