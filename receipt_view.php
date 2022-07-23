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

    $flag = 0;
    if (in_array("28", $forms_access) || in_array("23", $forms_access)) {
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
$get_name = "RECEIPT";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT VIEW</title>

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
                                        <h5 class="sub-title">VIEW <?php echo $get_name ?></h5>
                                        <form method="GET">
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

                                            <div id="1">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label">Receipt Number</label>
                                                    <div class="col-sm-10">


                                                        <div class="form-group">

                                                            <input name="receipt_no" class="form-control" placeholder="Enter Receipt Number" required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <label class="col-sm-2 col-form-label"> </label>
                                                <div class="col-sm-10">

                                                    <div id="2">
                                                        <button id="submit_button" style="color:#fff" name="submit" class="btn btn-primary" value="submit">Submit</button>

                                                    </div>

                                                </div>
                                            </div>


                                        </form>



                                    </div>
                                </div>


                                <?php
                                if (isset($_GET['submit'])) {
                                    $type = $_GET['type'];
                                    $receipt_number = $_GET['receipt_no'];
                                    $receipt_type=$_GET['receipt_type'];
                                    if($receipt_type=="NW")
                                    {
                                        $sql = "SELECT dafan_id,harwai_id,type,amt,pay_mode,cn,name FROM dafan_receipt_1 where id=$receipt_number";
                                  
                                    }
                                    else
                                    {
                                        $sql = "SELECT dafan_id,harwai_id,type,amt,pay_mode,cn,name FROM dafan_receipt where id=$receipt_number";
                                  
                                    }
                                     $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        $row = $run->fetch_assoc();
                                        $type = $row['type'];
                                        $harwai_id = $row['harwai_id'];
                                        $dafan_id = $row['dafan_id'];
                                        $amt = $row['amt'];
                                        $mode = $row['pay_mode'];
                                        $cn = $row['cn'];
                                        $receipt_name=$row['name'];
                                        if ($type == 0) {
                                ?>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Receipt Number: <?php echo $receipt_number ?></h5>
                                                    <?php
                                                    $receipt_id = $receipt_number;
                                                    if($receipt_type=="NW")
                                                    {
                                                        $entry_type="new";
                                                        $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type,pay_mode,cn,name from dafan_receipt_1 WHERE id=$receipt_id";

                                                    }
                                                    else
                                                    {
                                                        $entry_type="old";
                                                        $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type,pay_mode,cn,name from dafan_receipt WHERE id=$receipt_id";

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
                                                    $mode = $row['pay_mode'];
                                                    $cn = $row['cn'];
                                                    $receipt_name=$row['name'];
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

                                                    require('receipt_format.php');
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
                                                    $time_of_death = $row5['time_of_death'];
                                                    $dcn = $row5['dcn'];
                                                    $reason_other = $row5['m_rod_other'];
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

                                                    $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type,pay_mode,cn,name from dafan_receipt WHERE id=$receipt_id";



                                                    $run = $conn->query($sql);
                                                    $row = $run->fetch_assoc();
                                                    $receipt_number = $row['id'];
                                                    $receipt_date = $row['date'];
                                                    $receipt_status = $row['status'];
                                                    $amt = $row['amt'];
                                                    $dafan_id = $row['dafan_id'];
                                                    $harwai_id = $row['harwai_id'];
                                                    $type = $row['type'];
                                                    $mode = $row['pay_mode'];
                                                    $cn = $row['cn'];
                                                    $receipt_name=$row['name'];
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

                                                    require('receipt_format.php');
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
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script>
        function change_br() {

            $("#1").empty();


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "ajax_dafan.php?br=" + document.getElementById("br").value, false);
            xmlhttp.send(null);
            document.getElementById("1").innerHTML = xmlhttp.responseText;


            document.getElementById("2").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';

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
    </script>



    <?php
    require('footer.php');
    ?>
</body>

</html>