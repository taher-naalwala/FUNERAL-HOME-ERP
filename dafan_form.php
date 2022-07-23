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

    if (in_array("4", $forms_access) || in_array("21", $forms_access)) {
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
    <title>Dafan View</title>

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
                                        <h5 class="sub-title">Form <?php echo $get_name ?></h5>
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
                                if (isset($_GET['submit'])) {
                                    $type = $_GET['type'];
                                    if ($type == 0) {
                                        $qabar_no = strtoupper($_GET['qabar_no']);
                                        $sql0 = "SELECT id from dafan_info where qabar_no='$qabar_no'";
                                        $run0 = $conn->query($sql0);
                                        while ($row0 = $run0->fetch_assoc()) {
                                            $dafan_id = $row0['id'];
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
                                        $dafan_status=$row5['status'];
                                        $time_of_death=$row5['time_of_death'];
                                        $dcn=$row5['death_certificate_number'];
                                        $reason_other=$row5['m_rod_other'];

                                        $imc_no=$row5['imc_no'];
                                        $imc_date=$row5['imc_date'];
                                        $haqq_un_nafs_unit = $row5['haqq_un_nafs_unit'];
                                        $relationship_status=$row5['relationship_status'];
                                        $partner_name=$row5['partner_name'];
                                        $partner_aadhaar=$row5['partner_aadhaar'];




                                ?>



                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                                    <?php
                                                    require('form_dafan_format.php');
                                                    ?>
                                                </div>
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
                                        while ($row0 = $run0->fetch_assoc()) {
                                            $dafan_id = $row0['id'];
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
                                            $time_of_death=$row5['time_of_death'];
                                            $dcn=$row5['death_certificate_number'];
                                            $reason_other=$row5['m_rod_other'];
                                            $imc_no=$row5['imc_no'];
                                            $imc_date=$row5['imc_date'];
                                            $haqq_un_nafs_unit = $row5['haqq_un_nafs_unit'];
                                            $relationship_status=$row5['relationship_status'];
                                            $partner_name=$row5['partner_name'];
                                            $partner_aadhaar=$row5['partner_aadhaar'];



                                        ?>

                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                                    <?php
                                                    require('form_dafan_format.php');
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        $dafan_id = $_GET['form_no'];

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
                                        $time_of_death=$row5['time_of_death'];
                                        $dcn=$row5['death_certificate_number'];
                                        $reason_other=$row5['m_rod_other'];
                                        $imc_no=$row5['imc_no'];
                                        $imc_date=$row5['imc_date'];
                                        $haqq_un_nafs_unit = $row5['haqq_un_nafs_unit'];
                                        $relationship_status=$row5['relationship_status'];
                                        $partner_name=$row5['partner_name'];
                                        $partner_aadhaar=$row5['partner_aadhaar'];


                                        ?>

                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title">Form Number: <?php echo $dafan_id ?></h5>
                                                <?php
                                                require('form_dafan_format.php');
                                                ?>
                                            </div>
                                        </div>
                                <?php
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