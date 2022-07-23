<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$c_d = $date;
$admin_id = $_SESSION['admin_id_qabrastan'];

if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] > $c_d) {
    $access = $_SESSION['access_qabrastan'];



    if ($_GET['name'] == "Voucher") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("17", $forms_access) || in_array("14", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }


    if ($_GET['name'] == "Access") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("20", $forms_access) || in_array("5", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "RECEIPT") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("23", $forms_access) || in_array("31", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "Qabar") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("1", $forms_access) || in_array("30", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }
} else if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] <= $c_d) {
    header("Location: maintainence.php");

    die();
} else {
    header("Location: login.php");
    die();
}
$get_name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title> DELETE <?php echo $get_name ?></title>


    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

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

    ?>
    <?php
    require('style.php');
    require('connectDB.php');

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
                                        <h5 class="sub-title">DELETE <?php echo $get_name ?></h5>
                                        <?php if ($_GET['name'] == "Voucher") { ?>
                                            <form method="POST">
                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input name="id" type="number" placeholder="Enter Voucher Number" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <button name="submit" class="btn btn-primary" value='submit'>Submit</button>

                                                    </div>

                                                </div>
                                            </form>
                                    </div>
                                </div>
                                <?php
                                            if (isset($_POST['submit'])) {
                                                $voucher_id = $_POST['id'];
                                                $s0 = "SELECT * from voucher_info where id=$voucher_id";
                                                $run0 = $conn->query($s0);
                                                if ($run0->num_rows > 0) {
                                                    $row1 = $run0->fetch_assoc();

                                                    $amount = $row1['amt'];

                                                    $name = $row1['name'];
                                                    $trust_id = $row1['trust_id'];
                                                    $check_number = $row1['cn'];

                                                    $pay_mode = $row1['pay_mode'];

                                                    $voucher_date = $row1['date'];

                                                    $voucher_status = $row1['status'];

                                                    $account = $row1['account_of'];
                                                    $bill = $row1['bill_no'];
                                                    $option = $row1['debit'];
                                ?>



                                        <div class="card">

                                            <div class="card-block">
                                                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this receipt?');">

                                                    <?php
                                                    if ($voucher_status == 1) { ?>
                                                        <button name="delete" class="btn btn-danger float-right" disabled>DELETED</button>
                                                        <br>
                                                        <br>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <button name="delete" value="<?php echo $voucher_id ?>" class="btn btn-danger float-right">DELETE</button>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    <?php
                                                    }
                                                    ?>
                                                </form>

                                                <?php
                                                    require('voucher_view_format.php');
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                                } else {
                                    ?>
                                        <div class="alert alert-danger background-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>NO VOUCHER FOUND</strong>
                                        </div>
                                <?php
                                                }
                                            }
                                ?>
                                <?php
                                            if (isset($_POST['delete'])) {
                                                $voucher_id = $_POST['delete'];
                                               

                                                $sql = "UPDATE voucher_info SET status=1 WHERE id=$voucher_id";

                                                if (mysqli_query($conn, $sql)) {
                                                    $url = "?id=" . $voucher_id;
                                                    $log = "DELETED VOUCHER ENTRY FOR VOUCHER ID".$voucher_id;
                                                    $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                    mysqli_query($conn, $s2_log);
                                                   
                                ?>
                                        <div class="alert alert-success background-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>SUCCESS</strong>
                                        </div>

                                        <script type="text/javascript">
                                            window.open('voucher_add_view.php<?php echo $url ?>', '_blank');
                                        </script>
                                        <?php
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

                                ?>
                            <?php
                                        }


                            ?>
                            <?php if ($_GET['name'] == "Access") { ?>
                                <form method="POST">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <select class="form-control" name="adminid">
                                                    <option value='' disabled>Select Admin</option>
                                                    <?php require('connectDB.php');
                                                    $sql = "SELECT name,id from web_login";
                                                    $run = $conn->query($sql);
                                                    while ($row = $run->fetch_assoc()) {
                                                        $id = $row['id'];
                                                        $name = $row['name'];
                                                    ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>

                                                    <?php   }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <button name="editaccess" value="Add" class=" btn  btn-primary ">Remove</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['editaccess'])) {
                                        $adminid = $_POST['adminid'];
                                      
                                       
                                        $sql = "DELETE from web_login WHERE id=$adminid";
                                        if (mysqli_query($conn, $sql)) {
                                            $log = "DELETED ACCESS FOR ADMINID".$adminid;
                                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                            mysqli_query($conn, $s2_log);
                                    ?>
                                            <div class="alert alert-success background-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>ACCESS REMOVED</strong>
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

                                    ?>
                                </form>
                            <?php
                            }
                            if ($_GET['name'] == "RECEIPT") { ?>
                                <form method="POST">
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Receipt Type</label>
                                        <div class="col-sm-10">


                                            <div class="form-group">
                                                <select name="receipt_type" class="form-control" required>

                                                    <option value="" disabled>--RECEIPT TYPE</option>
                                                    <option value="NW">NEW (NW)</option>
                                                    <option value="OD">OLD (OD)</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Receipt Number</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input name="receipt_no" type="number" placeholder="Enter Receipt Number" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"> </label>
                                        <div class="col-sm-10">
                                            <button name="submit" class="btn btn-primary" value='submit'>Submit</button>
                                        </div>
                                    </div>

                           
                            </form>

                        </div>
                    </div>
                    <?php
                                if (isset($_POST['delete'])) {
                                    $receipt_id = $_POST['delete'];
                                    $receipt_type = $_POST['receipt_type'];
                                   
                                   

                                    if ($receipt_type == "NW") {
                                        $sql = "UPDATE dafan_receipt_1 SET status=1 WHERE id=$receipt_id";
                                    } else {
                                        $sql = "UPDATE dafan_receipt SET status=1 WHERE id=$receipt_id";
                                    }


                                    if (mysqli_query($conn, $sql)) {
                                        $url = "?id=" . $receipt_id;
                                        $log = "DELETED RECEIPT ENTRY FOR RECEIPT NUMBER".$receipt_type."/".$receipt_id;
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
                                        if ($receipt_type == "NW") {
                            ?>
                                <script type="text/javascript">
                                    window.open('receipt_add_view.php<?php echo $url ?>&entry_type=new', '_blank');
                                </script>
                            <?php
                                        } else {
                            ?>

                                <script type="text/javascript">
                                    window.open('receipt_add_view.php<?php echo $url ?>&entry_type=old', '_blank');
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

                    ?>
                    <?php
                                if (isset($_POST['submit'])) {
                                    $type = $_POST['type'];
                                    $receipt_number = $_POST['receipt_no'];
                                    $receipt_type = $_POST['receipt_type'];
                                    if ($receipt_type == "NW") {
                                        $entry_type = "new";

                                        $sql = "SELECT dafan_id,harwai_id,type,amt,status FROM dafan_receipt_1 where id=$receipt_number";
                                    } else {
                                        $entry_type = "old";
                                        $sql = "SELECT dafan_id,harwai_id,type,amt,status FROM dafan_receipt where id=$receipt_number";
                                    }
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        $row = $run->fetch_assoc();
                                        $type = $row['type'];
                                        $harwai_id = $row['harwai_id'];
                                        $dafan_id = $row['dafan_id'];
                                        $amt = $row['amt'];
                                        $receipt_status = $row['status'];
                                        if ($type == 0) {
                    ?>
                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Receipt Number: <?php echo $receipt_number ?></h5>
                                        <?php
                                            $receipt_id = $receipt_number;

                                            if ($receipt_type == "NW") {

                                                $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type from dafan_receipt_1 WHERE id=$receipt_id";
                                            } else {

                                                $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type from dafan_receipt WHERE id=$receipt_id";
                                            }

                                            $run = $conn->query($sql);
                                            $row = $run->fetch_assoc();
                                            $receipt_number = $row['id'];
                                            $receipt_date = $row['date'];
                                            $receipt_status = $row['status'];
                                            $amt = $row['amt'];
                                            $dafan_id = $row['dafan_id'];
                                            $harwai_id = $row['harwai_id'];
                                            $type = $row['type'];
                                            if ($type == 0) {
                                                $s2 = "SELECT b_name,b_its,m_sabeel_no from dafan_info where id=$dafan_id";
                                                $run2 = $conn->query($s2);
                                                $row5 = $run2->fetch_assoc();


                                                $its = $row5['b_its'];
                                                $name = $row5['b_name'];

                                                $sabeel_no = $row5['m_sabeel_no'];
                                            } else {
                                                $s2 = "SELECT name,its,sabeel_no from harwai_info where id=$harwai_id";
                                                $run2 = $conn->query($s2);
                                                $row5 = $run2->fetch_assoc();


                                                $its = $row5['its'];
                                                $name = $row5['name'];

                                                $sabeel_no = $row5['sabeel_no'];
                                            }
                                            $s1 = "SELECT name,address,reg_no from trust_info";
                                            $run1 = $conn->query($s1);
                                            $row1 = $run1->fetch_assoc();
                                            $trust_name = $row1['name'];
                                            $trust_address = $row1['address'];
                                            $trust_reg = $row1['reg_no'];






                                            function getIndianCurrency($number)
                                            {
                                                $decimal = round($number - ($no = floor($number)), 2) * 100;
                                                $hundred = null;
                                                $digits_length = strlen($no);
                                                $i = 0;
                                                $str = array();
                                                $words = array(
                                                    0 => '', 1 => 'ONE', 2 => 'TWO',
                                                    3 => 'THREE', 4 => 'FOUR', 5 => 'FIVE', 6 => 'SIX',
                                                    7 => 'SEVEN', 8 => 'EIGHT', 9 => 'NINE',
                                                    10 => 'TEN', 11 => 'ELEVEN', 12 => 'TWELVE',
                                                    13 => 'THIRTEEN', 14 => 'FOURTEEN', 15 => 'FIFTEEN',
                                                    16 => 'SIXTEEN', 17 => 'SEVENTEEN', 18 => 'EIGHTEEN',
                                                    19 => 'NINETEEN', 20 => 'TWENTY', 30 => 'THIRTY',
                                                    40 => 'FORTY', 50 => 'FIFTY', 60 => 'SIXTY',
                                                    70 => 'SEVENTY', 80 => 'EIGHTY', 90 => 'NINETY'
                                                );
                                                $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
                                                while ($i < $digits_length) {
                                                    $divider = ($i == 2) ? 10 : 100;
                                                    $number = floor($no % $divider);
                                                    $no = floor($no / $divider);
                                                    $i += $divider == 10 ? 1 : 2;
                                                    if ($number) {
                                                        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
                                                        $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
                                                        $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
                                                    } else $str[] = null;
                                                }
                                                $Rupees = implode('', array_reverse($str));
                                                $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
                                                return ($Rupees ? $Rupees . 'RUPEES ' : '') . $paise;
                                            }
                                        ?>
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this receipt?');">

                                            <?php
                                            if ($receipt_status == 1) { ?>
                                                <button name="delete" class="btn btn-danger float-right" disabled>DELETED</button>
                                                <br>
                                                <br>
                                            <?php

                                            } else {
                                            ?>
                                                <button name="delete" value="<?php echo $receipt_number ?>" class="btn btn-danger float-right">DELETE</button>
                                                <br>
                                                <br>
                                                <br>
                                                <input type="hidden" name="receipt_type" value="<?php echo $receipt_type ?>" required />
                                            <?php
                                            }
                                            ?>
                                        </form>
                                        <?php

                                            require('receipt_format.php');
                                        ?>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                        <?php

                                            $s1 = "SELECT name,address,reg_no from trust_info";
                                            $run1 = $conn->query($s1);
                                            $row1 = $run1->fetch_assoc();
                                            $trust_name = $row1['name'];
                                            $trust_address = $row1['address'];
                                            $trust_reg = $row1['reg_no'];
                                            $s2 = "SELECT * from dafan_info where id=$dafan_id";
                                            $run2 = $conn->query($s2);
                                            $row5 = $run2->fetch_assoc();
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
                                            $dafan_status = $row5['status'];
                                            require('form_dafan_format.php');
                                        ?>
                                    </div>
                                </div>


                            <?php
                                        } else {

                            ?>

                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Receipt Number: <?php echo $receipt_number ?></h5>
                                        <?php
                                            $receipt_id = $receipt_number;

                                            $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type from dafan_receipt WHERE id=$receipt_id";



                                            $run = $conn->query($sql);
                                            $row = $run->fetch_assoc();
                                            $receipt_number = $row['id'];
                                            $receipt_date = $row['date'];
                                            $receipt_status = $row['status'];
                                            $amt = $row['amt'];
                                            $dafan_id = $row['dafan_id'];
                                            $harwai_id = $row['harwai_id'];
                                            $type = $row['type'];
                                            if ($type == 0) {
                                                $s2 = "SELECT b_name,b_its,m_sabeel_no from dafan_info where id=$dafan_id";
                                                $run2 = $conn->query($s2);
                                                $row5 = $run2->fetch_assoc();


                                                $its = $row5['b_its'];
                                                $name = $row5['b_name'];

                                                $sabeel_no = $row5['m_sabeel_no'];
                                            } else {
                                                $s2 = "SELECT name,its,sabeel_no from harwai_info where id=$harwai_id";
                                                $run2 = $conn->query($s2);
                                                $row5 = $run2->fetch_assoc();


                                                $its = $row5['its'];
                                                $name = $row5['name'];

                                                $sabeel_no = $row5['sabeel_no'];
                                            }
                                            $s1 = "SELECT name,address,reg_no from trust_info";
                                            $run1 = $conn->query($s1);
                                            $row1 = $run1->fetch_assoc();
                                            $trust_name = $row1['name'];
                                            $trust_address = $row1['address'];
                                            $trust_reg = $row1['reg_no'];






                                            function getIndianCurrency($number)
                                            {
                                                $decimal = round($number - ($no = floor($number)), 2) * 100;
                                                $hundred = null;
                                                $digits_length = strlen($no);
                                                $i = 0;
                                                $str = array();
                                                $words = array(
                                                    0 => '', 1 => 'ONE', 2 => 'TWO',
                                                    3 => 'THREE', 4 => 'FOUR', 5 => 'FIVE', 6 => 'SIX',
                                                    7 => 'SEVEN', 8 => 'EIGHT', 9 => 'NINE',
                                                    10 => 'TEN', 11 => 'ELEVEN', 12 => 'TWELVE',
                                                    13 => 'THIRTEEN', 14 => 'FOURTEEN', 15 => 'FIFTEEN',
                                                    16 => 'SIXTEEN', 17 => 'SEVENTEEN', 18 => 'EIGHTEEN',
                                                    19 => 'NINETEEN', 20 => 'TWENTY', 30 => 'THIRTY',
                                                    40 => 'FORTY', 50 => 'FIFTY', 60 => 'SIXTY',
                                                    70 => 'SEVENTY', 80 => 'EIGHTY', 90 => 'NINETY'
                                                );
                                                $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
                                                while ($i < $digits_length) {
                                                    $divider = ($i == 2) ? 10 : 100;
                                                    $number = floor($no % $divider);
                                                    $no = floor($no / $divider);
                                                    $i += $divider == 10 ? 1 : 2;
                                                    if ($number) {
                                                        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
                                                        $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
                                                        $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
                                                    } else $str[] = null;
                                                }
                                                $Rupees = implode('', array_reverse($str));
                                                $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
                                                return ($Rupees ? $Rupees . 'RUPEES ' : '') . $paise;
                                            }
                                        ?>
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this receipt?');">

                                            <?php
                                            if ($receipt_status == 1) { ?>
                                                <button name="delete" class="btn btn-danger float-right" disabled>DELETED</button>
                                                <br>
                                                <br>
                                            <?php

                                            } else {
                                            ?>
                                                <button name="delete" value="<?php echo $receipt_number ?>" class="btn btn-danger float-right">DELETE</button>
                                                <br>
                                                <br>
                                                <br>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                        <?php

                                            require('receipt_format.php');
                                        ?>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Form Number: <?php echo $harwai_id ?></h5>
                                        <?php



                                            $s1 = "SELECT name,address,reg_no from trust_info";
                                            $run1 = $conn->query($s1);
                                            $row1 = $run1->fetch_assoc();
                                            $trust_name = $row1['name'];
                                            $trust_address = $row1['address'];
                                            $trust_reg = $row1['reg_no'];
                                            $s2 = "SELECT * from harwai_info where id=$harwai_id";
                                            $run2 = $conn->query($s2);
                                            $row5 = $run2->fetch_assoc();

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



                                            $b_relation = $row5['n_relation'];
                                            $amt = $row5['amt'];
                                            $s6 = "SELECT qabar_no from harwai_qabar where harwai_id=$harwai_id";
                                            $run6 = $conn->query($s6);
                                            $qabar_no = "";
                                            while ($row6 = $run6->fetch_assoc()) {
                                                $qabar_no = $qabar_no . "" . $row6['qabar_no'] . ",";
                                            }
                                            $qabar_no = substr($qabar_no, 0, strlen($qabar_no) - 1);




                                            require('form_harwai_format.php');
                                        ?>
                                    </div>
                                </div>
                            <?php
                                        }
                                    } else { ?>
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


                            if ($_GET['name'] == "Qabar") { ?>
                    <form method="POST">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input name="qabar_no" type="text" placeholder="Enter Qabar Number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button name="submit" class="btn btn-primary" value='submit'>Submit</button>

                            </div>

                        </div>
                    </form>
                    <?php
                                if (isset($_POST['delete'])) {
                                    $qabar_id = $_POST['delete'];
                                   
                                    $sql = "UPDATE qabar_info set status=2 where number='$qabar_id'";
                                    if (mysqli_query($conn, $sql)) {
                                        $log = "DELETED QABAR NUMBER".$qabar_id;
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
                                }                        ?>
                    <?php

                                if (isset($_POST['submit'])) {
                                    $qabar_no = strtoupper($_POST['qabar_no']);
                                    $sql = "SELECT status,amt,type from qabar_info where number='$qabar_no' and harwai_status=0";
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        $row = $run->fetch_assoc();
                                        $status = $row['status'];
                                        $type = $row['type'];
                                        $amt = $row['amt'];
                    ?>
                </div>
            </div>
            <form method="POST">
                <div class="card">

                    <div class="card-block">
                        <h5 class="sub-title">QABAR NUMBER: <?php echo $_POST['qabar_no']; ?></h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">

                                <input type="number" placeholder="Enter Amount" name="amt" class="form-control" value="<?php echo $amt ?>" readonly required />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">

                                <select class="form-control" name="type" readonly required>
                                    <option value="<?php echo $type ?>"><?php echo $type ?></option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">

                                <select class="form-control" name="status" readonly required>
                                    <option value="<?php echo $status ?>" selected><?php if ($status == 0) {
                                                                                        echo "VACANT";
                                                                                    } else if ($status == 2) {
                                                                                        echo "DELETED";
                                                                                    } else {
                                                                                        echo "OCCUPIED";
                                                                                    } ?></option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">

                                <div id="2">
                                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this receipt?');">

                                        <?php
                                        if ($status == 1) { ?>
                                            <button name="delete" class="btn btn-danger float-right" disabled>OCCUPIED</button>
                                            <br>
                                            <br>
                                            <br>

                                        <?php

                                        } else if ($status == 0) {
                                        ?>
                                            <button name="delete" value="<?php echo $qabar_no ?>" class="btn btn-danger float-right">DELETE</button>
                                            <br>
                                            <br>
                                            <br>


                                        <?php
                                        } else {
                                        ?>
                                            <button name="delete" class="btn btn-danger float-right" disabled>DELETED</button>
                                            <br>
                                            <br>
                                            <br>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        <?php
                                    } else {
        ?>
            <div class="alert alert-danger background-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>QABAR NUMBERS ENTERED IS IN SOMEONE'S HARWAI OR NOT FOUND</strong>
            </div>
<?php
                                    }
                                }
                            }

?>

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



    <script>
        function change_mode_receipt() {
            var xmlhttp = new XMLHttpRequest();
            var type = document.getElementById("mode").value;
            if (type == "CHEQUE") {
                document.getElementById("cheque").innerHTML = ' <div class="form-group"><label>Cheque No.</label><input class="form-control" type="text" name="cn" placeholder="Enter Cheque No." /></div>';

            } else {
                document.getElementById("cheque").innerHTML = "";
            }
        }
    </script>
    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>