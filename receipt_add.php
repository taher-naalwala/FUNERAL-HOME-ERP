<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');

$c_d = $date;
$admin_id = $_SESSION['admin_id_qabrastan'];
if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] > $c_d) {
    $access = $_SESSION['access_qabrastan'];



    $forms_access = $_SESSION['forms_access_qabrastan'];

    if (in_array("23", $forms_access) || in_array("24", $forms_access)) {
    } else {
        header('Location:main.php');
        exit();
    }
} else if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] <= $c_d) {
    header("Location: maintainence.php");

    die();
} else {
    header("Location: login.php");
    die();
}
require('connectDB.php');
$get_name = "RECEIPT";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD RECEIPT</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Qabrastan Software" />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/feather.css">


    <link rel="stylesheet" href="css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">





    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">



    <link rel="stylesheet" type="text/css" href="css/icofont.css">

    <link rel="stylesheet" type="text/css" href="css/pages.css">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/3582a84b00.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function() {

            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                constrainInput: false
            });

        });
    </script>
</head>

<body>


    <?php
    require('search_harwai_name_css.php');
    require('style.php');

    ?>

    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-box bg-c-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo $get_name ?></h5>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="main.php"><i class="feather icon-box"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href=""><?php echo $get_name ?></a> </li>
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
                            <div class="col-sm-12">

                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">ADD <?php echo $get_name ?></h5>
                                        <form method="GET">


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select name="type" class="form-control" onChange="change_type()" id="type" required>
                                                        <option value="" disabled>--TYPE--</option>
                                                        <option value="0" selected>Dafan</option>
                                                        <option value="1">Harwai</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div id="1">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label">Category</label>
                                                    <div class="col-sm-10">

                                                        <select name="category" class="form-control" onChange="change_category()" id="category" required>
                                                            <option value="" disabled>--CATEGORY--</option>
                                                            <option value="0" selected>Form Number</option>
                                                            <option value="1">Qabar Number</option>
                                                            <option value="2">Marhoom</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="2">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label">Form Number</label>
                                                    <div class="col-sm-10">
                                                        <input name="form_no" class="form-control" placeholder="Enter Form Number" required>



                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">

                                                    <div id="3">
                                                        <button id="submit_button" style="color:#fff" name="submit" class="btn btn-primary" value="submit">Submit</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['submit'])) {
            $type = $_GET['type'];
            if ($type == 1) {
                if (isset($_POST['submit'])) {
                    $harwai_id = $_POST['submit'];
                    $amt = $_POST['amt'];
                    $receipt_name = $_POST['receipt_name'];

                    $flag = 0;
                    if (isset($_POST['receipt_no'])) {
                        $date = $_POST['receipt_date'];
                        $receipt_id = $_POST['receipt_no'];
                        $flag = 1;
                    } else {
                        $date = $date;
                        $mobile = $_POST['mobile'];
                    }


                    $mode = $_POST['mode'];
                    if (isset($_POST['cn'])) {
                        $cn = $_POST['cn'];
                    } else {
                        $cn = "";
                    }
                    if ($amt > 0) {
                        if ($flag == 0) {
                            $sql = "INSERT INTO dafan_receipt_1  ( `dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES (0,'$date','$time',$admin_id,0,$harwai_id,1,'$amt',$mode,'$cn','$receipt_name')";
                        } else {
                            $sql = "INSERT INTO dafan_receipt  ( `id`,`dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES ($receipt_id,0,'$date','$time',$admin_id,0,$harwai_id,1,'$amt',$mode,'$cn','$receipt_name')";
                        }
                        if (mysqli_query($conn, $sql)) {
                            if ($flag == 0) {
                                $s2 = "SELECT id from dafan_receipt_1 where harwai_id=$harwai_id and type=1 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                            } else {
                                $s2 = "SELECT id from dafan_receipt where harwai_id=$harwai_id and type=1 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                            }

                            $run2 = $conn->query($s2);
                            $row2 = $run2->fetch_assoc();
                            $receipt_id = $row2['id'];

        ?>
                            <div class="alert alert-success background-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>SUCCESS</strong>
                            </div>
                            <?php
                            if ($flag == 0) {
                                $log = "ADDED RECEIPT OF RS." . $amt . " FOR HARWAI ID " . $harwai_id . " AND RECEIPT ID - NW/" . $receipt_id;
                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                mysqli_query($conn, $s2_log);


                                $url = "https://www.fast2sms.com/dev/bulkV2?authorization=Pkae36riBUTxlfMJyQGOSIsE8mRKYZX0dDA4VFjc7wb1nCNtohhVNsOKJqjRFMGU3fYbkSeyr7gnudoQ&route=dlt&sender_id=DBJIND&message=137431&variables_values=" . $amt . "%7C" . $date . "%7C" . $receipt_id . "%7C&flash=0&numbers=" . $mobile;
                                $ch = curl_init();

                                // set url 
                                curl_setopt($ch, CURLOPT_URL, $url);

                                //return the transfer as a string 
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                                // $output contains the output string 
                                $output = curl_exec($ch);


                                // close curl resource to free up system resources 
                                curl_close($ch);
                            ?>
                                <script type="text/javascript">
                                    window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=new', '_blank');
                                </script>
                            <?php
                            } else {
                                $log = "ADDED RECEIPT OF RS." . $amt . " FOR HARWAI ID " . $harwai_id . " AND RECEIPT ID - OD/" . $receipt_id;
                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                mysqli_query($conn, $s2_log);
                            ?>
                                <script type="text/javascript">
                                    window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=old', '_blank');
                                </script>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger background-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>FAIL</strong>
                            </div>
                        <?php
                        }
                    } else {
                        $log = "ADDED RECEIPT OF RS. 0 FOR HARWAI ID " . $harwai_id;
                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                        mysqli_query($conn, $s2_log);
                        ?>

                        <div class="alert alert-success background-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>SUCCESS</strong>
                        </div>
                        <?php


                    }
                }
                if (isset($_POST['full'])) {
                    $harwai_id = $_POST['full'];
                    $amt = $_POST['amt'];
                    $receipt_name = $_POST['receipt_name'];
                    $flag = 0;

                    if (isset($_POST['receipt_no'])) {
                        $date = $_POST['receipt_date'];
                        $receipt_id = $_POST['receipt_no'];
                        $flag = 1;
                    } else {
                        $date = $date;
                        $mobile = $_POST['mobile'];
                    }

                    $mode = $_POST['mode'];
                    if (isset($_POST['cn'])) {
                        $cn = $_POST['cn'];
                    } else {
                        $cn = "";
                    }
                    if ($amt > 0) {
                        if ($flag == 0) {
                            $sql = "INSERT INTO dafan_receipt_1  ( `dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES (0,'$date','$time',$admin_id,0,$harwai_id,1,'$amt',$mode,'$cn','$receipt_name')";
                        } else {
                            $sql = "INSERT INTO dafan_receipt  ( `id`,`dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES ($receipt_id,0,'$date','$time',$admin_id,0,$harwai_id,1,'$amt',$mode,'$cn','$receipt_name')";
                        }
                        if (mysqli_query($conn, $sql)) {
                            $sql1 = "UPDATE harwai_info set payment_status=1 where id=$harwai_id";
                            if (mysqli_query($conn, $sql1)) {
                                if ($flag == 0) {
                                    $s2 = "SELECT id from dafan_receipt_1 where harwai_id=$harwai_id and type=1 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                                } else {
                                    $s2 = "SELECT id from dafan_receipt where harwai_id=$harwai_id and type=1 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                                }
                                $run2 = $conn->query($s2);
                                $row2 = $run2->fetch_assoc();
                                $receipt_id = $row2['id'];
                                $log = "ADDED RECEIPT OF RS." . $amt . " FOR HARWAI ID " . $harwai_id . " AND MARK AS FULL PAYMENT RECEIVED";
                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                mysqli_query($conn, $s2_log);

                        ?>
                                <div class="alert alert-success background-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong>SUCCESS</strong>
                                </div>
                                <?php
                                if ($flag == 0) {

                                    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=Pkae36riBUTxlfMJyQGOSIsE8mRKYZX0dDA4VFjc7wb1nCNtohhVNsOKJqjRFMGU3fYbkSeyr7gnudoQ&route=dlt&sender_id=DBJIND&message=137431&variables_values=" . $amt . "%7C" . $date . "%7C" . $receipt_id . "%7C&flash=0&numbers=" . $mobile;
                                    $ch = curl_init();

                                    // set url 
                                    curl_setopt($ch, CURLOPT_URL, $url);

                                    //return the transfer as a string 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                                    // $output contains the output string 
                                    $output = curl_exec($ch);


                                    // close curl resource to free up system resources 
                                    curl_close($ch);
                                ?>
                                    <script type="text/javascript">
                                        window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=new', '_blank');
                                    </script>
                                <?php
                                } else {
                                ?>
                                    <script type="text/javascript">
                                        window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=old', '_blank');
                                    </script>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong>FAIL</strong>
                                </div>
                            <?php
                            }
                        }
                    } else {
                        $log = "ADDED RECEIPT OF RS. 0 FOR HARWAI ID " . $harwai_id . " AND MARK AS FULL PAYMENT RECEIVED";
                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                        mysqli_query($conn, $s2_log);
                        $sql1 = "UPDATE harwai_info set payment_status=1 where id=$harwai_id";
                        if (mysqli_query($conn, $sql1)) {
                            ?>
                            <div class="alert alert-success background-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>SUCCESS</strong>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger background-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>FAIL</strong>
                            </div>
                    <?php
                        }
                    }
                }
                $br = $_GET['br'];
                if ($br == 0) {
                    $harwai_id = $_GET['harwai_no'];
                    $sql = "SELECT COUNT(*) as c FROM harwai_info where id=$harwai_id";
                    $s2 = "SELECT * from harwai_info where id=$harwai_id";
                } else {

                    $get_its = $_GET['input'];
                    if (strpos($get_its, '(') !== false) {

                        $first_index = stripos($get_its, "(") + 1;
                        $s_id_e = substr($get_its, $first_index);
                        $get_its = rtrim($s_id_e, ") ");
                    }

                    $sql = "SELECT COUNT(*) as c FROM harwai_info where id='$get_its'";
                    $s2 = "SELECT * from harwai_info where id='$get_its'";
                }
                $run = $conn->query($sql);
                $row = $run->fetch_assoc();
                $c = $row['c'];
                if ($c > 0) {


                    $s1 = "SELECT name,address,reg_no from trust_info";
                    $run1 = $conn->query($s1);
                    $row1 = $run1->fetch_assoc();
                    $trust_name = $row1['name'];
                    $trust_address = $row1['address'];
                    $trust_reg = $row1['reg_no'];

                    $run2 = $conn->query($s2);
                    $row5 = $run2->fetch_assoc();
                    $harwai_id = $row5['id'];

                    $its = $row5['its'];
                    $name = $row5['name'];
                    $sabeel_no = $row5['sabeel_no'];
                    $address = $row5['address'];
                    $mohalla = $row5['mohalla'];
                    $mobile = $row5['mobile'];
                    $b_its = $row5['n_its'];
                    $b_name = $row5['n_name'];
                    $b_mobile = $row5['n_mobile'];
                    $b_sabeel_no = $row5['n_sabeel_no'];
                    $b_address = $row5['n_address'];
                    $b_mohalla = $row5['n_mohalla'];
                    $harwai_status = $row5['status'];
                    $payment_status = $row5['payment_status'];
                    $harwai_created_date = $row5['created_date'];



                    $b_relation = $row5['n_relation'];
                    $amt = $row5['amt'];
                    $s6 = "SELECT qabar_no from harwai_qabar where harwai_id=$harwai_id";
                    $run6 = $conn->query($s6);
                    $qabar_no = "";
                    while ($row6 = $run6->fetch_assoc()) {
                        $qabar_no = $qabar_no . "" . $row6['qabar_no'] . ",";
                    }
                    $qabar_no = substr($qabar_no, 0, strlen($qabar_no) - 1);





                    ?>
                    <div class="pcoded-inner-content">

                        <div class="main-body">
                            <div class="page-wrapper">

                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Harwai Form</h5>

                                                    <?php

                                                    require('form_harwai_format.php');


                                                    ?>
                                                </div>
                                            </div>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Ledger</h5>

                                                    <?php
                                                    if ($harwai_created_date < '2022-03-01') {
                                                        $sql2 = "SELECT amt from dafan_receipt where type=1 and harwai_id=$harwai_id and status=0";
                                                        $sql01 = "SELECT amt,id,date,status from dafan_receipt where type=1 and harwai_id=$harwai_id";
                                                        $entry_type = "old";
                                                    } else {
                                                        $sql2 = "SELECT amt from dafan_receipt_1 where type=1 and harwai_id=$harwai_id and status=0";
                                                        $sql01 = "SELECT amt,id,date,status from dafan_receipt_1 where type=1 and harwai_id=$harwai_id";
                                                        $entry_type = "new";
                                                    }
                                                    $run2 = $conn->query($sql2);
                                                    if ($run2->num_rows > 0) {
                                                        $total_amt_paid = 0;
                                                        while ($row2 = $run2->fetch_assoc()) {
                                                            $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                        }
                                                    } else {
                                                        $total_amt_paid = 0;
                                                    }
                                                    $run01 = $conn->query($sql01);
                                                    require('receipt_add_table.php');


                                                    ?>
                                                </div>
                                            </div>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">ADD RECEIPT</h5>
                                                    <form method="POST">
                                                        <?php
                                                        if ($harwai_created_date < '2022-03-01') {
                                                        ?>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Receipt Number</label>
                                                                <div class="col-sm-10">

                                                                    <input type="number" name="receipt_no" placeholder="Enter Receipt Number" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="hidden" name="mobile" value="<?php echo $mobile ?>" required />
                                                        <?php
                                                        }
                                                        ?>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">

                                                                <input type="text" name="receipt_name" placeholder="Enter Name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Amount</label>
                                                            <div class="col-sm-10">

                                                                <input type="number" name="amt" placeholder="Enter Amount" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Payment Mode</label>
                                                            <div class="col-sm-10">
                                                                <select name="mode" id="mode" onchange="change_mode_receipt()" class="form-control" required>
                                                                    <option value="0">Cash</option>
                                                                    <option value="1">Cheque</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="cheque">

                                                        </div>
                                                        <?php
                                                        if ($harwai_created_date < '2022-03-01') {
                                                        ?>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Date</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="receipt_date" placeholder="Select Receipt Date" autocomplete="FALSE" class="form-control" id="datepicker" required>

                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">

                                                                <button class="btn btn-mat waves-effect waves-light btn-primary" value="<?php echo $harwai_id ?>" name="submit" value="submit">Submit</button>
                                                                <button class="btn btn-mat waves-effect waves-light btn-success" value="<?php echo $harwai_id ?>" name="full" value="submit">Full Payment Received</button>

                                                            </div>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                } else {
                ?>
                    <div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>NOT FOUND</strong>
                    </div>
                    <?php
                }
            } else {
                if (isset($_POST['submit'])) {
                    $dafan_id = $_POST['submit'];
                    $amt = $_POST['amt'];
                    $receipt_name = $_POST['receipt_name'];

                    $flag = 0;
                    if (isset($_POST['receipt_no'])) {

                        $date = $_POST['receipt_date'];
                        $receipt_id = $_POST['receipt_no'];
                        $flag = 1;
                    } else {
                        $date = $date;
                        $b_mobile = $_POST['b_mobile'];
                    }

                    $mode = $_POST['mode'];
                    if (isset($_POST['cn'])) {
                        $cn = $_POST['cn'];
                    } else {
                        $cn = "";
                    }
                    if ($amt > 0) {
                        if ($flag == 0) {
                            $sql = "INSERT INTO dafan_receipt_1  ( `dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES ($dafan_id,'$date','$time',$admin_id,0,0,0,'$amt',$mode,'$cn','$receipt_name')";
                        } else {
                            $sql = "INSERT INTO dafan_receipt  ( `id`,`dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES ($receipt_id,$dafan_id,'$date','$time',$admin_id,0,0,0,'$amt',$mode,'$cn','$receipt_name')";
                        }
                        if (mysqli_query($conn, $sql)) {
                            if ($flag == 0) {
                                $s2 = "SELECT id from dafan_receipt_1 where dafan_id=$dafan_id and type=0 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                            } else {
                                $s2 = "SELECT id from dafan_receipt where dafan_id=$dafan_id and type=0 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                            }
                            $run2 = $conn->query($s2);
                            $row2 = $run2->fetch_assoc();
                            $receipt_id = $row2['id'];

                    ?>
                            <div class="alert alert-success background-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>SUCCESS</strong>
                            </div>
                            <?php
                            if ($flag == 0) {
                                $log = "ADDED RECEIPT OF RS." . $amt . " FOR DAFAN ID " . $dafan_id . " FOR RECEIPT ID - NW/" . $receipt_id;
                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                mysqli_query($conn, $s2_log);
                                $url = "https://www.fast2sms.com/dev/bulkV2?authorization=Pkae36riBUTxlfMJyQGOSIsE8mRKYZX0dDA4VFjc7wb1nCNtohhVNsOKJqjRFMGU3fYbkSeyr7gnudoQ&route=dlt&sender_id=DBJIND&message=137431&variables_values=" . $amt . "%7C" . $date . "%7C" . $receipt_id . "%7C&flash=0&numbers=" . $b_mobile;
                                $ch = curl_init();

                                // set url 
                                curl_setopt($ch, CURLOPT_URL, $url);

                                //return the transfer as a string 
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                                // $output contains the output string 
                                $output = curl_exec($ch);


                                // close curl resource to free up system resources 
                                curl_close($ch);
                            ?>
                                <script type="text/javascript">
                                    window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=new', '_blank');
                                </script>
                            <?php
                            } else {
                                $log = "ADDED RECEIPT OF RS." . $amt . " FOR DAFAN ID " . $dafan_id . " FOR RECEIPT ID - OD/" . $receipt_id;
                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                mysqli_query($conn, $s2_log);
                            ?>
                                <script type="text/javascript">
                                    window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=old', '_blank');
                                </script>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger background-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>FAIL</strong>
                            </div>
                        <?php
                        }
                    } else {
                        $log = "ADDED RECEIPT OF RS." . $amt . " FOR DAFAN ID " . $dafan_id;
                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                        mysqli_query($conn, $s2_log);
                        ?>
                        <div class="alert alert-success background-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>SUCCESS</strong>
                        </div>
                        <?php

                    }
                }
                if (isset($_POST['full'])) {
                    $dafan_id = $_POST['full'];
                    $amt = $_POST['amt'];
                    $receipt_name = $_POST['receipt_name'];

                    $flag = 0;
                    if (isset($_POST['receipt_no'])) {
                        $date = $_POST['receipt_date'];
                        $receipt_id = $_POST['receipt_no'];
                        $flag = 1;
                    } else {
                        $date = $date;
                        $b_mobile = $_POST['b_mobile'];
                    }


                    $mode = $_POST['mode'];
                    if (isset($_POST['cn'])) {
                        $cn = $_POST['cn'];
                    } else {
                        $cn = "";
                    }
                    if ($amt > 0) {
                        if ($flag == 0) {
                            $sql = "INSERT INTO dafan_receipt_1  ( `dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES ($dafan_id,'$date','$time',$admin_id,0,0,0,'$amt',$mode,'$cn','$receipt_name')";
                        } else {
                            $sql = "INSERT INTO dafan_receipt  (`id`, `dafan_id`, `date`, `timestamp`, `adminid`, `status`, `harwai_id`, `type`, `amt`,`pay_mode`,`cn`,`name`) VALUES ($receipt_id,$dafan_id,'$date','$time',$admin_id,0,0,0,'$amt',$mode,'$cn','$receipt_name')";
                        }
                        if (mysqli_query($conn, $sql)) {
                            $sql1 = "UPDATE dafan_info set payment_status=1 where id=$dafan_id";
                            if (mysqli_query($conn, $sql1)) {
                                if ($flag == 0) {
                                    $s2 = "SELECT id from dafan_receipt_1 where dafan_id=$dafan_id and type=0 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                                } else {
                                    $s2 = "SELECT id from dafan_receipt where dafan_id=$dafan_id and type=0 and date='$date' and timestamp='$time' and adminid=$admin_id and pay_mode=$mode and cn='$cn' and name='$receipt_name'";
                                }
                                $run2 = $conn->query($s2);
                                $row2 = $run2->fetch_assoc();
                                $receipt_id = $row2['id'];
                                $log = "ADDED RECEIPT OF RS." . $amt . " FOR DAFAN ID " . $dafan_id . " AND MARK AS FULL PAYMENT RECEIVED";
                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                mysqli_query($conn, $s2_log);

                        ?>
                                <div class="alert alert-success background-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong>SUCCESS</strong>
                                </div>

                                <?php
                                if ($flag == 0) {
                                    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=Pkae36riBUTxlfMJyQGOSIsE8mRKYZX0dDA4VFjc7wb1nCNtohhVNsOKJqjRFMGU3fYbkSeyr7gnudoQ&route=dlt&sender_id=DBJIND&message=137431&variables_values=" . $amt . "%7C" . $date . "%7C" . $receipt_id . "%7C&flash=0&numbers=" . $b_mobile;
                                    $ch = curl_init();

                                    // set url 
                                    curl_setopt($ch, CURLOPT_URL, $url);

                                    //return the transfer as a string 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                                    // $output contains the output string 
                                    $output = curl_exec($ch);


                                    // close curl resource to free up system resources 
                                    curl_close($ch);
                                ?>
                                    <script type="text/javascript">
                                        window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=new', '_blank');
                                    </script>
                                <?php
                                } else {
                                ?>
                                    <script type="text/javascript">
                                        window.open('receipt_add_view.php?id=<?php echo $receipt_id ?>&entry_type=old', '_blank');
                                    </script>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong>FAIL</strong>
                                </div>
                            <?php
                            }
                        }
                    } else {
                        $log = "ADDED RECEIPT OF RS." . $amt . " FOR DAFAN ID " . $dafan_id . " AND MARK AS FULL PAYMENT RECEIVED";
                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                        mysqli_query($conn, $s2_log);
                        $sql1 = "UPDATE dafan_info set payment_status=1 where id=$dafan_id";
                        if (mysqli_query($conn, $sql1)) {
                            ?>
                            <div class="alert alert-success background-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>SUCCESS</strong>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger background-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <strong>FAIL</strong>
                            </div>
                    <?php
                        }
                    }
                }
                $category = $_GET['category'];
                if ($category == 0) {
                    $dafan_id = $_GET['form_no'];
                    $s2 = "SELECT * from dafan_info where id=$dafan_id";
                    $sql = "SELECT COUNT(*) as c FROM dafan_info where id=$dafan_id";
                } else if ($category == 1) {
                    $qabar_no = strtoupper($_GET['qabar_no']);
                    $s2 = "SELECT * from dafan_info where qabar_no='$qabar_no' and status=0";
                    $sql = "SELECT COUNT(*) as c FROM dafan_info where qabar_no='$qabar_no' and status=0";
                } else {
                    $get_its = $_GET['input'];
                    if (strpos($get_its, '(') !== false) {

                        $first_index = stripos($get_its, "(") + 1;
                        $s_id_e = substr($get_its, $first_index);
                        $get_its = rtrim($s_id_e, ") ");
                    }

                    $sql = "SELECT COUNT(*) as c FROM dafan_info where id='$get_its'";
                    $s2 = "SELECT * from dafan_info where id='$get_its'";
                }

                $run = $conn->query($sql);
                $row = $run->fetch_assoc();
                $c = $row['c'];
                if ($c > 0) {
                    $s1 = "SELECT name,address,reg_no from trust_info";
                    $run1 = $conn->query($s1);
                    $row1 = $run1->fetch_assoc();
                    $trust_name = $row1['name'];
                    $trust_address = $row1['address'];
                    $trust_reg = $row1['reg_no'];

                    $run2 = $conn->query($s2);
                    $row5 = $run2->fetch_assoc();
                    $dafan_id = $row5['id'];
                    $harwai_status = $row5['harwai_status'];
                    $qabar_no = $row5['qabar_no'];
                    $haqq_un_nafs_amt = $row5['haqq_un_nafs_amt'];

                    $its = $row5['m_its'];
                    $name = $row5['m_name'];
                    $aadhaar = $row5['m_aadhaar_no'];
                    $sabeel_no = $row5['m_sabeel_no'];
                    $address = $row5['m_address'];
                    $mohalla = $row5['m_mohalla'];
                    $b_its = $row5['b_its'];
                    $b_name = $row5['b_name'];
                    $b_mobile = $row5['b_mobile'];
                    $date_of_death = $row5['date_of_death'];
                    $hijri_date = $row5['hijri_date_of_death'];
                    $hijri_month = $row5['hijri_month_of_death'];
                    $hijri_year = $row5['hijri_year_of_death'];


                    $b_relation = $row5['b_relation'];
                    $default_amt = $row5['default_amt'];
                    $amt = $row5['amt'];
                    $reason = $row5['m_rod'];
                    $surname = $row5['surname'];
                    $father_name = $row5['father_name'];
                    $mother_name = $row5['mother_name'];
                    $age = $row5['age'];
                    $place_of_death = $row5['place_of_death'];
                    $gender = $row5['gender'];
                    $payment_status = $row5['payment_status'];
                    $time_of_death = $row5['time_of_death'];
                    $dcn = $row5['dcn'];
                    $reason_other = $row5['m_rod_other'];

                    ?>
                    <div class="pcoded-inner-content">

                        <div class="main-body">
                            <div class="page-wrapper">

                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Dafan Form</h5>

                                                    <?php

                                                    require('form_dafan_format.php');


                                                    ?>
                                                </div>
                                            </div>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Ledger</h5>

                                                    <?php

                                                    if ($date_of_death < '2022-03-01') {

                                                        $sql2 = "SELECT amt from dafan_receipt where type=0 and dafan_id=$dafan_id and status=0";
                                                        $sql01 = "SELECT amt,id,date,status from dafan_receipt where type=0 and dafan_id=$dafan_id";
                                                        $entry_type = "old";
                                                    } else {
                                                        $sql2 = "SELECT amt from dafan_receipt_1 where type=0 and dafan_id=$dafan_id and status=0";
                                                        $sql01 = "SELECT amt,id,date,status from dafan_receipt_1 where type=0 and dafan_id=$dafan_id";
                                                        $entry_type = "new";
                                                    }
                                                    $run2 = $conn->query($sql2);
                                                    if ($run2->num_rows > 0) {
                                                        $total_amt_paid = 0;
                                                        while ($row2 = $run2->fetch_assoc()) {
                                                            $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                        }
                                                    } else {
                                                        $total_amt_paid = 0;
                                                    }
                                                    $run01 = $conn->query($sql01);
                                                    require('receipt_add_table.php');


                                                    ?>
                                                </div>
                                            </div>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">ADD RECEIPT</h5>
                                                    <form method="POST">
                                                        <?php
                                                        if ($date_of_death < '2022-03-01') {
                                                        ?>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Receipt Number</label>
                                                                <div class="col-sm-10">

                                                                    <input type="number" name="receipt_no" placeholder="Enter Receipt Number" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="hidden" name="b_mobile" value="<?php echo $b_mobile ?>" required />
                                                        <?php
                                                        }
                                                        ?>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">

                                                                <input type="text" name="receipt_name" placeholder="Enter Name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Amount</label>
                                                            <div class="col-sm-10">

                                                                <input type="number" name="amt" placeholder="Enter Amount" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Payment Mode</label>
                                                            <div class="col-sm-10">
                                                                <select name="mode" id="mode" onchange="change_mode_receipt()" class="form-control" required>
                                                                    <option value="0">Cash</option>
                                                                    <option value="1">Cheque</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="cheque">

                                                        </div>
                                                        <?php
                                                        if ($date_of_death < '2022-03-01') {
                                                        ?>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Date</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="receipt_date" placeholder="Select Receipt Date" autocomplete="FALSE" class="form-control" id="datepicker" required>

                                                                </div>
                                                            </div>
                                                        <?php

                                                        }
                                                        ?>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">

                                                                <button class="btn btn-mat waves-effect waves-light btn-primary" value="<?php echo $dafan_id ?>" name="submit" value="submit">Submit</button>
                                                                <button class="btn btn-mat waves-effect waves-light btn-success" value="<?php echo $dafan_id ?>" name="full" value="submit">Full Payment Received</button>

                                                            </div>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                } else {
                ?>
                    <div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>NOT FOUND</strong>
                    </div>
        <?php
                }
            }
        }
        ?>

    </div>



    <script>
        function change_type() {
            $("#1").empty();
            $("#2").empty();
            $("#3").empty();

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "ajax_receipt.php?type=" + document.getElementById("type").value, false);
            xmlhttp.send(null);
            document.getElementById("1").innerHTML = xmlhttp.responseText;

            if (document.getElementById("type").value == 1) {
                document.getElementById("2").innerHTML = ' <div class="form-group row"><label class="col-sm-2 col-form-label">Harwai Number</label><div class="col-sm-10"><div class="form-group"> <input name="harwai_no" class="form-control" placeholder="Enter Harwai Number" required></div></div></div>';
                document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 0) {
                document.getElementById("2").innerHTML = '<div class="form-group row"> <label class="col-sm-2 col-form-label">Form Number</label> <div class="col-sm-10"> <input name="form_no" class="form-control" placeholder="Enter Form Number" required> </div> </div>';

                document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 3) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><label class="col-sm-2 col-form-label"> </label><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


            }
            if (document.getElementById("type").value == 4) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><label class="col-sm-2 col-form-label"> </label><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


            }

            if (document.getElementById("type").value == 2) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><label class="col-sm-2 col-form-label"> </label><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


            }
            $('.search-box input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("search_marhoom_name.php", {
                        term: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });




        }

        $("#input2,#input1").keyup(function() {


            $('#output').val($('#input1').val() * $('#input2').val());

        });


        function change_br() {

            $("#2").empty();


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "ajax_receipt.php?br=" + document.getElementById("br").value, false);
            xmlhttp.send(null);
            document.getElementById("2").innerHTML = xmlhttp.responseText;


            document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';

            $('.search-box input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("search_harwai_name.php", {
                        term: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });





        }

        function change_category() {

            $("#2").empty();


            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "ajax_receipt.php?category=" + document.getElementById("category").value, false);
            xmlhttp.send(null);
            document.getElementById("2").innerHTML = xmlhttp.responseText;


            document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';

            $('.search-box input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("search_marhoom_name.php", {
                        term: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });





        }
    </script>
    <script>
        function change_mode_receipt() {
            var xmlhttp = new XMLHttpRequest();
            var type = document.getElementById("mode").value;
            if (type == "1") {
                document.getElementById("cheque").innerHTML = ' <div class="form-group row"><label class="col-sm-2 col-form-label">Cheque No.</label><div class="col-sm-10"><input class="form-control" type="text" name="cn" placeholder="Enter Cheque No." required/></div></div>';

            } else {
                document.getElementById("cheque").innerHTML = "";
            }
        }
    </script>
    <?php
    require('footer.php');
    ?>
</body>

</html>