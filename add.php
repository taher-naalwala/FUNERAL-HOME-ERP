<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$c_d = $date;
$admin_id = $_SESSION['admin_id_qabrastan'];

if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] > $c_d) {
    $access = $_SESSION['access_qabrastan'];



    if ($_GET['name'] == "Qabar") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("2", $forms_access) || in_array("1", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "Harwai") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("11", $forms_access) || in_array("3", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "Access") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("5", $forms_access) || in_array("12", $forms_access)) {
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
    <title> Add <?php echo $get_name ?></title>


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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>


    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('.choices-multiple-remove-button', {
                removeItemButton: true,
                searchResultLimit: 5,
                renderChoiceLimit: 5
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
                                        <h5 class="sub-title">ADD <?php echo $get_name ?></h5>

                                        <?php
                                        if ($get_name == "Qabar") { ?>
                                            <?php
                                            if (isset($_POST['submit'])) {

                                                $qabar_no = strtoupper($_POST['qabar_no']);
                                                $amt = $_POST['amt'];
                                                $type = $_POST['type'];
                                                $sql = "SELECT COUNT(*) as c FROM qabar_info WHERE number='$qabar_no'";
                                                $run = $conn->query($sql);
                                                $row = $run->fetch_assoc();
                                                $count = $row['c'];
                                               
                                                if ($count > 0) {

                                            ?>
                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>Qabar Number already exists. Go to EDIT</strong>
                                                    </div>

                                                    <?php
                                                } else {
                                                    $s1 = "INSERT INTO qabar_info ( `number`, `amt`, `status`, `type`, `harwai_status`, `admin_id`, `date`, `timestamp`,`created_date`, `created_timestamp`, `created_admin_id`) VALUES ('$qabar_no','$amt',0,'$type',0,$admin_id,'$date','$time','$date','$time',$admin_id)";
                                                    if (mysqli_query($conn, $s1)) {
                                                        $log = " ADDED QABAR NUMBER ".$qabar_no;
                                                        $s2 = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                        mysqli_query($conn, $s2);

                                                    ?>
                                                        <div class="alert alert-success background-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                            <strong>Success</strong>
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
                                            ?>
                                            <form method="POST">


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Qabar Number</label>
                                                    <div class="col-sm-10">

                                                        <input type="text" placeholder="Enter Qabar No" name="qabar_no" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Amount</label>
                                                    <div class="col-sm-10">

                                                        <input type="number" name="amt" placeholder="Enter Amount" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Type</label>
                                                    <div class="col-sm-10">

                                                        <select class="form-control" name="type" required>
                                                            <option value="MITTI">MITTI</option>
                                                            <option value="CEMENT">CEMENT</option>
                                                            <option value="FINE MARBLE">FINE MARBLE</option>
                                                            <option VALUE="EMPTY">EMPTY</option>
                                                            <option VALUE="BROKEN">BROKEN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">

                                                        <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>

                                                    </div>
                                                </div>


                                            </form>
                                            <?php
                                        }
                                        if ($get_name == "Harwai") {

                                            if (isset($_POST['submit1'])) {
                                                $record = explode(",",strtoupper($_POST['qabar_no']));
                                                $record_count=count($record);
                                                $count_qabar_arr=$record_count;
                                                $qabar_no_string="";
                                                for($i=0;$i<$record_count;$i++)
                                                {
                                                   $qabar_no_string=$qabar_no_string. "'".$record[$i]."',";
                                                }

                                                $qabar_no="( ".substr($qabar_no_string,0,-1)." )";
                                                $qabar_arr = preg_split("/\,/", strtoupper($_POST['qabar_no']));
                                                /*
                                                $qabar_no = "( " . $_POST['qabar_no'] . " )";
                                                $qabar_no_string = $_POST['qabar_no'];

                                                $qabar_arr = preg_split("/\,/", $qabar_no_string);
                                                $count_qabar_arr = count($qabar_arr); */

                                                $sql = "SELECT COUNT(*) AS c from qabar_info WHERE (number IN $qabar_no) AND status=0 AND harwai_status=0";
                                                $run = $conn->query($sql);
                                                $row = $run->fetch_assoc();
                                                $count = $row['c'];
                                               
                                                if ($count == $count_qabar_arr) {


                                                    $amt = strtoupper($_POST['amt']);
                                                    $its = strtoupper($_POST['its']);
                                                    $name = strtoupper($_POST['name']);
                                                    $mobile = strtoupper($_POST['mobile']);
                                                    $sabeel_no = strtoupper($_POST['sabeel_no']);
                                                    $address = strtoupper($_POST['address']);
                                                    $mohalla = strtoupper($_POST['mohalla']);
                                                    $n_its = strtoupper($_POST['n_its']);
                                                    $n_name = strtoupper($_POST['n_name']);
                                                    $n_mobile = strtoupper($_POST['n_mobile']);
                                                    $n_sabeel_no = strtoupper($_POST['n_sabeel_no']);
                                                    $n_address = strtoupper($_POST['n_address']);
                                                    $n_mohalla = strtoupper($_POST['n_mohalla']);
                                                    $n_relation = strtoupper($_POST['n_relation']);
                                                    $h_n = $_POST['h_n'];
                                                    $s2 = "SELECT COUNT(*) as c2 from harwai_info WHERE its='$its' AND status=0 and id=$h_n";
                                                    $run2 = $conn->query($s2);
                                                    $row2 = $run2->fetch_assoc();
                                                    $c2 = $row2['c2'];
                                                    if ($c2 > 0) {
                                            ?>
                                                        <div class="alert alert-danger background-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                            <strong>THIS ITS ALREADY HAS A HARWAI. EDIT IT IN HARWAI -> EDIT</strong>
                                                        </div>


                                                        <?php
                                                    } else {
                                                        $s2_ = "SELECT COUNT(*) as c3 from harwai_info WHERE status=0 and id=$h_n";
                                                        $run2_ = $conn->query($s2_);
                                                        $row2_ = $run2_->fetch_assoc();
                                                        $c3 = $row2_['c3'];
                                                        if ($c3 > 0) {
                                                        ?>
                                                            <div class="alert alert-danger background-danger">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                                </button>
                                                                <strong>HARWAI NUMBER ALREADY EXISTS</strong>
                                                            </div>
                                                            <?php
                                                        } else {

                                                            $s1 = "INSERT INTO harwai_info (`id`,`created_date`,`created_timestamp`,`created_admin_id`,`amt`, `its`, `name`, `address`, `mobile`, `sabeel_no`, `mohalla`, `n_its`, `n_name`, `n_address`, `n_sabeel_no`, `n_mohalla`, `n_mobile`, `n_relation`, `status`, `admin_id`, `date`, `timestamp`) VALUES ($h_n,'$date','$time',$admin_id,'$amt','$its','$name','$address','$mobile','$sabeel_no','$mohalla','$n_its','$n_name','$n_address','$n_sabeel_no','$n_mohalla','$n_mobile','$n_relation',0,$admin_id,'$date','$time')";
                                                            if (mysqli_query($conn, $s1)) {
                                                                $log = "ADDED HARWAI FOR ".$name." FOR QABAR NUMBERS ".$qabar_no_string;
                                                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                                mysqli_query($conn, $s2_log);
                                                                $s3 = "SELECT id from harwai_info WHERE amt='$amt' AND its='$its' AND name='$name' and address='$address' and mobile='$mobile' and sabeel_no='$sabeel_no' and mohalla='$mohalla' and status=0";
                                                                $run3 = $conn->query($s3);
                                                                $row3 = $run3->fetch_assoc();
                                                                $harwai_id = $row3['id'];
                                                                $s4 = "UPDATE qabar_info SET harwai_status=1 WHERE (number IN $qabar_no)";
                                                                if (mysqli_query($conn, $s4)) {


                                                                    foreach ($qabar_arr as $qabar_arr_value) {

                                                                        $s5 = "INSERT INTO harwai_qabar( `harwai_id`, `qabar_no`, `status`, `admin_id`, `date`, `timestamp`) VALUES ($harwai_id,'$qabar_arr_value',0,$admin_id,'$date','$time')";
                                                                        mysqli_query($conn, $s5);
                                                                    }

                                                            ?>
                                                                    <div class="alert alert-success background-success">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                                        </button>
                                                                        <strong>SUCCESS</strong>
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        window.location = 'form_view_harwai.php?harwai_id=<?php echo $harwai_id ?>';
                                                                    </script>
                                                                <?php

                                                                }
                                                            } else {

                                                                ?>
                                                                <div class="alert alert-danger background-danger">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                                    </button>
                                                                    <strong>Fail</strong>
                                                                </div>

                                                            <?php
                                                            }

                                                            ?>

                                                    <?php
                                                        }
                                                    }
                                                } else {

                                                    ?>



                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>SOME QABAR NUMBERS ENTERED ARE EITHER OCCUPIED OR IN SOMEONE'S HARWAI</strong>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <form method="POST">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Qabar Numbers</label>
                                                    <div class="col-sm-10">

                                                        <input type="text" placeholder="Enter Qabar Numbers with comma (,) eg. 41,42,43" name="qabar_no" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">

                                                        <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Check</button>

                                                    </div>
                                                </div>
                                            </form>


                                    </div>
                                </div>
                                <?php

                                            if (isset($_POST['submit'])) {
                                                $record = explode(",",strtoupper($_POST['qabar_no']));
                                                $record_count=count($record);
                                                $count_qabar_arr=$record_count;
                                                $qabar_no_string="";
                                                for($i=0;$i<$record_count;$i++)
                                                {
                                                   $qabar_no_string=$qabar_no_string. "'".$record[$i]."',";
                                                }

                                                $qabar_no="( ".substr($qabar_no_string,0,-1)." )";

                                               /* $qabar_no = "( " . strtoupper($_POST['qabar_no']) . " )";
                                                $qabar_no_string = strtoupper($_POST['qabar_no']);
                                                $qabar_arr = preg_split("/\,/", $qabar_no_string);
                                                $count_qabar_arr = count($qabar_arr);  */

                                                $sql = "SELECT COUNT(*) AS c from qabar_info WHERE (number IN $qabar_no) AND status=0 AND harwai_status=0";
                                                $run = $conn->query($sql);
                                                $row = $run->fetch_assoc();
                                                $count = $row['c'];
                                                if ($count != $count_qabar_arr) {



                                ?>
                                        <div class="alert alert-danger background-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>QABAR NUMBERS ENTERED ARE EITHER OCCUPIED OR IN SOMEONE'S HARWAI</strong>
                                        </div>
                                    <?php
                                                } else {


                                    ?>
                                        <form method="POST">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title" ALIGN="CENTER">QABAR NUMBERS: <?php echo $_POST['qabar_no']; ?></h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Harwai Number</label>
                                                        <div class="col-sm-10">

                                                            <input type="number" placeholder="Enter Harwai Number" name="h_n" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Amount</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" name="qabar_no" class="form-control" value="<?php echo $_POST['qabar_no'] ?>" onfocus="this.removeAttribute('readonly');" required />

                                                            <input type="number" placeholder="Enter Amount" name="amt" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card">

                                                        <div class="card-block">
                                                            <h5 class="sub-title" ALIGN="CENTER">PERSONAL INFO</h5>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">ITS</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter ITS" name="its" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Full Name" name="name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Sabeel No</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Sabeel No" name="sabeel_no" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Mobile Number</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Mobile Number" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="10" id="flight_number" name="mobile" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address</label>
                                                                <div class="col-sm-10">

                                                                    <textarea type="text" placeholder="Enter Address (170 Characters Only)" rows="3" cols="3" name="address" class="form-control" onfocus="this.removeAttribute('readonly');" required></textarea>


                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Mohalla</label>
                                                                <div class="col-sm-10">

                                                                   <!-- <input type="text" placeholder="Enter Mohalla" name="mohalla" class="form-control" onfocus="this.removeAttribute('readonly');" required /> -->
                                                                    <select name="mohalla" class="form-control" required>
                                                                    <option value="">--Select Mohalla--</option>
                                                                    <option value="Saify Nagar">Saify Nagar</option>
                                                                    <option value="Haidery">Haidery</option>
                                                                    <option value="Masakin-E-Saifiyah">Masakin-E-Saifiyah</option>
                                                                    <option value="Noorani Nagar">Noorani Nagar</option>
                                                                    <option value="Ammar Nagar">Ammar Nagar</option>
                                                                    <option value="Siyaganj">Siyaganj</option>
                                                                    <option value="Mufaddal Nagar">Mufaddal Nagar</option>
                                                                    <option value="Rao">Rao</option>
                                                                    <option value="Hasanji Nagar">Hasanji Nagar</option>
                                                                    <option value="Vajihi Mohalla">Vajihi Mohalla</option>
                                                                    <option value="Husaini Mohalla">Husaini Mohalla</option>
                                                                    <option value="Zainy Mohalla">Zainy Mohalla</option>
                                                                    <option value="Chawwni">Chawwni</option>
                                                                    <option value="Hakimi Bagh">Hakimi Bagh</option>
                                                                    <option value="Saifee Mohalla">Saifee Mohalla</option>


                                                                </select>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card">

                                                        <div class="card-block">
                                                            <h5 class="sub-title" ALIGN="CENTER">NOMINEE INFO</h5>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">ITS</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter ITS" name="n_its" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Full Name" name="n_name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Sabeel No</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Sabeel No" name="n_sabeel_no" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Mobile Number</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Mobile Number" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="10" id="flight_number" name="n_mobile" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address</label>
                                                                <div class="col-sm-10">

                                                                    <textarea type="text" placeholder="Enter Address (170 Characters Only)" rows="3" cols="3" name="n_address" class="form-control" onfocus="this.removeAttribute('readonly');" required></textarea>

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Mohalla</label>
                                                                <div class="col-sm-10">

                                                                   <!-- <input type="text" placeholder="Enter Mohalla" name="n_mohalla" class="form-control" onfocus="this.removeAttribute('readonly');" required /> -->
                                                                    <select name="n_mohalla" class="form-control" required>
                                                                    <option value="">--Select Mohalla--</option>
                                                                    <option value="Saify Nagar">Saify Nagar</option>
                                                                    <option value="Haidery">Haidery</option>
                                                                    <option value="Masakin-E-Saifiyah">Masakin-E-Saifiyah</option>
                                                                    <option value="Noorani Nagar">Noorani Nagar</option>
                                                                    <option value="Ammar Nagar">Ammar Nagar</option>
                                                                    <option value="Siyaganj">Siyaganj</option>
                                                                    <option value="Mufaddal Nagar">Mufaddal Nagar</option>
                                                                    <option value="Rao">Rao</option>
                                                                    <option value="Hasanji Nagar">Hasanji Nagar</option>
                                                                    <option value="Vajihi Mohalla">Vajihi Mohalla</option>
                                                                    <option value="Husaini Mohalla">Husaini Mohalla</option>
                                                                    <option value="Zainy Mohalla">Zainy Mohalla</option>
                                                                    <option value="Chawwni">Chawwni</option>
                                                                    <option value="Hakimi Bagh">Hakimi Bagh</option>
                                                                    <option value="Saifee Mohalla">Saifee Mohalla</option>


                                                                </select>

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Relation</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" placeholder="Enter Relation" name="n_relation" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button name="submit1" value="submit1" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>
                                        </form>
                                    <?php
                                                } 
                                    ?>
                            </div>

                            <?php
                                            } 
                                        }
                                        if ($get_name == "Access") {


                                            if (isset($_POST['submit'])) {
                                                $powers = $_POST['powers'];
                                                $name = strtoupper($_POST['name']);
                                                $its = $_POST['its'];
                                                $pass = $_POST['pass'];
                                                $role = $_POST['role'];
                                                $email = $_POST['email'];
                                                $mobile = $_POST['mobile'];
                                                $sql = "SELECT COUNT(*) as c from web_login WHERE its='$its'";
                                                $run = $conn->query($sql);
                                                $row_c = $run->fetch_assoc();
                                                $c = $row_c['c'];
                                              
                                                if ($c > 0) {

                            ?>
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                    </button>
                                    <strong>Account Already Exists</strong>
                                </div>
                                <?php


                                                } else {

                                                    $a_id = $_SESSION['admin_id_qabrastan'];
                                                    $s0 = "SELECT exp_date,pay_id FROM web_login WHERE id=$a_id";
                                                    $run0 = $conn->query($s0);
                                                    $row0 = $run0->fetch_assoc();
                                                    $exp_date = $row0['exp_date'];
                                                    $pay_id = $row0['pay_id'];
                                                    $s1 = "INSERT INTO web_login ( `its`, `password`, `name`, `mobile`, `role`, `email`, `exp_date`, `pay_id`) VALUES('$its','$pass','$name','$mobile',$role,'$email','$exp_date','$pay_id')";
                                                    if (mysqli_query($conn, $s1)) {
                                                        $log = "ADDED ACCESS FOR ".$name;
                                                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                        mysqli_query($conn, $s2_log);
                                                        $s2 = "SELECT id from web_login WHERE its='$its'";
                                                        $run1 = $conn->query($s2);
                                                        $row = $run1->fetch_assoc();
                                                        $id = $row['id'];
                                                        $f = 0;
                                                        $flag == 0;
                                                        if (count($powers) == 0) {
                                                        } else {
                                                            foreach ($powers as $formid) {
                                                                $s3 = "INSERT INTO access_web_login (`adminid`, `formid`) VALUES($id,$formid)";
                                                                if (mysqli_query($conn, $s3)) {
                                                                    $flag = 1;
                                                                } else {
                                                                    $flag = 0;
                                                                }
                                                            }
                                                            if ($flag == 1) {
                                ?>
                                            <div class="alert alert-success background-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>Success</strong>
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
                                                }
                                            }

                        ?>
                        <form method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">

                                    <select name="role" class="form-control fill" required>
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="0">Admin</option>

                                        <option value="1">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Powers</label>
                                <div class="col-sm-10">
                                    <select name="powers[]" class="choices-multiple-remove-button form-control fill" multiple required>

                                        <?php
                                            $sql = "SELECT name,id from form ";
                                            $run = $conn->query($sql);
                                            while ($row = $run->fetch_assoc()) {
                                                $name = $row['name'];
                                                $id = $row['id'];
                                        ?>
                                            <option value='<?php echo $id  ?>'><?php echo $name ?></option>


                                        <?php   }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ITS</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" max="99999999" placeholder="Enter ITS" name="its" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Password" name="pass" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mobile Number</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" max="9999999999" placeholder="Enter Mobile" name="mobile" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    <?php
                                        }
                    ?>
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



    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>