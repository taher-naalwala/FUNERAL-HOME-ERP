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
        $flag = 0;
        if (in_array("18", $forms_access) || in_array("14", $forms_access)) {
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
$get_name = "VOUCHER";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title> VIEW <?php echo $get_name ?></title>


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
                                    <h5 class="sub-title">VIEW <?php echo $get_name ?></h5>

                                        <form method="GET">
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
                                if (isset($_GET['submit'])) {
                                    $voucher_id = $_GET['id'];


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
                                ?>

                                       

                                        <div class="card">

                                            <div class="card-block">
                                               

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