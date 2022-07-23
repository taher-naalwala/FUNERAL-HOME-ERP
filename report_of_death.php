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

    if (in_array("35", $forms_access)) {
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
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title>Report of Death</title>


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


    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.datatables.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.bootstrap4.min.css">

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
                            <h5>Report of Death</h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="report_of_death.php"> <i class="feather icon-box"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Report of Death</a> </li>
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
                                <form method="POST">
                                    <?php

                                    if (isset($_POST['submit1'])) {

                                        $its = $_POST['its'];
                                        // $qabar_no = $_POST['qabar_no'];
                                        $name = strtoupper($_POST['name']);
                                        $mother_name = strtoupper($_POST['mother_name']);
                                        $father_name = strtoupper($_POST['father_name']);
                                        $surname = strtoupper($_POST['surname']);
                                        $age = $_POST['age'];
                                        $place_of_death = $_POST['place_of_death'];
                                        $gender = $_POST['gender'];

                                        $aadhaar = $_POST['aadhaar'];
                                        $sabeel_no = $_POST['sabeel_no'];
                                        $address = strtoupper($_POST['address']);
                                        $mohalla = strtoupper($_POST['mohalla']);
                                        $b_its = $_POST['b_its'];
                                        $b_name = strtoupper($_POST['b_name']);
                                        $b_mobile = $_POST['b_mobile'];
                                        //  $unit = $_POST['unit'];
                                        // $haqq = $_POST['haqq'];
                                        $date_of_death = $_POST['date_of_death'];
                                        $hijri_date = $_POST['hijri_date'];
                                        $hijri_year = $_POST['hijri_year'];
                                        $hijri_month = $_POST['hijri_month'];


                                        $b_relation = strtoupper($_POST['b_relation']);
                                        $default_amt = $_POST['default_amt'];
                                        // $amt = $_POST['amt'];
                                        $reason = strtoupper($_POST['reason']);



                                        $s2 = "SELECT COUNT(*) AS c2 from dafan_info WHERE m_its='$its' and status!=1";
                                        $run2 = $conn->query($s2);
                                        $row2 = $run2->fetch_assoc();
                                        $c2 = $row2['c2'];
                                        if ($c2 > 0) {


                                    ?>

                                            <div class="alert alert-danger background-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>MARHOOM ITS ALREADY IN DAFAN LIST</strong>
                                            </div>
                                            <?php
                                        } else {

                                                $s3 = "INSERT INTO `dafan_info` ( `created_date`,`created_timestamp`,`created_admin_id`,`payment_status`,`father_name`,`mother_name`,`surname`,`age`,`place_of_death`,`gender`,`harwai_id`, `default_amt`, `status`, `harwai_status`, `m_its`, `m_name`, `m_address`, `m_rod`, `m_sabeel_no`, `m_mohalla`, `m_aadhaar_no`, `b_its`, `b_name`, `b_mobile`, `b_relation`, `admin_id`, `date`, `timestamp`, `date_of_death`, `hijri_date_of_death`, `hijri_month_of_death`, `hijri_year_of_death`) VALUES ('$date','$time',$admin_id,0,'$father_name','$mother_name','$surname',$age,'$place_of_death','$gender',0,'$default_amt',2,0,'$its','$name','$address','$reason','$sabeel_no','$mohalla','$aadhaar','$b_its','$b_name','$b_mobile','$b_relation',$admin_id,'$date','$time','$date_of_death',$hijri_date,'$hijri_month',$hijri_year)";
                                                if (mysqli_query($conn, $s3)) {
                                                    $s5 = "SELECT id from dafan_info where m_its='$its' and status=2";
                                                    $run5 = $conn->query($s5);
                                                    $row5 = $run5->fetch_assoc();
                                                    $dafan_id = $row5['id'];
                                                    /*   $s4 = "INSERT INTO `dafan_receipt` (  `dafan_id`,`date`,`timestamp` ,`adminid`,`status`) VALUES ($dafan_id,'$date','$time',$admin_id,0)";
                    if (mysqli_query($conn, $s4)) { */
                                            ?>
                                                    <div class="alert alert-success background-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>SUCCESS</strong>
                                                    </div>
                                                    <script type="text/javascript">
                                                        window.location = 'form_view_dafan.php?dafan_id=<?php echo $dafan_id ?>';
                                                    </script>
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

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title" align="center">MARHOOM INFO</h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">ITS</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number1" placeholder="Enter ITS" name="its" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Name" name="name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Surname</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Surname" name="surname" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Mother's Name</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Mother's Name" name="mother_name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Father's Name</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Father's Name" name="father_name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Age</label>
                                                        <div class="col-sm-10">

                                                            <input type="number" placeholder="Enter Age" name="age" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Place of Death</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Place of Death" name="place_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Gender</label>
                                                        <div class="col-sm-10">

                                                            <select class="form-control" name="gender" required>
                                                                <option value="MALE">MALE</option>
                                                                <option value="FEMALE">FEMALE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Sabeel No</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Sabeel No" name="sabeel_no" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Date of Death</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" name="date_of_death" placeholder="Select Date of Death" autocomplete="FALSE" class="form-control" id="datepicker" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Hijri Date of Death</label>
                                                        <div class="col-sm-10">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <input type="number" name="hijri_date" placeholder="Date" autocomplete="FALSE" class="form-control" required>


                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <select name="hijri_month" class="form-control" required>
                                                                        <option value="" disabled>--Hijri Month--</option>
                                                                        <option value="Moharram al-Haraam">Moharram al-Haraam</option>
                                                                        <option value="Safar al-Muzaffar">Safar al-Muzaffar</option>
                                                                        <option value="Rabi al-Awwal">Rabi al-Awwal</option>
                                                                        <option value="Rabi al-Aakhar">Rabi al-Aakhar</option>
                                                                        <option value="Jumada al-Ula">Jumada al-Ula</option>
                                                                        <option value="Jumada al-Ukhra">Jumada al-Ukhra</option>
                                                                        <option value="Rajab al-Asab">Rajab al-Asab</option>
                                                                        <option value="Shabaan al-Karim">Shabaan al-Karim</option>
                                                                        <option value="Ramadaan al-Moazzam">Ramadaan al-Moazzam</option>
                                                                        <option value="Shawwal al-Mukarram">Shawwal al-Mukarram</option>
                                                                        <option value="Zilqadah al-Haraam">Zilqadah al-Haraam</option>
                                                                        <option value="Zilhaj al-Haraam">Zilhaj al-Haraam</option>
                                                                    </select>

                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="number" name="hijri_year" placeholder="Year" autocomplete="FALSE" class="form-control" required>


                                                                </div>
                                                            </div>


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

                                                            <input type="text" placeholder="Enter Mohalla" name="mohalla" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Aadhaar Number</label>
                                                        <div class="col-sm-10">

                                                            <input type="number" placeholder="Enter Aadhaar Number" name="aadhaar" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Reason of Death</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="reason" maxlength="170" placeholder="Enter Reason of Death (170 Characters Only)"></textarea>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title" align="center">BOOKING MEMBER INFO</h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">ITS</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number2" placeholder="Enter ITS" name="b_its" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Full Name" name="b_name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Mobile Number</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="10" id="flight_number" placeholder="Enter Mobile Number" maxlength="10" name="b_mobile" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Relation</label>
                                                        <div class="col-sm-10">

                                                            <input name="b_relation" class="form-control" placeholder="Enter Relation" required>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <button name="submit1" value="submit1" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>

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
    <script type="6424b555e09833c9225d172a-text/javascript" src="js/jquery.min.js"></script>
    <script type="6424b555e09833c9225d172a-text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="6424b555e09833c9225d172a-text/javascript" src="js/popper.min.js"></script>
    <script type="6424b555e09833c9225d172a-text/javascript" src="js/bootstrap.min.js"></script>

    <script type="6424b555e09833c9225d172a-text/javascript" src="js/jquery.slimscroll.js"></script>

    <script src="js/waves.min.js" type="6424b555e09833c9225d172a-text/javascript"></script>

    <script type="6424b555e09833c9225d172a-text/javascript" src="js/modernizr.js"></script>
    <script type="6424b555e09833c9225d172a-text/javascript" src="js/css-scrollbars.js"></script>

    <script src="js/pcoded.min.js" type="6424b555e09833c9225d172a-text/javascript"></script>
    <script src="js/vertical-layout.min.js" type="6424b555e09833c9225d172a-text/javascript"></script>
    <script src="js/jquery.mcustomscrollbar.concat.min.js" type="6424b555e09833c9225d172a-text/javascript"></script>
    <script type="6424b555e09833c9225d172a-text/javascript" src="js/script.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="6424b555e09833c9225d172a-text/javascript"></script>
    <script type="6424b555e09833c9225d172a-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="js/rocket-loader.min.js" data-cf-settings="6424b555e09833c9225d172a-|49" defer=""></script>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>