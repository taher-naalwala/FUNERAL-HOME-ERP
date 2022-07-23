<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');

$c_d = $date;
$admin_id = $_SESSION['admin_id_qabrastan'];
if ($_SESSION['access_qabrastan'] == "1" && $_SESSION['exp_date_qabrastan'] > $c_d) {
    $access = $_SESSION['access_qabrastan'];



    $forms_access = $_SESSION['forms_access_qabrastan'];

    if (in_array("4", $forms_access) || in_array("13", $forms_access) || in_array("21", $forms_access) || in_array("22", $forms_access)  || in_array("32", $forms_access)) {
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
$get_name = "DAFAN";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>

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
            $("#datepicker").datepicker();
        });
    </script>
</head>

<body>


    <?php
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
                                        <h5 class="sub-title">Dafan Form</h5>

                                        <?php
                                        $dafan_id = $_GET['dafan_id'];
                                       
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
                                        $haqq_un_nafs_unit = $row5['haqq_un_nafs_unit'];


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
                                        $dafan_status=$row5['status'];
                                        $time_of_death=$row5['time_of_death'];
                                        $dcn=$row5['dcn'];
                                        $reason_other=$row5['m_rod_other'];
                                        $imc_no=$row5['imc_no'];
                                        $imc_date=$row5['imc_date'];
                                        $dcn=$row5['death_certificate_number'];
                                        $relationship_status=$row5['relationship_status'];
                                        $partner_name=$row5['partner_name'];
                                        $partner_aadhaar=$row5['partner_aadhaar'];

                                        require('form_dafan_format.php');

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



    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/jquery.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/popper.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/bootstrap.min.js"></script>

    <script src="js/waves.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/jquery.slimscroll.js"></script>

    <script src="js/jquery.flot.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/jquery.flot.categories.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/curvedlines.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/jquery.flot.tooltip.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="js/chartist.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="js/amcharts.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/serial.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/light.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/vertical-layout.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/custom-dashboard.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/script.min.js"></script>

   
    <script src="js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>


</body>

</html>