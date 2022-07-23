<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');

$c_d = $date;
$admin_id = $_SESSION['admin_id_qabrastan'];
$role_admin_id = $_SESSION['role_qabrastan'];
if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] > $c_d) {
    $access = $_SESSION['access_qabrastan'];



    $forms_access = $_SESSION['forms_access_qabrastan'];

    if (in_array("4", $forms_access) || in_array("22", $forms_access)) {
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
$get_name = "DAFAN";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dafan EDIT</title>

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

            $(".datepicker").datepicker({
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
                                        <h5 class="sub-title">Edit <?php echo $get_name ?></h5>
                                        <form method="GET">


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select name="type" class="form-control" onChange="change_type()" id="type" required>
                                                        <option value="" disabled>--Type--</option>
                                                        <option value="4">Form Number</option>
                                                        <option value="0">Qabar Number</option>

                                                        <option value="3">Marhoom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="1">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label">Form Number</label>
                                                    <div class="col-sm-10">


                                                        <div class="form-group">

                                                            <input name="form_no" class="form-control" placeholder="Enter Form Number" required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="2">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label"> </label>
                                                    <div class="col-sm-10">


                                                        <button id="submit_button" style="color:#fff" name="submit" class="btn btn-primary" value="submit">Submit</button>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">

                                                    <div id="3">

                                                    </div>
                                                </div>
                                            </div>
                                        </form>



                                    </div>
                                </div>
                                <?php

                                if (isset($_POST['submit1'])) {
                                    $dafan_id = $_POST['submit1'];

                                    $its = $_POST['m_its'];
                                    $qabar_no = $_POST['input'];
                                    $name = strtoupper($_POST['m_name']);
                                    $aadhaar = $_POST['m_aadhaar_no'];
                                    $sabeel_no = $_POST['m_sabeel_no'];
                                    $address = strtoupper($_POST['m_address']);
                                    $mohalla = strtoupper($_POST['m_mohalla']);
                                    $b_its = $_POST['b_its'];
                                    $b_name = strtoupper($_POST['b_name']);
                                    $b_mobile = $_POST['b_mobile'];
                                    $receipt_date = $_POST['receipt_date'];
                                    $haqq = $_POST['haqq_un_nafs_unit'];
                                    $date_of_death = $_POST['date_of_death'];
                                    $hijri_date = $_POST['hijri_date'];
                                    $hijri_year = $_POST['hijri_year'];
                                    $hijri_month = $_POST['hijri_month'];
                                    $harwai_id = $_POST['harwai_id'];
                                    $qabar_no_original = $_POST['qabar_no_original'];
                                    $surname = $_POST['surname'];
                                    $father_name = $_POST['father_name'];
                                    $mother_name = $_POST['mother_name'];
                                    $relationship_status=$_POST['relationship_status'];
                                    $age = $_POST['age'];
                                    $place_of_death = $_POST['place_of_death'];
                                    $gender = $_POST['gender'];

                                 
                                    $b_relation = strtoupper($_POST['b_relation']);

                                    $amt = $_POST['amt'];
                                    $reason = strtoupper($_POST['m_reason']);

                                    if(isset($_POST['partner_name']))
                                    {
                                    $partner_name = strtoupper($_POST['partner_name']);
                                    $partner_aadhaar = strtoupper($_POST['partner_aadhaar']);
                                    }
                                    else
                                    {
                                        $partner_aadhaar="";
                                        $partner_name="";
                                    }

                                    $receipt_status = $_POST['receipt_status'];

                                  
                                    $dcn=$_POST['dcn'];
                                    $time_of_death=$_POST['time_of_death'];
                                    $imc_no=$_POST['imc_no'];
                                    $imc_date=$_POST['imc_date'];

                                    if ($qabar_no == $qabar_no_original) {


                                        $sql1 = "SELECT harwai_status,status FROM qabar_info WHERE number='$qabar_no'";
                                        $run1 = $conn->query($sql1);
                                        $harwai_status = 0;
                                        if ($run1->num_rows > 0) {
                                            $row1 = $run1->fetch_assoc();
                                            $harwai_status = $row1['harwai_status'];
                                            $qabar_s = $row1['status'];
                                        }
                                        if ($role_admin_id == 0) {
                                            $s1 = "UPDATE dafan_info SET partner_name='$partner_name',partner_aadhaar='$partner_aadhaar',relationship_status='$relationship_status',surname='$surname',father_name='$father_name',mother_name='$mother_name',place_of_death='$place_of_death',gender='$gender',age=$age,harwai_status=$harwai_status,amt='$amt',haqq_un_nafs_unit='$haqq',m_rod='$reason',m_its='$its',qabar_no='$qabar_no',m_name='$name',m_aadhaar_no='$aadhaar',m_sabeel_no='$sabeel_no',m_address='$address',m_mohalla='$mohalla',b_its='$b_its',b_name='$b_name',b_mobile='$b_mobile',b_relation='$b_relation',status=$receipt_status,admin_id=$admin_id,date='$date',timestamp='$time',date_of_death='$date_of_death',hijri_date_of_death='$hijri_date',hijri_month_of_death='$hijri_month',hijri_year_of_death='$hijri_year',death_certificate_number='$dcn',time_of_death='$time_of_death',imc_no='$imc_no',imc_date='$imc_date' WHERE id=$dafan_id";
                                        } else {
                                            $s1 = "UPDATE dafan_info SET partner_name='$partner_name',partner_aadhaar='$partner_aadhaar',relationship_status='$relationship_status',surname='$surname',father_name='$father_name',mother_name='$mother_name',place_of_death='$place_of_death',gender='$gender',age=$age,harwai_status=$harwai_status,amt='$amt',haqq_un_nafs_unit='$haqq',m_rod='$reason',m_its='$its',qabar_no='$qabar_no',m_name='$name',m_aadhaar_no='$aadhaar',m_sabeel_no='$sabeel_no',m_address='$address',m_mohalla='$mohalla',b_its='$b_its',b_name='$b_name',b_mobile='$b_mobile',b_relation='$b_relation',admin_id=$admin_id,date='$date',timestamp='$time',date_of_death='$date_of_death',hijri_date_of_death='$hijri_date',hijri_month_of_death='$hijri_month',hijri_year_of_death='$hijri_year',death_certificate_number='$dcn',time_of_death='$time_of_death',imc_no='$imc_no',imc_date='$imc_date' WHERE id=$dafan_id";
                                        }

                                        if (mysqli_query($conn, $s1)) {
                                            $log = "EDITED DAFAN ENTRY FOR ".$name;
                                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time')";
                                            mysqli_query($conn, $s2_log);
                                            if ($receipt_status == 1) {
                                                $qabar_status = 0;
                                            } else {
                                                $qabar_status = 1;
                                            }
                                            $s3 = "UPDATE qabar_info set status=$qabar_status where number='$qabar_no'";
                                            if (mysqli_query($conn, $s3)) {


                                                if ($harwai_status == 1) {
                                                    $s4 = "UPDATE harwai_qabar SET status=$qabar_status WHERE harwai_id=$harwai_id and qabar_no='$qabar_no'";
                                                    if (mysqli_query($conn, $s4)) {
                                                       
                                                       
                    
                    
                                ?>
                                                        <div class="alert alert-success background-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                            <strong>SUCCESS &nbsp; </strong>

                                                        </div>
                                                        <script type="text/javascript">
                                                            window.open('form_view_dafan.php?dafan_id=<?php echo $dafan_id ?>', '_blank');
                                                        </script>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="alert alert-success background-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>SUCCESS &nbsp; </strong>

                                                    </div>
                                                    <script type="text/javascript">
                                                        window.open('form_view_dafan.php?dafan_id=<?php echo $dafan_id ?>', '_blank');
                                                    </script>

                                                    <?php
                                                }
                                            }
                                        }
                                    } else {

                                        $sql = "SELECT harwai_status FROM qabar_info WHERE status=0 and number='$qabar_no'";
                                        $run = $conn->query($sql);
                                        if ($run->num_rows > 0) {
                                            $row = $run->fetch_assoc();
                                            $harwai_status = $row['harwai_status'];
                                            if ($harwai_status == 1) {

                                                if ($harwai_id != 0) {

                                                    $s1 = "SELECT COUNT(*) as c from harwai_qabar where harwai_id=$harwai_id and status=0 and qabar_no='$qabar_no'";
                                                    $run1 = $conn->query($s1);
                                                    $row1 = $run1->fetch_assoc();
                                                    $c = $row1['c'];

                                                    if ($c > 0) {
                                                        if ($role_admin_id == 0) {

                                                            $s1 = "UPDATE dafan_info SET partner_name='$partner_name',partner_aadhaar='$partner_aadhaar',relationship_status='$relationship_status',surname='$surname',father_name='$father_name',mother_name='$mother_name',place_of_death='$place_of_death',gender='$gender',age=$age,harwai_status=$harwai_status,amt='$amt',haqq_un_nafs_unit='$haqq',m_rod='$reason',m_its='$its',qabar_no='$qabar_no',m_name='$name',m_aadhaar_no='$aadhaar',m_sabeel_no='$sabeel_no',m_address='$address',m_mohalla='$mohalla',b_its='$b_its',b_name='$b_name',b_mobile='$b_mobile',b_relation='$b_relation',status=$receipt_status,admin_id=$admin_id,date='$date',timestamp='$time',date_of_death='$date_of_death',hijri_date_of_death='$hijri_date',hijri_month_of_death='$hijri_month',hijri_year_of_death='$hijri_year',death_certificate_number='$dcn',time_of_death='$time_of_death',imc_no='$imc_no',imc_date='$imc_date' WHERE id=$dafan_id";
                                                        } else {
                                                            $s1 = "UPDATE dafan_info SET partner_name='$partner_name',partner_aadhaar='$partner_aadhaar',relationship_status='$relationship_status',surname='$surname',father_nameceipt_status,='$father_name',mother_name='$mother_name',place_of_death='$place_of_death',gender='$gender',age=$age,harwai_status=$harwai_status,amt='$amt',haqq_un_nafs_unit='$haqq',m_rod='$reason',m_its='$its',qabar_no='$qabar_no',m_name='$name',m_aadhaar_no='$aadhaar',m_sabeel_no='$sabeel_no',m_address='$address',m_mohalla='$mohalla',b_its='$b_its',b_name='$b_name',b_mobile='$b_mobile',b_relation='$b_relation',admin_id=$admin_id,date='$date',timestamp='$time',date_of_death='$date_of_death',hijri_date_of_death='$hijri_date',hijri_month_of_death='$hijri_month',hijri_year_of_death='$hijri_year',death_certificate_number='$dcn',time_of_death='$time_of_death',imc_no='$imc_no',imc_date='$imc_date' WHERE id=$dafan_id";
                                                        }

                                                        if (mysqli_query($conn, $s1)) {
                                                            $log = "EDITED DAFAN ENTRY FOR ".$name;
                                                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time')";
                                                            mysqli_query($conn, $s2_log);
                                                            if ($receipt_status == 1) {
                                                                $qabar_status = 0;
                                                            } else {
                                                                $qabar_status = 1;
                                                            }
                                                            $s3 = "UPDATE qabar_info set status=$qabar_status where number='$qabar_no'";
                                                            if (mysqli_query($conn, $s3)) {
                                                                $s4 = "UPDATE harwai_qabar SET status=$qabar_status WHERE harwai_id=$harwai_id and qabar_no='$qabar_no'";
                                                                if (mysqli_query($conn, $s4)) {
                                                                    $s6 = "UPDATE harwai_qabar SET status=0 where harwai_id=$harwai_id and qabar_no='$qabar_no_original'";
                                                                    if (mysqli_query($conn, $s6)) {
                                                                        $s5 = "UPDATE qabar_info SET status=0 where number='$qabar_no_original'";
                                                                        if (mysqli_query($conn, $s5)) {
                                                                            $log = "EDITED DAFAN ENTRY FOR ".$name;
                                                                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                                            mysqli_query($conn, $s2_log);
                                                    ?>
                                                                            <div class="alert alert-success background-success">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                                                </button>
                                                                                <strong>SUCCESS &nbsp; </strong>

                                                                            </div>
                                                                            <script type="text/javascript">
                                                                                window.open('form_view_dafan.php?dafan_id=<?php echo $dafan_id ?>', '_blank');
                                                                            </script>

                                                        <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        ?>
                                                        <div class="alert alert-danger background-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                            <strong>QABAR NOT AVAILABLE</strong>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>QABAR IN SOMEONE'S HARWAI</strong>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                if ($role_admin_id == 0) {

                                                    $s1 = "UPDATE dafan_info SET partner_name='$partner_name',partner_aadhaar='$partner_aadhaar',relationship_status='$relationship_status',surname='$surname',father_name='$father_name',mother_name='$mother_name',place_of_death='$place_of_death',gender='$gender',age=$age,harwai_status=0,amt='$amt',haqq_un_nafs_unit='$haqq',m_rod='$reason',m_its='$its',qabar_no='$qabar_no',m_name='$name',m_aadhaar_no='$aadhaar',m_sabeel_no='$sabeel_no',m_address='$address',m_mohalla='$mohalla',b_its='$b_its',b_name='$b_name',b_mobile='$b_mobile',b_relation='$b_relation',status=$receipt_status,admin_id=$admin_id,date='$date',timestamp='$time',date_of_death='$date_of_death',hijri_date_of_death='$hijri_date',hijri_month_of_death='$hijri_month',hijri_year_of_death='$hijri_year',death_certificate_number='$dcn',time_of_death='$time_of_death',imc_no='$imc_no',imc_date='$imc_date' WHERE id=$dafan_id";
                                                } else {
                                                    $s1 = "UPDATE dafan_info SET partner_name='$partner_name',partner_aadhaar='$partner_aadhaar',relationship_status='$relationship_status',surname='$surname',father_name='$father_name',mother_name='$mother_name',place_of_death='$place_of_death',gender='$gender',age=$age,harwai_status=0,amt='$amt',haqq_un_nafs_unit='$haqq',m_rod='$reason',m_its='$its',qabar_no='$qabar_no',m_name='$name',m_aadhaar_no='$aadhaar',m_sabeel_no='$sabeel_no',m_address='$address',m_mohalla='$mohalla',b_its='$b_its',b_name='$b_name',b_mobile='$b_mobile',b_relation='$b_relation',admin_id=$admin_id,date='$date',timestamp='$time',date_of_death='$date_of_death',hijri_date_of_death='$hijri_date',hijri_month_of_death='$hijri_month',hijri_year_of_death='$hijri_year',death_certificate_number='$dcn',time_of_death='$time_of_death',imc_no='$imc_no',imc_date='$imc_date' WHERE id=$dafan_id";
                                                }
                                                if (mysqli_query($conn, $s1)) {
                                                    $log = "EDITED DAFAN ENTRY FOR ".$name;
                                                    $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                    mysqli_query($conn, $s2_log);
                                                    if ($receipt_status == 1) {
                                                        $qabar_status = 0;
                                                    } else {
                                                        $qabar_status = 1;
                                                    }
                                                    $s3 = "UPDATE qabar_info set status=$qabar_status where number='$qabar_no'";
                                                    if (mysqli_query($conn, $s3)) {
                                                        $s5 = "UPDATE qabar_info SET status=0 where number='$qabar_no_original'";
                                                        if (mysqli_query($conn, $s5)) {
                                                            $s6 = "UPDATE harwai_qabar SET status=0 where harwai_id=$harwai_id and qabar_no='$qabar_no_original'";
                                                            if (mysqli_query($conn, $s6)) {
                                                                $log = "EDITED DAFAN ENTRY FOR ".$name;
                                                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                                mysqli_query($conn, $s2_log);
                                                    ?>
                                                                <div class="alert alert-success background-success">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                                    </button>
                                                                    <strong>SUCCESS &nbsp; </strong>

                                                                </div>
                                                                <script type="text/javascript">
                                                                    window.open('form_view_dafan.php?dafan_id=<?php echo $dafan_id ?>', '_blank');
                                                                </script>

                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            ?>
                                            <div class="alert alert-danger background-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>QABAR NOT AVAILABLE</strong>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>

                                <?php
                                if (isset($_GET['submit'])) {
                                    $type = $_GET['type'];
                                    if ($type == 0) {
                                        $qabar_no = strtoupper($_GET['qabar_no']);
                                        $sql0 = "SELECT id from dafan_info where qabar_no='$qabar_no' and status=0";
                                        $run0 = $conn->query($sql0);
                                        if ($run0->num_rows > 0) {
                                            while ($row0 = $run0->fetch_assoc()) {
                                                $dafan_id = $row0['id'];


                                ?>
                                                <div class="card">

                                                    <div class="card-block">
                                                        <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                                        <?php
                                                        require('form_dafan_edit_format.php');
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                            }
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
                                    } else if ($type == 3) {
                                        $get_id = $_GET['input'];
                                        if (strpos($get_id, '(') !== false) {

                                            $first_index = stripos($get_id, "(") + 1;
                                            $s_id_e = substr($get_id, $first_index);
                                            $get_id = rtrim($s_id_e, ") ");
                                        }
                                        $sql0 = "SELECT id from dafan_info where id=$get_id";
                                        $run0 = $conn->query($sql0);
                                        if ($run0->num_rows > 0) {
                                            while ($row0 = $run0->fetch_assoc()) {
                                                $dafan_id = $row0['id'];


                                            ?>
                                                <div class="card">

                                                    <div class="card-block">
                                                        <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                                        <?php
                                                        require('form_dafan_edit_format.php');
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                            }
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
                                        $dafan_id = $_GET['form_no'];
                                        $sql0 = "SELECT id from dafan_info where id=$dafan_id";
                                        $run0 = $conn->query($sql0);
                                        if ($run0->num_rows > 0) {

                                        ?>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                                    <?php
                                                    require('form_dafan_edit_format.php');
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
                                                <strong>NOT FOUND</strong>
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







    <script>
        function change_type() {
            $("#1").empty();
            $("#2").empty();
            $("#3").empty();

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "ajax_dafan.php?type=" + document.getElementById("type").value, false);
            xmlhttp.send(null);
            document.getElementById("1").innerHTML = xmlhttp.responseText;

            if (document.getElementById("type").value == 1) {
                document.getElementById("2").innerHTML = ' <div class="form-group row"><label class="col-sm-2 col-form-label">Harwai</label><div class="col-sm-10"><div class="form-group"> <input name="harwai_no" class="form-control" placeholder="Enter Harwai Number" required></div></div></div>';
                document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 0) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><label class="col-sm-2 col-form-label"> </label><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


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
            xmlhttp.open("GET", "ajax_dafan.php?br=" + document.getElementById("br").value, false);
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

       <?php
    require('footer.php');
    ?>
</body>

</html>