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

    if (in_array("15", $forms_access) || in_array("14", $forms_access)) {
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
$get_name = "Voucher";
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
                                        <h5 class="sub-title">ADD <?php echo $get_name ?></h5>
                                        <?php
                                        if (isset($_POST['generate'])) {
                                            $option = $_POST['option'];
                                            $debit = $_POST['debit'];
                                            $bill = $_POST['bill'];

                                            $trust_id = $_POST['trust_id'];

                                            $pay_mode = strtoupper($_POST['mode']);

                                            $account = strtoupper($_POST['account']);
                                            $name = strtoupper($_POST['name']);
                                            $cn = $_POST['cn'];
                                            $voucher_date=$_POST['voucher_date'];

                                           


                                            $s1 = "INSERT INTO `voucher_info` ( `debit`,`amt`, `name`, `account_of`, `bill_no`, `trust_id`, `pay_mode`,`cn`, `date`, `status`, `modified_date`, `timestamp`, `admin_id`) VALUES ('$option','$debit','$name','$account','$bill',$trust_id,'$pay_mode','$cn','$voucher_date',0,'$date','$time',$admin_id)";
                                            if (mysqli_query($conn, $s1)) {
                                                $s5 = "SELECT id from voucher_info where debit='$option' and amt='$debit' and name='$name' and account_of='$account' and bill_no='$bill' and trust_id=$trust_id and pay_mode='$pay_mode' and cn='$cn' and date='$voucher_date' and status=0 and modified_date='$date' and timestamp='$time' and admin_id=$admin_id";
                                                $run5 = $conn->query($s5);
                                                $row5 = $run5->fetch_assoc();
                                                $voucher_id = $row5['id'];
                                                $log = "ADDED VOUCHER OF RS.".$debit." FOR ".$option;
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
                                                    window.open("voucher_add_view.php?id=<?php echo $voucher_id ?>", "_blank");
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
                                        ?>
                                        <form method="POST">

                                            <div class="form-group">
                                                <label>Debit</label>
                                                <select name="option" class="form-control" required>
                                                    <option value="SALARY">SALARY</option>
                                                    <option value="TELEPHONE EXPENSES">TELEPHONE EXPENSES</option>
                                                    <option value="RENT EXPENSES">RENT EXPENSES</option>
                                                    <option value="MISCELLANEOUS EXPENSES">MISCELLANEOUS EXPENSES</option>
                                                    <option value="BANK CHARGES">BANK CHARGES</option>
                                                    <option value="BANK INTEREST">BANK INTEREST</option>
                                                    <option value="SMS EXPENSES">SMS EXPENSES</option>
                                                    <option value="AUDIT EXPENSES">AUDIT EXPENSES</option>
                                                    <option value="NIYAZ EXPENSES">NIYAZ EXPENSES</option>
                                                    <option value="MIQAAT EXPENSE">MIQAAT EXPENSE</option>
                                                    <option value="BANK DEPOSIT">BANK DEPOSIT</option>
                                                    <option value="OTHERS">OTHERS</option>





                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Date</label>

                                                <input type="text" name="voucher_date" placeholder="Select Voucher Date" autocomplete="FALSE" class="form-control" id="datepicker" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input class="form-control" type="number" name="debit" placeholder="Enter Amount" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Amount Being Paid To</label>
                                                <input class="form-control" type="text" name="name" placeholder="Enter Name" required />
                                            </div>
                                            <div class="form-group">
                                                <label>on Account of</label>
                                                <input class="form-control" type="text" name="account" placeholder="Enter Account" required />

                                            </div>
                                            <div class="form-group">
                                                <label>Bill No.</label>
                                                <input class="form-control" type="text" name="bill" placeholder="Enter Bill No." />

                                            </div>

                                            <div class="form-group">
                                                <label>Trust</label>
                                                <select name="trust_id" class="form-control" required>
                                                    <?php
                                                    $sql = "SELECT * from trust_info";
                                                    $run = $conn->query($sql);
                                                    while ($row = $run->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Payment Mode</label>
                                                <select name="mode" id="mode" onchange="change_mode_receipt()" class="form-control" required>
                                                    <option value="CASH">Cash</option>
                                                    <option value="CHEQUE">Cheque</option>
                                                </select>
                                            </div>
                                            <div id="cheque">

                                            </div>

                                            <button name="generate" value="generate" class="btn btn-primary">Generate</button>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
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
                document.getElementById("cheque").innerHTML = ' <div class="form-group"><label>Cheque No.</label><input class="form-control" type="text" name="cn" placeholder="Enter Cheque No." required/></div>';

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