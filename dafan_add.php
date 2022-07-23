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

    if (in_array("4", $forms_access) || in_array("13", $forms_access)) {
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
    <title>Add Dafan</title>

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
                                        <h5 class="sub-title">ADD <?php echo $get_name ?></h5>
                                        <form method="GET">


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select name="type" class="form-control" onChange="change_type()" id="type" required>
                                                        <option value="" disabled>--Type--</option>
                                                        <option value="0">Qabar Number</option>
                                                        <option value="1">Harwai</option>
                                                        <option value="2">Budget</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="1">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label">Qabar Number</label>
                                                    <div class="col-sm-10">


                                                        <div class="form-group">

                                                            <input name="qabar_no" type="text" class="form-control" placeholder="Enter Qabar Number" required>
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
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['submit'])) {
                            $type = $_GET['type'];
                            if ($type == 0) {
                                $qabar_no = strtoupper($_GET['qabar_no']);
                                $sql = "SELECT amt from qabar_info WHERE number='$qabar_no' and status=0 and harwai_status=0";
                                $run = $conn->query($sql);
                                if ($run->num_rows > 0) {
                                    $row = $run->fetch_assoc();
                                    $amt = $row['amt'];



                        ?>
                                    <form method="POST">
                                        <?php

                                        if (isset($_POST['submit1'])) {

                                            $its = $_POST['its'];
                                            $qabar_no = $_POST['qabar_no'];
                                            $name = strtoupper($_POST['name']);
                                            $mother_name = strtoupper($_POST['mother_name']);
                                            $father_name = strtoupper($_POST['father_name']);
                                            $surname = strtoupper($_POST['surname']);
                                            $age = $_POST['age'];
                                            $place_of_death = strtoupper($_POST['place_of_death']);
                                            $gender = $_POST['gender'];

                                            $aadhaar = strtoupper($_POST['aadhaar']);
                                            $sabeel_no = $_POST['sabeel_no'];
                                            $address = $_POST['m_address'];
                                            $mohalla = strtoupper($_POST['mohalla']);
                                            $b_its = $_POST['b_its'];
                                            $b_name = strtoupper($_POST['b_name']);
                                            $b_mobile = $_POST['b_mobile'];
                                            $unit = $_POST['unit'];
                                            $haqq = $_POST['haqq'];
                                            $date_of_death = $_POST['date_of_death'];
                                            $hijri_date = $_POST['hijri_date'];
                                            $hijri_year = $_POST['hijri_year'];
                                            $hijri_month = $_POST['hijri_month'];




                                            $b_relation = strtoupper($_POST['b_relation']);
                                            $default_amt = $_POST['default_amt'];
                                            $amt = $_POST['amt'];
                                            $reason = strtoupper($_POST['reason']);
                                            $time_of_death = $_POST['time_of_death'];
                                            $relationship_status = $_POST['relationship_status'];

                                            if ($relationship_status == "Married") {
                                                $partner_name = $_POST['partner_name'];
                                                $partner_aadhaar = $_POST['partner_aadhaar'];
                                            } else {
                                                $partner_name = "";
                                                $partner_aadhaar = "";
                                            }
                                            if (isset($_POST['dcn'])) {
                                                $dcn = $_POST['dcn'];
                                            } else {
                                                $dcn = "";
                                            }
                                            if (isset($_POST['reason_other'])) {
                                                $reason_other = strtoupper($_POST['reason_other']);
                                            } else {
                                                $reason_other = "";
                                            }

                                            if (isset($_POST['imc_no'])) {
                                                $imc_no = strtoupper($_POST['imc_no']);
                                            } else {
                                                $imc_no = "";
                                            }
                                            if (isset($_POST['imc_date'])) {
                                                $imc_date = strtoupper($_POST['imc_date']);
                                            } else {
                                                $imc_date = "";
                                            }




                                            $sql = "SELECT COUNT(*) as c FROM qabar_info WHERE number='$qabar_no' and status=0 and harwai_status=0";
                                            $run = $conn->query($sql);
                                            $row = $run->fetch_assoc();
                                            $c = $row['c'];
                                            if ($c > 0) {

                                                $s2 = "SELECT COUNT(*) AS c2 from dafan_info WHERE m_its='$its' and status=0";
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

                                                    $s2 = "UPDATE qabar_info SET status=1 where number='$qabar_no'";
                                                    if (mysqli_query($conn, $s2)) {
                                                        $s3 = "INSERT INTO `dafan_info` ( `created_date`,`created_timestamp`,`created_admin_id`,`payment_status`,`father_name`,`mother_name`,`surname`,`age`,`place_of_death`,`gender`,`harwai_id`,`qabar_no`, `default_amt`, `amt`,`haqq_un_nafs_unit`,`haqq_un_nafs_amt`, `status`, `harwai_status`, `m_its`, `m_name`, `m_address`, `m_rod`, `m_sabeel_no`, `m_mohalla`, `m_aadhaar_no`, `b_its`, `b_name`, `b_mobile`, `b_relation`, `admin_id`, `date`, `timestamp`, `date_of_death`, `hijri_date_of_death`, `hijri_month_of_death`, `hijri_year_of_death`, `time_of_death`, `death_certificate_number`, `m_rod_other`,`imc_no`,`imc_date`,`relationship_status`,`partner_name`,`partner_aadhaar`) VALUES ('$date','$time',$admin_id,0,'$father_name','$mother_name','$surname',$age,'$place_of_death','$gender',0,'$qabar_no','$default_amt','$amt',$unit,$haqq,0,0,'$its','$name','$address','$reason','$sabeel_no','$mohalla','$aadhaar','$b_its','$b_name','$b_mobile','$b_relation',$admin_id,'$date','$time','$date_of_death',$hijri_date,'$hijri_month',$hijri_year,'$time_of_death','$dcn','$reason_other','$imc_no','$imc_date','$relationship_status','$partner_name','$partner_aadhaar')";
                                                        if (mysqli_query($conn, $s3)) {
                                                            $log = "ADDED DAFAN ENTRY FOR " . $name;
                                                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                            mysqli_query($conn, $s2_log);
                                                            $s5 = "SELECT id from dafan_info where m_its='$its' and status=0 and qabar_no='$qabar_no'";
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
                                                    } else {
                                                    }
                                                }
                                            } else {
                                                ?>

                                                <div class="alert alert-danger background-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                    </button>
                                                    <strong>QABAR NUMBER IS EITHER OCCUPIED OR IN SOMEONE'S HARWAI</strong>
                                                </div>


                                        <?php
                                            }
                                        }
                                        ?>
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" align="center">QABAR NUMBER: <?php echo $qabar_no ?></h5>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Default Amount</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input name="qabar_no" class="form-control" type="hidden" value="<?php echo $qabar_no ?>" required>

                                                            <input name="default_amt" class="form-control" placeholder="Enter Default Amount" value="<?php echo $amt ?>" readonly required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Amount</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input name="amt" type="number" class="form-control" placeholder="Enter Amount" required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" align="center">HAQQ UN NAFS (Rs.119/UNIT)</h5>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Unit</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="garbage" id="input1" value="<?php echo "119"; ?>" readonly>

                                                            <input type="number" name="unit" id="input2" class="form-control" placeholder="Enter Haqq un nafs Unit" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Amount</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input name="haqq" id="output" class="form-control" placeholder="Enter Amount" readonly required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" align="center">IMC</h5>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">IMC Number</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input type="text" name="imc_no" class="form-control" placeholder="Enter IMC Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <input type="date" name="imc_date" placeholder="Select IMC Date" autocomplete="FALSE" class="form-control datepic11ker">

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
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

                                                              <!--  <input type="text" placeholder="Enter Place of Death" name="place_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required />-->
                                                                <textarea class="form-control" name="place_of_death" maxlength="120" placeholder="Enter Place of Death (120 Characters Only)"></textarea>
    

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Time of Death</label>
                                                            <div class="col-sm-10">

                                                                <input type="time" placeholder="Enter Time of Death" name="time_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required />

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
                                                            <label class="col-sm-2 col-form-label">Address</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" name="m_address" maxlength="120" placeholder="Enter Address (120 Characters Only)"></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Date of Death</label>
                                                            <div class="col-sm-10">

                                                                <input type="date" name="date_of_death" placeholder="Select Date of Death" autocomplete="FALSE" class="form-control datepicker11" id="datepicke11r" required>
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
                                                                            <option value="">--Hijri Month--</option>
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
                                                            <label class="col-sm-2 col-form-label">Mohalla</label>
                                                            <div class="col-sm-10">
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


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Aadhaar Number</label>
                                                            <div class="col-sm-10">

                                                                <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="12" id="flight_number" placeholder="Enter Aadhaar Number" maxlength="12" name="aadhaar" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Relationship Status</label>
                                                            <div class="col-sm-10">

                                                                <select name="relationship_status" onchange="change_relationship_status()" id="relationship_status" class="form-control" required>
                                                                    <option value="">--Select Relationship Status--</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>

                                                                    <option value="Not Available">Not Available</option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="partner">

                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Reason of Death</label>
                                                            <div class="col-sm-10">

                                                                <select name="reason" onchange="change_reason_of_death()" id="reason_of_death" class="form-control" required>
                                                                    <option value="">--Select Reason of Death--</option>
                                                                    <option value="Natural">Natural</option>
                                                                    <option value="Critical Illness">Critical Illness</option>
                                                                    <option value="Organ Failure">Organ Failure</option>
                                                                    <option value="Diabetes">Diabetes</option>
                                                                    <option value="Cancer">Cancer</option>
                                                                    <option value="Heart Attack">Heart Attack</option>
                                                                    <option value="Accident">Accident</option>
                                                                    <option value="COVID-19">COVID-19</option>
                                                                    <option value="Suicide">Suicide</option>
                                                                    <option value="Stroke">Stroke</option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="rod">

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Death Certificate Number (Optional)</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" placeholder="Enter Death Certificate Number (Optional)" name="dcn" class="form-control" onfocus="this.removeAttribute('readonly');" />

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

                                                                <!--<input name="b_relation" class="form-control" placeholder="Enter Relation" required> -->
                                                                <select name="b_relation" class="form-control" required>
                                                                    <option value="">--Select Relation--</option>
                                                                    <option value="Mother">Mother</option>
                                                                    <option value="Father">Father</option>
                                                                    <option value="Daughter">Daughter</option>
                                                                    <option value="Son">Son</option>
                                                                    <option value="Husband">Husband</option>
                                                                    <option value="Sister">Sister</option>
                                                                    <option value="Brother">Brother</option>
                                                                    <option value="Auntie">Auntie</option>
                                                                    <option value="Uncle">Uncle</option>
                                                                    <option value="Niece">Niece</option>
                                                                    <option value="Nephew">Nephew</option>
                                                                    <option value="Cousin">Cousin</option>
                                                                    <option value="Grandmother">Grandmother</option>
                                                                    <option value="Grandfather">Grandfather</option>
                                                                    <option value="Grandson">Grandson</option>
                                                                    <option value="Granddaughter">Granddaughter</option>
                                                                    <option value="Stepsister">Stepsister</option>
                                                                    <option value="Stepbrother">Stepbrother</option>
                                                                    <option value="Stepmother">Stepmother</option>
                                                                    <option value="Stepfather">Stepfather</option>
                                                                    <option value="Stepdaughter">Stepdaughter</option>
                                                                    <option value="Stepson">Stepson</option>
                                                                    <option value="Sister in law">Sister in law</option>
                                                                    <option value="Mother in law">Mother in law</option>
                                                                    <option value="Father in law">Father in law</option>
                                                                    <option value="Daughter in law">Daughter in law</option>
                                                                    <option value="Son in law">Son in law</option>
                                                                    <option value="Friend">Friend</option>
                                                                    <option value="Family Member">Family Member</option>
                                                                    <option value="Pet">Pet</option>


                                                                </select>

                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                                <button name="submit1" value="submit1" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>

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
                                        <strong>QABAR NUMBER IS EITHER OCCUPIED OR IN SOMEONE'S HARWAI OR DOES NOT EXISTS</strong>
                                    </div>


                                <?php
                                }
                            } else if ($type == 1) {
                                $br = $_GET['br'];
                                if ($br == 0) {
                                    $harwai_no = $_GET['harwai_no'];
                                    $sql = "SELECT COUNT(*) as c FROM harwai_info where id=$harwai_no and status=0";
                                    $s1 = "SELECT id,its,name,address,sabeel_no,mohalla,amt FROM harwai_info where id=$harwai_no and status=0";
                                } else if ($br == 1) {
                                    $get_its = $_GET['input'];
                                    if (strpos($get_its, '(') !== false) {

                                        $first_index = stripos($get_its, "(") + 1;
                                        $s_id_e = substr($get_its, $first_index);
                                        $get_its = rtrim($s_id_e, ") ");
                                    }
                                    $sql = "SELECT COUNT(*) as c FROM harwai_info where its='$get_its' and status=0";
                                    $s1 = "SELECT id,its,name,address,sabeel_no,mohalla,amt FROM harwai_info where its='$get_its' and status=0";
                                } else {
                                    $qabar_no = strtoupper($_GET['qabar_no']);
                                    $sql = "SELECT COUNT(*) as c from harwai_qabar where qabar_no='$qabar_no' and status=0";
                                    $s2 = "SELECT harwai_id from harwai_qabar where qabar_no='$qabar_no' and status=0";
                                }
                                $run = $conn->query($sql);
                                $row = $run->fetch_assoc();
                                $c = $row['c'];
                                if ($c > 0) {
                                    if ($br == 2) {
                                        $run2 = $conn->query($s2);
                                        $row2 = $run2->fetch_assoc();
                                        $harwai_no = $row2['harwai_id'];
                                        $s1 = "SELECT id,its,name,address,sabeel_no,mohalla,amt FROM harwai_info where id=$harwai_no and status=0";
                                    }
                                    $run1 = $conn->query($s1);
                                    $row1 = $run1->fetch_assoc();
                                    $harwai_number = $row1['id'];
                                    $its = $row1['its'];
                                    $name = $row1['name'];
                                    $addr = $row1['address'];
                                    $sabeel_no = $row1['sabeel_no'];
                                    $mohalla = $row1['mohalla'];
                                    $default_amt = $row1['amt'];
                                ?>

                                    <form method="POST">
                                        <?php

                                        if (isset($_POST['submit1'])) {
                                            $harwai_no = $_POST['submit1'];

                                            $its = $_POST['its'];
                                            $qabar_no = $_POST['qabar_no'];
                                            $name = strtoupper($_POST['name']);
                                            $aadhaar = $_POST['aadhaar'];

                                            $sabeel_no = $_POST['sabeel_no'];
                                            $address = $_POST['m_address'];
                                            $mohalla = strtoupper($_POST['mohalla']);
                                            $b_its = $_POST['b_its'];
                                            $b_name = strtoupper($_POST['b_name']);
                                            $b_mobile = $_POST['b_mobile'];
                                            $unit = $_POST['unit'];
                                            $haqq = $_POST['haqq'];
                                            $date_of_death = $_POST['date_of_death'];
                                            $hijri_date = $_POST['hijri_date'];
                                            $hijri_year = $_POST['hijri_year'];
                                            $hijri_month = $_POST['hijri_month'];
                                            $mother_name = strtoupper($_POST['mother_name']);
                                            $father_name = strtoupper($_POST['father_name']);
                                            $surname = strtoupper($_POST['surname']);
                                            $age = $_POST['age'];
                                            $place_of_death = $_POST['place_of_death'];
                                            $gender = $_POST['gender'];




                                            $b_relation = strtoupper($_POST['b_relation']);
                                            $default_amt = $_POST['default_amt'];
                                            $amt = $_POST['amt'];
                                            $reason = strtoupper($_POST['reason']);
                                            $time_of_death = $_POST['time_of_death'];
                                            $relationship_status = $_POST['relationship_status'];
                                            if ($relationship_status == "Married") {
                                                $partner_name = $_POST['partner_name'];
                                                $partner_aadhaar = $_POST['partner_aadhaar'];
                                            } else {
                                                $partner_name = "";
                                                $partner_aadhaar = "";
                                            }
                                            if (isset($_POST['dcn'])) {
                                                $dcn = $_POST['dcn'];
                                            } else {
                                                $dcn = "";
                                            }
                                            if (isset($_POST['reason_other'])) {
                                                $reason_other = strtoupper($_POST['reason_other']);
                                            } else {
                                                $reason_other = "";
                                            }
                                            if (isset($_POST['imc_no'])) {
                                                $imc_no = strtoupper($_POST['imc_no']);
                                            } else {
                                                $imc_no = "";
                                            }
                                            if (isset($_POST['imc_date'])) {
                                                $imc_date = strtoupper($_POST['imc_date']);
                                            } else {
                                                $imc_date = "";
                                            }


                                            $sql = "SELECT COUNT(*) as c FROM qabar_info WHERE number='$qabar_no' and status=0 and harwai_status=1";
                                            $run = $conn->query($sql);
                                            $row = $run->fetch_assoc();
                                            $c = $row['c'];
                                            if ($c > 0) {

                                                $s2 = "SELECT COUNT(*) AS c2 from dafan_info WHERE m_its='$its' and status=0";
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

                                                    $s2 = "UPDATE qabar_info SET status=1 where number='$qabar_no' and status=0";
                                                    if (mysqli_query($conn, $s2)) {

                                                        $s5 = "UPDATE harwai_qabar SET status=1 where qabar_no='$qabar_no' and status=0";
                                                        if (mysqli_query($conn, $s5)) {
                                                            $s3 = "INSERT INTO `dafan_info` (  `created_date`,`created_timestamp`,`created_admin_id`, `payment_status`,`father_name`,`mother_name`,`surname`,`age`,`place_of_death`,`gender`,`harwai_id`,`qabar_no`, `default_amt`, `amt`,`haqq_un_nafs_unit`,`haqq_un_nafs_amt`, `status`, `harwai_status`, `m_its`, `m_name`, `m_address`, `m_rod`, `m_sabeel_no`, `m_mohalla`, `m_aadhaar_no`, `b_its`, `b_name`, `b_mobile`, `b_relation`, `admin_id`, `date`, `timestamp`, `date_of_death`, `hijri_date_of_death`, `hijri_month_of_death`, `hijri_year_of_death`, `time_of_death`, `death_certificate_number`, `m_rod_other`,`imc_no`,`imc_date`,`relationship_status`,`partner_name`,`partner_aadhaar`) VALUES ('$date','$time',$admin_id,0,'$father_name','$mother_name','$surname',$age,'$place_of_death','$gender',$harwai_no,'$qabar_no','$default_amt','$amt',$unit,$haqq,0,1,'$its','$name','$address','$reason','$sabeel_no','$mohalla','$aadhaar','$b_its','$b_name','$b_mobile','$b_relation',$admin_id,'$date','$time','$date_of_death',$hijri_date,'$hijri_month',$hijri_year,'$time_of_death','$dcn','$reason_other','$imc_no','$imc_date','$relationship_status','$partner_name','$partner_aadhaar')";
                                                            if (mysqli_query($conn, $s3)) {
                                                                $log = "ADDED DAFAN ENTRY FOR " . $name;
                                                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                                mysqli_query($conn, $s2_log);

                                                                $s5 = "SELECT id from dafan_info where m_its=$its and status=0 and qabar_no='$qabar_no'";
                                                                $run5 = $conn->query($s5);
                                                                $row5 = $run5->fetch_assoc();
                                                                $dafan_id = $row5['id'];
                                                                /*
                                                                $s4 = "INSERT INTO `dafan_receipt` (  `dafan_id`,`date`,`timestamp` ,`adminid`,`status`) VALUES ($dafan_id,'$date','$time',$admin_id,0)";
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
                                                ?>

                                                <div class="alert alert-danger background-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                    </button>
                                                    <strong>QABAR NUMBER IS EITHER OCCUPIED OR IN SOMEONE'S HARWAI</strong>
                                                </div>



                                        <?php
                                            }
                                        }
                                        ?>
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" align="center">HARWAI NUMBER: <?php echo $harwai_number ?></h5>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>ITS</label>

                                                            <input class="form-control" placeholder="Enter Default Amount" value="<?php echo $its ?>" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Name</label>

                                                            <input class="form-control" placeholder="Enter Default Amount" value="<?php echo $name ?>" readonly required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Address</label>

                                                            <input class="form-control" placeholder="Enter Default Amount" value="<?php echo $addr ?>" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sabeel No</label>

                                                            <input class="form-control" placeholder="Enter Default Amount" value="<?php echo $sabeel_no ?>" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Mohalla</label>
                                                            <input name="mohalla" class="form-control" placeholder="Enter Mohalla" value="<?php echo $mohalla ?>" readonly required>
                                                    

                                                          
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Default Amount</label>

                                                            <input name="default_amt" class="form-control" placeholder="Enter Default Amount" value="<?php echo $default_amt ?>" readonly required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Hubban Raqam</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input name="amt" class="form-control" placeholder="Enter Amount" required>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" ALIGN="CENTER">QABAR NUMBERS</h5>
                                                <?php
                                                $s2 = "SELECT qabar_no,status from harwai_qabar where harwai_id=$harwai_number";
                                                $run2 = $conn->query($s2);
                                                while ($row2 = $run2->fetch_assoc()) {
                                                    $qabar_no = $row2['qabar_no'];
                                                    $status = $row2['status'];
                                                    if ($status == 0) {
                                                ?>
                                                        <input type="radio" class="btn-check mr-4" name="qabar_no" value="<?php echo $qabar_no ?>" id="success-outlined<?php echo $qabar_no ?>" autocomplete="off">
                                                        <label class="btn btn-outline-success mr-4" for="success-outlined<?php echo $qabar_no ?>"><?php echo $qabar_no . " (VACANT)" ?></label>
                                                    <?php

                                                    }
                                                    if ($status == 1) {
                                                    ?>

                                                        <div class="modal fade" id="exampleModal<?php echo $qabar_no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo "Qabar Number: " . $qabar_no; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php
                                                                        $s5 = "SELECT * from dafan_info WHERE qabar_no=$qabar_no and status=0";
                                                                        $run5 = $conn->query($s5);
                                                                        $row5 = $run5->fetch_assoc();
                                                                        $its = $row5['m_its'];
                                                                        $name = $row5['m_name'];
                                                                        $aadhaar = $row5['m_aadhaar_no'];
                                                                        $sabeel_no = $row5['m_sabeel_no'];
                                                                        $address = $row5['m_address'];
                                                                        $mohalla = $row5['m_mohalla'];
                                                                        $b_its = $row5['b_its'];
                                                                        $b_name = $row5['b_name'];
                                                                        $b_mobile = $row5['b_mobile'];

                                                                        $b_relation = $row5['b_relation'];
                                                                        $default_amt = $row5['default_amt'];
                                                                        $amt = $row5['amt'];
                                                                        $reason = $row5['m_rod'];

                                                                        ?>
                                                                        <div class="table-responsive">
                                                                            <table border=1 class="table table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Marhoom Info</th>
                                                                                        <th></th>


                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>ITS: <b><?php echo $its ?></b></td>
                                                                                        <td>NAME: <b><?php echo $name ?></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>SABEEL NO: <b><?php echo $sabeel_no ?></td>
                                                                                        <td>MOHALLA: <b><?php echo $mohalla ?></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>AADHAAR NO: <b><?php echo $aadhaar ?></td>
                                                                                        <td>REASON: <b><?php echo $reason ?></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>DEFAULT AMOUNT: <b><?php echo $default_amt ?></td>
                                                                                        <td>HUBBAN RAQAM: <b><?php echo $amt ?></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ADDRESS: <b><?php echo $address ?></td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table border=1 class="table table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Booking Member Info</th>
                                                                                        <th></th>


                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>ITS: <b><?php echo $b_its ?></b></td>
                                                                                        <td>NAME: <b><?php echo $b_name ?></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>MOBILE: <b><?php echo $b_mobile ?></td>
                                                                                        <td>RELATION: <b><?php echo $b_relation ?></td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" style="color:#FFF" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input data-toggle="modal" data-target="#exampleModal<?php echo $qabar_no ?>" class="btn btn-secondary" style="color:#FFF" value="<?php echo $qabar_no . " (OCCUPIED)"; ?>" readonly />
                                                <?php
                                                    }
                                                }


                                                ?>
                                            </div>
                                        </div>
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" ALIGN="CENTER">HAQQ UN NAFS (Rs.119/UNIT)</h5>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Unit</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="garbage" id="input1" value="<?php echo "119"; ?>" readonly>

                                                            <input name="unit" id="input2" class="form-control" placeholder="Enter Haqq un nafs Unit" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Amount</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input name="haqq" id="output" class="form-control" placeholder="Enter Amount" readonly required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title" align="center">IMC</h5>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">IMC Number</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">

                                                            <input type="text" name="imc_no" class="form-control" placeholder="Enter IMC Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <input type="date" name="imc_date" placeholder="Select IMC Date" autocomplete="FALSE" class="form-control datep11icker">

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card">

                                                    <div class="card-block">
                                                        <h5 class="sub-title" ALIGN="CENTER">MARHOOM INFO</h5>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">ITS</label>
                                                            <div class="col-sm-10">

                                                                <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number1" placeholder="Enter ITS" name="its" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">

                                                                <input type="text" placeholder="Enter Full Name" name="name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

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

                                                               <!-- <input type="text" placeholder="Enter Place of Death" name="place_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required /> -->
                                                                <textarea class="form-control" name="place_of_death" maxlength="120" placeholder="Enter Place of Death (120 Characters Only)"></textarea>
    

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Time of Death</label>
                                                            <div class="col-sm-10">

                                                                <input type="time" placeholder="Enter Time of Death" name="time_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required />

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
                                                            <label class="col-sm-2 col-form-label">Address</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" name="m_address" maxlength="120" placeholder="Enter Address (120 Characters Only)"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Date of Death</label>
                                                            <div class="col-sm-10">

                                                                <input type="date" name="date_of_death" placeholder="Select Date of Death" autocomplete="FALSE" class="form-control" id="datepic11ker" required>
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
                                                                            <option value="">--Hijri Month--</option>
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
                                                            <label class="col-sm-2 col-form-label">Mohalla</label>
                                                            <div class="col-sm-10">


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


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Aadhaar Number</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="12" id="flight_number" placeholder="Enter Aadhaar Number" maxlength="12" name="aadhaar" onfocus="this.removeAttribute('readonly');" required />


                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Relationship Status</label>
                                                            <div class="col-sm-10">

                                                                <select name="relationship_status" onchange="change_relationship_status()" id="relationship_status" class="form-control" required>
                                                                    <option value="">--Select Relationship Status--</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Not Available">Not Available</option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="partner">

                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Reason of Death</label>
                                                            <div class="col-sm-10">

                                                                <select name="reason" onchange="change_reason_of_death()" id="reason_of_death" class="form-control" required>
                                                                    <option value="">--Select Reason of Death--</option>
                                                                    <option value="Natural">Natural</option>
                                                                    <option value="Critical Illness">Critical Illness</option>
                                                                    <option value="Organ Failure">Organ Failure</option>
                                                                    <option value="Diabetes">Diabetes</option>
                                                                    <option value="Cancer">Cancer</option>
                                                                    <option value="Heart Attack">Heart Attack</option>
                                                                    <option value="Accident">Accident</option>
                                                                    <option value="COVID-19">COVID-19</option>
                                                                    <option value="Suicide">Suicide</option>
                                                                    <option value="Stroke">Stroke</option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="rod">

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Death Certificate Number (Optional)</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" placeholder="Enter Death Certificate Number (Optional)" name="dcn" class="form-control" onfocus="this.removeAttribute('readonly');" />

                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">

                                                    <div class="card-block">
                                                        <h5 class="sub-title" ALIGN="CENTER">BOOKING INFO</h5>
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

                                                                <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number" placeholder="Enter Mobile Number" name="b_mobile" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Relation</label>
                                                            <div class="col-sm-10">

                                                                <select name="b_relation" class="form-control" required>
                                                                    <option value="">--Select Relation--</option>
                                                                    <option value="Mother">Mother</option>
                                                                    <option value="Father">Father</option>
                                                                    <option value="Daughter">Daughter</option>
                                                                    <option value="Son">Son</option>
                                                                    <option value="Husband">Husband</option>
                                                                    <option value="Sister">Sister</option>
                                                                    <option value="Brother">Brother</option>
                                                                    <option value="Auntie">Auntie</option>
                                                                    <option value="Uncle">Uncle</option>
                                                                    <option value="Niece">Niece</option>
                                                                    <option value="Nephew">Nephew</option>
                                                                    <option value="Cousin">Cousin</option>
                                                                    <option value="Grandmother">Grandmother</option>
                                                                    <option value="Grandfather">Grandfather</option>
                                                                    <option value="Grandson">Grandson</option>
                                                                    <option value="Granddaughter">Granddaughter</option>
                                                                    <option value="Stepsister">Stepsister</option>
                                                                    <option value="Stepbrother">Stepbrother</option>
                                                                    <option value="Stepmother">Stepmother</option>
                                                                    <option value="Stepfather">Stepfather</option>
                                                                    <option value="Stepdaughter">Stepdaughter</option>
                                                                    <option value="Stepson">Stepson</option>
                                                                    <option value="Sister in law">Sister in law</option>
                                                                    <option value="Mother in law">Mother in law</option>
                                                                    <option value="Father in law">Father in law</option>
                                                                    <option value="Daughter in law">Daughter in law</option>
                                                                    <option value="Son in law">Son in law</option>
                                                                    <option value="Friend">Friend</option>
                                                                    <option value="Family Member">Family Member</option>
                                                                    <option value="Pet">Pet</option>


                                                                </select>

                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                                <button name="submit1" value="<?php echo $harwai_no ?>" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>

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
                                        <strong>NO HARWAI FOUND</strong>
                                    </div>
                                <?php
                                }
                            } else if ($type == 2) {
                                $budget = $_GET['budget'];
                                ?>
                                <form method="POST">
                                    <?php

                                    if (isset($_POST['submit1'])) {

                                        $its = $_POST['its'];
                                        $qabar_no = $_POST['qabar_no'];
                                        $name = strtoupper($_POST['name']);
                                        $aadhaar = $_POST['aadhaar'];
                                        $sabeel_no = $_POST['sabeel_no'];

                                        $address = $_POST['m_address'];
                                        $mohalla = strtoupper($_POST['mohalla']);
                                        $b_its = $_POST['b_its'];
                                        $b_name = strtoupper($_POST['b_name']);
                                        $b_mobile = $_POST['b_mobile'];
                                        $unit = $_POST['unit'];
                                        $haqq = $_POST['haqq'];
                                        $date_of_death = $_POST['date_of_death'];
                                        $hijri_date = $_POST['hijri_date'];
                                        $hijri_year = $_POST['hijri_year'];
                                        $hijri_month = $_POST['hijri_month'];
                                        $mother_name = strtoupper($_POST['mother_name']);
                                        $father_name = strtoupper($_POST['father_name']);
                                        $surname = strtoupper($_POST['surname']);
                                        $age = $_POST['age'];
                                        $place_of_death = $_POST['place_of_death'];
                                        $gender = $_POST['gender'];

                                        $b_relation = strtoupper($_POST['b_relation']);
                                        $default_amt = $_POST['default_amt'];
                                        $amt = $_POST['amt'];
                                        $reason = strtoupper($_POST['reason']);
                                        $time_of_death = $_POST['time_of_death'];
                                        $relationship_status = $_POST['relationship_status'];
                                        if ($relationship_status == "Married") {
                                            $partner_name = $_POST['partner_name'];
                                            $partner_aadhaar = $_POST['partner_aadhaar'];
                                        } else {
                                            $partner_name = "";
                                            $partner_aadhaar = "";
                                        }
                                        if (isset($_POST['dcn'])) {
                                            $dcn = $_POST['dcn'];
                                        } else {
                                            $dcn = "";
                                        }
                                        if (isset($_POST['reason_other'])) {
                                            $reason_other = strtoupper($_POST['reason_other']);
                                        } else {
                                            $reason_other = "";
                                        }

                                        if (isset($_POST['imc_no'])) {
                                            $imc_no = strtoupper($_POST['imc_no']);
                                        } else {
                                            $imc_no = "";
                                        }
                                        if (isset($_POST['imc_date'])) {
                                            $imc_date = strtoupper($_POST['imc_date']);
                                        } else {
                                            $imc_date = "";
                                        }


                                        $sql = "SELECT COUNT(*) as c FROM qabar_info WHERE number='$qabar_no' and status=0 and harwai_status=0";
                                        $run = $conn->query($sql);
                                        $row = $run->fetch_assoc();
                                        $c = $row['c'];
                                        if ($c > 0) {

                                            $s2 = "SELECT COUNT(*) AS c2 from dafan_info WHERE m_its='$its' and status=0";
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

                                                $s2 = "UPDATE qabar_info SET status=1 where number='$qabar_no' and status=0 and harwai_status=0";
                                                if (mysqli_query($conn, $s2)) {
                                                    $s3 = "INSERT INTO `dafan_info` (  `created_date`,`created_timestamp`,`created_admin_id`, `payment_status`,`father_name`,`mother_name`,`surname`,`age`,`place_of_death`,`gender`,`harwai_id`,`qabar_no`, `default_amt`,`amt` ,`haqq_un_nafs_unit`,`haqq_un_nafs_amt`, `status`, `harwai_status`, `m_its`, `m_name`, `m_address`, `m_rod`, `m_sabeel_no`, `m_mohalla`, `m_aadhaar_no`, `b_its`, `b_name`, `b_mobile`, `b_relation`, `admin_id`, `date`, `timestamp`, `date_of_death`, `hijri_date_of_death`, `hijri_month_of_death`, `hijri_year_of_death`, `time_of_death`, `death_certificate_number`, `m_rod_other`,`imc_no`,`imc_date`,`relationship_status`,`partner_name`,`partner_aadhaar`) VALUES ('$date','$time',$admin_id,0,'$father_name','$mother_name','$surname',$age,'$place_of_death','$gender',0,'$qabar_no','$default_amt','$amt',$unit,'$haqq',0,0,'$its','$name','$address','$reason','$sabeel_no','$mohalla','$aadhaar','$b_its','$b_name','$b_mobile','$b_relation',$admin_id,'$date','$time','$date_of_death',$hijri_date,'$hijri_month',$hijri_year,'$time_of_death','$dcn','$reason_other','$imc_no','$imc_date','$relationship_status','$partner_name','$partner_aadhaar')";
                                                    if (mysqli_query($conn, $s3)) {
                                                        $log = "ADDED DAFAN ENTRY FOR " . $name;
                                                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                        mysqli_query($conn, $s2_log);


                                                        $s5 = "SELECT id from dafan_info where m_its=$its and status=0 and qabar_no=$qabar_no";
                                                        $run5 = $conn->query($s5);
                                                        $row5 = $run5->fetch_assoc();
                                                        $dafan_id = $row5['id'];

                                                        /*  $s4 = "INSERT INTO `dafan_receipt` (  `dafan_id`,`date`,`timestamp` ,`adminid`,`status`) VALUES ($dafan_id,'$date','$time',$admin_id,0)";
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
                                            ?>


                                            <div class="alert alert-danger background-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>QABAR NUMBER IS EITHER OCCUPIED OR IN SOMEONE'S HARWAI</strong>
                                            </div>

                                    <?php
                                        }
                                    }
                                    ?>
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title" ALIGN="CENTER">BUDGET</h5>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Default Amount</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">

                                                        <input name="default_amt" class="form-control" placeholder="Enter Default Amount" value="<?php echo $budget ?>" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">

                                                        <input name="amt" class="form-control" placeholder="Enter Amount" required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title" ALIGN="CENTER">QABAR NUMBER</h5>




                                            <?php
                                            $s2 = "SELECT number,status from qabar_info where amt='$budget' and status=0 and harwai_status=0";
                                            $run2 = $conn->query($s2);
                                            $column_count = 0;

                                            while ($row2 = $run2->fetch_assoc()) {

                                                $qabar_no = $row2['number'];
                                                $status = $row2['status'];
                                                if ($status == 0) {



                                            ?>



                                                    <input type="radio" class="btn-check mr-4" name="qabar_no" value="<?php echo $qabar_no ?>" id="success-outlined<?php echo $qabar_no ?>" autocomplete="off">
                                                    <label class="btn btn-outline-success mr-4" for="success-outlined<?php echo $qabar_no ?>"><?php echo $qabar_no . " (VACANT)" ?></label>


                                            <?php


                                                }
                                            }

                                            ?>

                                        </div>
                                    </div>

                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title" ALIGN="CENTER">HAQQ UN NAFS (Rs.119/UNIT)</h5>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Unit</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="garbage" id="input1" value="<?php echo "119"; ?>" readonly>

                                                        <input name="unit" id="input2" class="form-control" placeholder="Enter Haqq un nafs Unit" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">

                                                        <input name="haqq" id="output" class="form-control" placeholder="Enter Amount" readonly required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title" align="center">IMC</h5>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">IMC Number</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">

                                                        <input type="text" name="imc_no" class="form-control" placeholder="Enter IMC Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <input type="date" name="imc_date" placeholder="Select IMC Date" autocomplete="FALSE" class="form-control datepi111cker">

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title" ALIGN="CENTER">MARHOOM INFO</h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">ITS</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number1" placeholder="Enter ITS" name="its" onfocus="this.removeAttribute('readonly');" required />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">

                                                            <input type="text" placeholder="Enter Full Name" name="name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

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

                                                          <!--  <input type="text" placeholder="Enter Place of Death" name="place_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required /> -->

                                                            <textarea class="form-control" name="place_of_death" maxlength="120" placeholder="Enter Place of Death (120 Characters Only)"></textarea>
    

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Time of Death</label>
                                                        <div class="col-sm-10">

                                                            <input type="time" placeholder="Enter Time of Death" name="time_of_death" class="form-control" onfocus="this.removeAttribute('readonly');" required />

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
                                                        <label class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="m_address" maxlength="120" placeholder="Enter Address (120 Characters Only)"></textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Date of Death</label>
                                                        <div class="col-sm-10">

                                                            <input type="date" name="date_of_death" placeholder="Select Date of Death" autocomplete="FALSE" class="form-control datepicker11" id="datepicker111" required>
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
                                                                        <option value="">--Hijri Month--</option>
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
                                                        <label class="col-sm-2 col-form-label">Mohalla</label>
                                                        <div class="col-sm-10">
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

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Aadhaar Number</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="12" id="flight_number" placeholder="Enter Aadhaar Number" maxlength="12" name="aadhaar" onfocus="this.removeAttribute('readonly');" required />


                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Relationship Status</label>
                                                        <div class="col-sm-10">

                                                            <select name="relationship_status" onchange="change_relationship_status()" id="relationship_status" class="form-control" required>
                                                                <option value="">--Select Relationship Status--</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Not Available">Not Available</option>



                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="partner">

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Reason of Death</label>
                                                        <div class="col-sm-10">

                                                            <select name="reason" onchange="change_reason_of_death()" id="reason_of_death" class="form-control" required>
                                                                <option value="">--Select Reason of Death--</option>
                                                                <option value="Natural">Natural</option>
                                                                <option value="Critical Illness">Critical Illness</option>
                                                                <option value="Organ Failure">Organ Failure</option>
                                                                <option value="Diabetes">Diabetes</option>
                                                                <option value="Cancer">Cancer</option>
                                                                <option value="Heart Attack">Heart Attack</option>
                                                                <option value="Accident">Accident</option>
                                                                <option value="COVID-19">COVID-19</option>
                                                                <option value="Suicide">Suicide</option>
                                                                <option value="Stroke">Stroke</option>


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="rod">

                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Death Certificate Number (Optional)</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" placeholder="Enter Death Certificate Number (Optional)" name="dcn" class="form-control" onfocus="this.removeAttribute('readonly');" />

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title" ALIGN="CENTER">BOOKING MEMBER INFO</h5>
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

                                                            <select name="b_relation" class="form-control" required>
                                                                <option value="">--Select Relation--</option>
                                                                <option value="Mother">Mother</option>
                                                                <option value="Father">Father</option>
                                                                <option value="Daughter">Daughter</option>
                                                                <option value="Son">Son</option>
                                                                <option value="Husband">Husband</option>
                                                                <option value="Sister">Sister</option>
                                                                <option value="Brother">Brother</option>
                                                                <option value="Auntie">Auntie</option>
                                                                <option value="Uncle">Uncle</option>
                                                                <option value="Niece">Niece</option>
                                                                <option value="Nephew">Nephew</option>
                                                                <option value="Cousin">Cousin</option>
                                                                <option value="Grandmother">Grandmother</option>
                                                                <option value="Grandfather">Grandfather</option>
                                                                <option value="Grandson">Grandson</option>
                                                                <option value="Granddaughter">Granddaughter</option>
                                                                <option value="Stepsister">Stepsister</option>
                                                                <option value="Stepbrother">Stepbrother</option>
                                                                <option value="Stepmother">Stepmother</option>
                                                                <option value="Stepfather">Stepfather</option>
                                                                <option value="Stepdaughter">Stepdaughter</option>
                                                                <option value="Stepson">Stepson</option>
                                                                <option value="Sister in law">Sister in law</option>
                                                                <option value="Mother in law">Mother in law</option>
                                                                <option value="Father in law">Father in law</option>
                                                                <option value="Daughter in law">Daughter in law</option>
                                                                <option value="Son in law">Son in law</option>
                                                                <option value="Friend">Friend</option>
                                                                <option value="Family Member">Family Member</option>
                                                                <option value="Pet">Pet</option>


                                                            </select>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <button name="submit1" value="submit1" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>

                                        </div>

                                    </div>
                                </form>

                            <?php
                            }
                            ?>

                    </div>
                <?php
                        }


                ?>
                </div>
            </div>
        </div>
    </div>


    <div id="styleSelector">
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

            if (document.getElementById("type").value == 2) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><label class="col-sm-2 col-form-label"> </label><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


            }
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

        function numberOnly(id) {
            var element = document.getElementById(id);
            element.value = element.value.replace(/[^0-9]/gi, "");
        }

        function change_reason_of_death() {
            var reason_of_death = document.getElementById("reason_of_death").value;
            if (reason_of_death == "Other") {
                document.getElementById("rod").innerHTML = '<div class="form-group row"> <label class="col-sm-2 col-form-label">Reason of Death (Other)</label> <div class="col-sm-10"> <textarea class="form-control" name="reason_other" maxlength="170" placeholder="Enter Reason of Death (170 Characters Only)"></textarea> </div> </div>';

            } else {
                $("#rod").empty();

            }

        }

        function change_relationship_status() {
            var relationship_status = document.getElementById("relationship_status").value;
            if (relationship_status == "Married") {
                document.getElementById("partner").innerHTML = '<div class="form-group row"> <label class="col-sm-2 col-form-label">Spouse Name</label> <div class="col-sm-10">    <input type="text" class="form-control"  placeholder="Enter Spouse Name" name="partner_name" onfocus="this.removeAttribute("readonly")" required /></div> </div><div class="form-group row"> <label class="col-sm-2 col-form-label">Spouse Aadhaar Number</label> <div class="col-sm-10"> <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="12" id="flight_number" placeholder="Enter Spouse Aadhaar Number" maxlength="12" name="partner_aadhaar" onfocus="this.removeAttribute("readonly");" required /></div> </div>';

            } else {
                $("#partner").empty();

            }

        }
    </script>




    <?php
    require('footer.php');
    ?>
</body>

</html>