<?php 
session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$admin_id = $_SESSION['admin_id_qabrastan'];
require('connectDB.php');
$log = "LOGOUT FROM QABRASTAN SOFTWARE FOR ADMINID ".$admin_id;
$s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
mysqli_query($conn, $s2_log);
$_SESSION["access_qabrastan"] = "";
session_destroy();
header("Location: login.php");