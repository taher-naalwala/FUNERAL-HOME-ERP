<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$year = date('Y');

$c_d = $date;
$admin_id = $_SESSION['admin_id_qabrastan'];
if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] > $c_d) {
    $access = $_SESSION['access_qabrastan'];
    $admin_role = $_SESSION['role_qabrastan'];
} else if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] <= $c_d) {
    header("Location: maintainence.php");

    die();
} else {
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title>Qabrastan Software</title>


    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/feather.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome-n.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <?php
    require('style.php');
    if ($admin_role == 0) {
        require('connectDB.php');
        date_default_timezone_set('Asia/Kolkata');
        $year = date('Y');
        $date = $year . "-01-01";
        $sql = "SELECT SUM(amt) AS voluntary FROM dafan_receipt where date>='$date' and status=0";
        $run = $conn->query($sql);
        if ($run->num_rows > 0) {
            $row = $run->fetch_assoc();
            $voluntary = $row['voluntary'];
        } else {
            $voluntary = 0;
        }
       
        $sqlm = "SELECT SUM(amt) AS voucher FROM voucher_info where date>='$date' and status=0";
        $runm = $conn->query($sqlm);
        if ($runm->num_rows > 0) {
            $rowm = $runm->fetch_assoc();
            $voucher = $rowm['voucher'];
        } else {
            $voucher = 0;
        }
        $balance = $voluntary - $voucher;
        $i = 1;



        $sql = "SELECT count(*) as total_qabar from qabar_info where status!=2";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_qabar = $row['total_qabar'];

        $sql = "SELECT count(*) as total_qabar_occupied from qabar_info where status=1 or harwai_status=1";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_qabar_occupied = $row['total_qabar_occupied'];

        $sql = "SELECT count(*) as total_qabar_vacant from qabar_info where status=0";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_qabar_vacant = $row['total_qabar_vacant'];

        $sql = "SELECT count(*) as total_dafan from dafan_info where status!=1";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_dafan = $row['total_dafan'];

        $sql = "SELECT count(*) as total_dafan_payment_received from dafan_info where status!=1 and payment_status=1";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_dafan_payment_received = $row['total_dafan_payment_received'];

        $sql = "SELECT count(*) as total_dafan_payment_pending from dafan_info where status!=1 and payment_status=0";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_dafan_payment_pending = $row['total_dafan_payment_pending'];


        $sql = "SELECT count(*) as total_harwai from harwai_info where status!=1";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_harwai = $row['total_harwai'];

        $sql = "SELECT count(*) as total_harwai_payment_received from harwai_info where status!=1 and payment_status=1";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_harwai_payment_received = $row['total_harwai_payment_received'];

        $sql = "SELECT count(*) as total_harwai_payment_pending from harwai_info where status!=1 and payment_status=0";
        $run = $conn->query($sql);
        $row = $run->fetch_assoc();
        $total_harwai_payment_pending = $row['total_harwai_payment_pending'];

        /*
    $month_amt_array = "";
    while ($i <= 12) {
        $start_date = $year . "-" . $i . "-01";
        $end_date = $year . "-" . $i . "-32";
        $s1 = "SELECT SUM(amt) AS month_amt FROM dafan_receipt where date>='$start_date' and date<='$end_date'";
        $run1 = $conn->query($s1);
        $row1 = $run1->fetch_assoc();
        $month_amt = $row1['month_amt'];
        if (is_null($month_amt)) {
            $month_amt_array = $month_amt_array . "0,";
        } else {
            $month_amt_array = $month_amt_array . $month_amt . ",";
        }

        $i++;
    }
 */

        $s1 = "SELECT amt,date from dafan_receipt WHERE status=0 AND date LIKE '$year%' ";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) {
            $events_months = array();
            $jan_count = 0;
            $feb_count = 0;
            $mar_count = 0;
            $apr_count = 0;
            $may_count = 0;
            $jun_count = 0;
            $jul_count = 0;
            $aug_count = 0;
            $sep_count = 0;
            $oct_count = 0;
            $nov_count = 0;
            $dec_count = 0;
            $event_count_month = array();
            while ($row3 = $r1->fetch_assoc()) {
                $event_start_date = $row3['date'];
                $year = substr($event_start_date, 0, 4);
                if (strpos($event_start_date, "-06-") !== false) {
                    array_push($events_months, "June " . $year);
                    $jun_count = $jun_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-07-") !== false) {
                    array_push($events_months, "July " . $year);
                    $jul_count = $jul_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-08-") !== false) {
                    array_push($events_months, "August " . $year);
                    $aug_count = $aug_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-09-") !== false) {
                    array_push($events_months, "September " . $year);
                    $sep_count = $sep_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-10-") !== false) {
                    array_push($events_months, "October " . $year);
                    $oct_count = $oct_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-11-") !== false) {
                    array_push($events_months, "November " . $year);
                    $nov_count = $nov_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-12-") !== false) {
                    array_push($events_months, "December " . $year);
                    $dec_count = $dec_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-01-") !== false) {
                    array_push($events_months, "January " . $year);
                    $jan_count = $jan_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-02-") !== false) {
                    array_push($events_months, "February " . $year);
                    $feb_count = $feb_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-03-") !== false) {
                    array_push($events_months, "March " . $year);
                    $mar_count = $mar_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-04-") !== false) {
                    array_push($events_months, "April " . $year);
                    $apr_count = $apr_count + $row3['amt'];
                }
                if (strpos($event_start_date, "-05-") !== false) {
                    array_push($events_months, "May " . $year);
                    $may_count = $may_count + $row3['amt'];
                }
            }
            $events_months_unique = array_unique($events_months);
            array_push($event_count_month, $jan_count);
            array_push($event_count_month, $feb_count);
            array_push($event_count_month, $mar_count);
            array_push($event_count_month, $apr_count);
            array_push($event_count_month, $may_count);
            array_push($event_count_month, $jun_count);
            array_push($event_count_month, $jul_count);
            array_push($event_count_month, $aug_count);
            array_push($event_count_month, $sep_count);
            array_push($event_count_month, $oct_count);
            array_push($event_count_month, $nov_count);
            array_push($event_count_month, $dec_count);
        }


    ?>


        <div class="pcoded-content">

            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="feather icon-home bg-c-blue"></i>
                            <div class="d-inline">
                                <h5>Dashboard</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class=" breadcrumb breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="main.php"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">

                            <div class="row">

                                <div class="col-md-12 col-xl-8">
                                    <div class="card sale-card">
                                        <div class="card-header">
                                            <h5>Voluntary Contribution</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="chart-area">
                                                <canvas style="height:380px" id="myAreaChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-4">
                                    <div class="card prod-p-card card-red">
                                        <div class="card-body">
                                            <div class="row align-items-center m-b-30">
                                                <div class="col">
                                                    <h6 class="m-b-5 text-white">Voluntary Contribution</h6>
                                                    <h3 class="m-b-0 f-w-700 text-white">Rs. <?php echo $voluntary ?></h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                                </div>
                                            </div>
                                            <p class="m-b-0 text-white"><span class="label label-danger m-r-10">Year <?php echo $year ?></span></p>
                                        </div>
                                    </div>
                                    <div class="card prod-p-card card-blue">
                                        <div class="card-body">
                                            <div class="row align-items-center m-b-30">
                                                <div class="col">
                                                    <h6 class="m-b-5 text-white">Voucher</h6>
                                                    <h3 class="m-b-0 f-w-700 text-white">Rs. <?php echo $voucher ?></h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-money-bill-alt text-c-blue f-18"></i>
                                                </div>
                                            </div>
                                            <p class="m-b-0 text-white"><span class="label label-primary m-r-10">Year <?php echo $year ?></span></p>
                                        </div>
                                    </div>
                                    <div class="card prod-p-card card-green">
                                        <div class="card-body">
                                            <div class="row align-items-center m-b-30">
                                                <div class="col">
                                                    <h6 class="m-b-5 text-white">Balance</h6>
                                                    <h3 class="m-b-0 f-w-700 text-white">Rs. <?php echo $balance ?></h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-money-bill-alt text-c-green f-18"></i>
                                                </div>
                                            </div>
                                            <p class="m-b-0 text-white"><span class="label label-success m-r-10">Year <?php echo $year ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">

                            <div class="row">

                                <div class="col-md-12 col-xl-12">
                                    <div class="card latest-update-card">
                                        <div class="card-header">
                                            <h5>Latest Activity</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option" style="width: 30px;">
                                                    <li class="first-opt"><i class="feather open-card-option icon-chevron-left"></i></li>
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                                    <li><i class="feather icon-trash close-card"></i></li>
                                                    <li><i class="feather open-card-option icon-chevron-left"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="latest-update-box">
                                                <?php
                                                $sql = "SELECT adminid,log,date,timestamp from user_logcat ORDER BY id DESC LIMIT 5";
                                                $run = $conn->query($sql);
                                                while ($row = $run->fetch_assoc()) {
                                                    $log = $row['log'];
                                                    $adminid = $row['adminid'];
                                                    $date_logcat=$row['date'];
                                                    $timestamp_logcat=$row['timestamp'];
                                                    $s1 = "SELECT name from web_login where id=$adminid";
                                                    $run1 = $conn->query($s1);
                                                    $row1 = $run1->fetch_assoc();
                                                    $admin_name = $row1['name'];
                                                ?>
                                                    <div class="row p-t-20 p-b-30">
                                                        <div class="col-auto text-right update-meta p-r-0">
                                                            <i class="b-primary update-icon ring"></i>
                                                        </div>
                                                        <div class="col p-l-5">

                                                            <h6><?php echo $log ?></h6>

                                                            <p class="text-muted m-b-0"><?php echo $admin_name." (".$date_logcat." ".$timestamp_logcat.")" ?></p>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xl-12">
                                    <div class="card sale-card">
                                        <div class="card-header">
                                            <h5>Qabar</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-red">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Qabar</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"><?php echo $total_qabar ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-red f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-blue">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Occupied</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"> <?php echo $total_qabar_occupied ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-blue f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-green">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Vacant</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"><?php echo $total_qabar_vacant ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-green f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">

                            <div class="row">

                                <div class="col-md-12 col-xl-12">
                                    <div class="card sale-card">
                                        <div class="card-header">
                                            <h5>Dafan</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-red">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Dafan</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"><?php echo $total_dafan ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-red f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-blue">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Payment Received</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"> <?php echo $total_dafan_payment_received ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-blue f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-green">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Payment Pending</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"><?php echo $total_dafan_payment_pending ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-green f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">

                            <div class="row">

                                <div class="col-md-12 col-xl-12">
                                    <div class="card sale-card">
                                        <div class="card-header">
                                            <h5>Harwai</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-red">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Harwai</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"><?php echo $total_harwai ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-red f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-blue">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Payment Received</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"> <?php echo $total_harwai_payment_received ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-blue f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="card prod-p-card card-green">
                                                        <div class="card-body">
                                                            <div class="row align-items-center m-b-30">
                                                                <div class="col">
                                                                    <h6 class="m-b-5 text-white">Payment Pending</h6>
                                                                    <h3 class="m-b-0 f-w-700 text-white"><?php echo $total_harwai_payment_pending ?></h3>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database text-c-green f-18"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <div id="styleSelector">
            </div>

        </div>
        </div>
        </div>
        </div>


        <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Voluntary Contribution",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [<?php
                                foreach ($event_count_month as $u) {
                                    echo '"' . $u . '",';
                                }
                                ?>],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '' + number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });
        </script>
    <?php
    }
    ?>


    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>