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

    if (in_array("23", $forms_access) || in_array("24", $forms_access) || in_array("27", $forms_access) || in_array("28", $forms_access) || in_array("31", $forms_access)) {
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
                                        <h5 class="sub-title">Receipt</h5>
                                        <?php
                                        $receipt_id = $_GET['id'];
                                        $entry_type=$_GET['entry_type'];
                                        if($entry_type=="old")
                                        {
                                        $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type,pay_mode,cn,name from dafan_receipt WHERE id=$receipt_id";
                                        }
                                        else
                                        {
                                            $sql = "SELECT id,date,status,amt,dafan_id,harwai_id,type,pay_mode,cn,name from dafan_receipt_1 WHERE id=$receipt_id";
                                        
                                        }


                                        $run = $conn->query($sql);
                                        $row = $run->fetch_assoc();
                                        $receipt_number = $row['id'];
                                        $receipt_date = $row['date'];
                                        $receipt_status = $row['status'];
                                        $amt = $row['amt'];
                                        $dafan_id = $row['dafan_id'];
                                        $harwai_id = $row['harwai_id'];
                                        $mode=$row['pay_mode'];
                                        $cn=$row['cn'];
                                        $receipt_name=$row['name'];
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

                                        require('receipt_format.php');
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