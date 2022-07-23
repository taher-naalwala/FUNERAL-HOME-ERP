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



    if ($_GET['name'] == "Voucher") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("16", $forms_access) || in_array("14", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "Access") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("19", $forms_access) || in_array("5", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "Qabar") {
        $forms_access = $_SESSION['forms_access_qabrastan'];
        $flag = 0;
        if (in_array("29", $forms_access) || in_array("1", $forms_access)) {
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
    <title> EDIT <?php echo $get_name ?></title>


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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>






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
                                        <h5 class="sub-title">EDIT <?php echo $get_name ?></h5>
                                        <?php if ($_GET['name'] == "Voucher") { ?>

                                            <form method="POST">
                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input name="voucher_id" type="number" placeholder="Enter Voucher Number" class="form-control" required>
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
                                            if (isset($_POST['sub'])) {
                                                $voucher_id = $_POST['sub'];
                                                $amount = $_POST['amt'];
                                                $trust_id = $_POST['trust_id'];
                                                $trust_id0 = $_POST['trust_id0'];
                                                $account_of = $_POST['account'];
                                                $bill = $_POST['bill'];
                                                $option = $_POST['option'];
                                              

                                                $pay_mode = $_POST['pay_mode'];
                                                if (isset($_POST['cn'])) {
                                                    $check_number = $_POST['cn'];
                                                } else {
                                                    $check_number = "";
                                                }
                                                $voucher_date = $_POST['voucher_date'];
                                                $name = $_POST['name'];
                                                if ($role_admin_id == 0) {
                                                    $voucher_status = $_POST['voucher_status'];

                                                    $s1 = "UPDATE voucher_info SET debit='$option',bill_no='$bill',status=$voucher_status,account_of='$account_of',amt='$amount',name='$name',trust_id=$trust_id,pay_mode='$pay_mode',cn='$check_number',date='$voucher_date',modified_date='$date',timestamp='$time',admin_id=$admin_id WHERE id=$voucher_id";
                                                } else {
                                                    $s1 = "UPDATE voucher_info SET debit='$option',bill_no='$bill',account_of='$account_of',amt='$amount',name='$name',trust_id=$trust_id,pay_mode='$pay_mode',cn='$check_number',date='$voucher_date',modified_date='$date',timestamp='$time',admin_id=$admin_id WHERE id=$voucher_id";
                                                }
                                                if (mysqli_query($conn, $s1)) {
                                                    $log = "EDITTED VOUCHER ENTRY FOR VOUCHER ID".$voucher_id;
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
                                <?php

                                            if (isset($_POST['submit'])) {
                                                $voucher_id = $_POST['voucher_id'];


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
                                                    $option = $row1['debit'];


                                                    $account = $row1['account_of'];
                                                    $bill = $row1['bill_no'];
                                ?>


                                        <div class="card">
                                            <div class="card-block">
                                                <h6 class="sub-title">Voucher Number: <?php echo $voucher_id  ?></h6>


                                                <form method="POST">
                                                    <?php if ($role_admin_id == 0) { ?>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="voucher_status" required>
                                                                <?php
                                                                if ($voucher_status == 0) {
                                                                ?>
                                                                    <option value='0' selected><?php echo "ACTIVE" ?></option>
                                                                    <option value='' disabled>STATUS</option>
                                                                    <option value='1'><?php echo "DELETED" ?></option>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <option value='1' selected><?php echo "DELETED" ?></option>
                                                                    <option value='' disabled>STATUS</option>
                                                                    <option value='0'><?php echo "ACTIVE" ?></option>
                                                                <?php
                                                                }
                                                                ?>


                                                                <!-- <option value="0">Cheque</option> -->
                                                            </select>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Debit</label>
                                                        <select name="option" class="form-control" required>
                                                            <option value="<?php echo $option  ?>"><?php echo $option ?></option>

                                                            <option value="" disabled>SELECT</option>
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
                                                            <option value="OTHERS">OTHERS</option>





                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input name="amt" value="<?php echo $amount ?>" class="form-control" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Amount Being Paid To</label>
                                                        <input name="name" value="<?php echo $name ?>" class="form-control" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>on Account of</label>
                                                        <input name="account" value="<?php echo $account ?>" class="form-control" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bill No.</label>
                                                        <input type="number" name="bill" value="<?php echo $bill ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Trust</label>
                                                        <select class="form-control" name="trust_id" required>
                                                            <?php
                                                            $s2 = "SELECT name,id from trust_info WHERE id=$trust_id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $trust_name = $row2['name'];
                                                            $trust_id0 = $row2['id'];
                                                            ?>
                                                            <option value='<?php echo $trust_id0 ?>'><?php echo $trust_name ?></option>
                                                            <option value='' disabled>TRUST</option>
                                                            <?php
                                                            $sql = "SELECT name,id from trust_info WHERE id!=$trust_id";
                                                            $run = $conn->query($sql);
                                                            while ($row = $run->fetch_assoc()) {
                                                                $trust_name = $row['name'];
                                                                $trust_id0 = $row['id'];
                                                            ?>
                                                                <option value='<?php echo $trust_id0 ?>'><?php echo $trust_name ?></option>
                                                            <?php
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Payment Mode</label>
                                                        <select class="form-control" name="pay_mode" id="mode" onchange="change_mode_receipt()" required>
                                                            <?php
                                                            if ($pay_mode == "CHEQUE") {
                                                            ?>
                                                                <option value='CHEQUE' selected><?php echo "Cheque" ?></option>
                                                                <option value='' disabled>MODE</option>
                                                                <option value='CASH'><?php echo "Cash" ?></option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value='CASH' selected><?php echo "Cash" ?></option>
                                                                <option value='' disabled>MODE</option>
                                                                <option value='CHEQUE'><?php echo "Cheque" ?></option>
                                                            <?php
                                                            }
                                                            ?>


                                                            <!-- <option value="0">Cheque</option> -->
                                                        </select>
                                                    </div>

                                                    <div id="cheque">
                                                        <?php
                                                        if ($pay_mode == "CHEQUE") {
                                                        ?>
                                                            <div class="form-group"><label>Cheque No.</label><input class="form-control" type="text" name="cn" placeholder="Enter Cheque No." value="<?php echo $check_number; ?>" required /></div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <input type="hidden" value='<?php echo $trust_id ?>' name="trust_id0">






                                                    <div class="form-group">
                                                        <label>Receiving Date</label>
                                                        <input type="text" placeholder="Receiving Date" value='<?php echo $voucher_date ?>' name="voucher_date" id="datepicker" class="form-control">

                                                    </div>

                                                    <button class="btn btn-primary" name="sub" value="<?php echo $voucher_id ?>">Submit</button>
                                                </form>

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
                                        }


                            ?>
                            <?php if ($_GET['name'] == "Access") { ?>
                                <form method="POST">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <select class="form-control" name="adminid">
                                                    <option value='' disabled>Select Admin</option>
                                                    <?php
                                                    $sql = "SELECT name,id from web_login";
                                                    $run = $conn->query($sql);
                                                    while ($row = $run->fetch_assoc()) {
                                                        $id = $row['id'];
                                                        $name = $row['name'];
                                                    ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>

                                                    <?php   }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <button name="editaccess" value="Add" class=" btn  btn-primary ">Open</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['editaccess'])) {
                                        $adminid = $_POST['adminid'];
                                        $sql = "SELECT name,password,its,mobile,email,role from web_login WHERE id=$adminid ";
                                        $run = $conn->query($sql);
                                        $row = $run->fetch_assoc();
                                        $name = $row['name'];
                                        $pass = $row['password'];
                                      
                                       
                                        $its = $row['its'];
                                        $mobile = $row['mobile'];
                                        $email = $row['email'];
                                        $role = $row['role'];
                                    ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="<?php echo $name ?>" name="name" required>
                                        </div>
                                        <input type="hidden" class="form-control" value="<?php echo $adminid ?>" name="adminid" required>
                                        <div class="form-group">
                                            <label>ITS</label>
                                            <input type="number" class="form-control" value="<?php echo $its ?>" name="its" required>
                                        </div>


                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" value="<?php echo $pass ?>" name="pass" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control" value="<?php echo $mobile ?>" name="mobile" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="<?php echo $email ?>" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" class="form-control" required>

                                                <option value='<?php echo $role  ?>' selected><?php if ($role == 0) {
                                                                                                    echo "Admin";
                                                                                                } else {
                                                                                                    echo "User";
                                                                                                } ?></option>


                                                <option value="" disabled>----</option>
                                                <?php
                                                if ($role == 1) {
                                                ?>
                                                    <option value="0">Admin</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($role == 0) {
                                                ?>
                                                    <option value="1">User</option>
                                                <?php
                                                }
                                                ?>


                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label>Powers</label>
                                            <select name="powers[]" class="choices-multiple-remove-button" multiple required>
                                                <?php require('connectDB.php');
                                                $sql = "SELECT formid from access_web_login WHERE adminid=$adminid";
                                                $run = $conn->query($sql);
                                                $formid_string = "";
                                                while ($row = $run->fetch_assoc()) {

                                                    $formid = $row['formid'];
                                                    $formid_string = $formid_string . "" . $formid . ",";

                                                    $s1 = "SELECT name from form WHERE id=$formid";
                                                    $run1 = $conn->query($s1);
                                                    $row1 = $run1->fetch_assoc();
                                                    $formname = $row1['name'];
                                                ?>
                                                    <option value='<?php echo $formid  ?>' selected><?php echo $formname ?></option>


                                                <?php   } ?>

                                                <option value="" disabled>SELECT POWERS</option>

                                                <?php

                                                $formid_string_final = substr($formid_string, 0, strlen($formid_string) - 1);
                                                $sql = "SELECT name,id from form WHERE id NOT IN ($formid_string_final)";
                                                $run = $conn->query($sql);
                                                while ($row = $run->fetch_assoc()) {
                                                    $formname1 = $row['name'];
                                                    $formid1 = $row['id'];
                                                ?>
                                                    <option value='<?php echo $formid1  ?>'><?php echo $formname1 ?></option>


                                                <?php   }

                                                ?>

                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <button name="finaledit" value="Add" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>


                                        <?php
                                    }
                                    if (isset($_POST['finaledit'])) {
                                        $powers = array_unique($_POST['powers']);
                                        $name = $_POST['name'];
                                        $pass = $_POST['pass'];
                                        $its = $_POST['its'];
                                        $mobile = $_POST['mobile'];
                                        $email = $_POST['email'];
                                        $adminid = $_POST['adminid'];
                                        $role = $_POST['role'];
                                      
                                        $sql = "UPDATE web_login SET name='$name',password='$pass',its='$its',mobile='$mobile',email='$email',role='$role'  WHERE id=$adminid ";
                                        if (mysqli_query($conn, $sql)) {
                                            $s1 = "DELETE FROM access_web_login WHERE adminid=$adminid";
                                            if (mysqli_query($conn, $s1)) {

                                                foreach ($powers as $formid) {
                                                    $s3 = "INSERT INTO access_web_login (`adminid`, `formid`) VALUES($adminid,$formid)";
                                                    if (mysqli_query($conn, $s3)) {
                                                        $flag = 1;
                                                    } else {
                                                        $flag = 0;
                                                    }
                                                }
                                                if ($flag == 1) {
                                                    $log = "EDITTED ACCESS FOR ".$name;
                                                    $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                    mysqli_query($conn, $s2_log);
                                        ?>
                                                    <div class="alert alert-success background-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>SUCCESS</strong>
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
                                if ($_GET['name'] == "Qabar") {
                                    ?>
                                    <form method="POST">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input name="qabar_no" type="text" placeholder="Enter Qabar Number" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <button name="submit" class="btn btn-primary" value='submit'>Submit</button>

                                            </div>

                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['submit1'])) {
                                        $qabar_no = $_POST['submit1'];
                                        $status = $_POST['status'];
                                        $type = $_POST['type'];
                                        $amt = $_POST['amt'];
                                         $sql = "SELECT COUNT(*) as c from qabar_info where number='$qabar_no' and harwai_status=0";
                                        $run = $conn->query($sql);
                                        $row = $run->fetch_assoc();
                                        $c = $row['c'];
                                        if ($c > 0) {
                                            $s1 = "UPDATE qabar_info set status=$status,amt='$amt',type='$type' where number='$qabar_no'";
                                            if (mysqli_query($conn, $s1)) {
                                                $log = "EDITTED QABAR NUMBER ".$qabar_no;
                                                $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                mysqli_query($conn, $s2_log);
                                              
                                    ?>
                                                <div class="alert alert-success background-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                    </button>
                                                    <strong>SUCCESS</strong>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="alert alert-danger background-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>QABAR NUMBERS ENTERED IS EITHER OCCUPIED OR IN SOMEONE'S HARWAI OR NOT FOUND</strong>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $qabar_no = strtoupper($_POST['qabar_no']);
                                        $sql = "SELECT status,amt,type from qabar_info where number='$qabar_no' and harwai_status=0";
                                        $run = $conn->query($sql);
                                        if ($run->num_rows > 0) {
                                            $row = $run->fetch_assoc();
                                            $status = $row['status'];
                                            $type = $row['type'];
                                            $amt = $row['amt'];
                                    ?>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="card">

                                <div class="card-block">
                                    <h5 class="sub-title">QABAR NUMBER: <?php echo $qabar_no; ?></h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Amount</label>
                                        <div class="col-sm-10">

                                            <input type="number" placeholder="Enter Amount" name="amt" class="form-control" value="<?php echo $amt ?>" onfocus="this.removeAttribute('readonly');" required />

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" name="type" required>
                                                <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                                <option disabled>TYPE</option>
                                                <option value="MITTI">MITTI</option>
                                                <option value="CEMENT">CEMENT</option>
                                                <option value="FINE MARBLE">FINE MARBLE</option>
                                                <option VALUE="EMPTY">EMPTY</option>
                                                <option VALUE="BROKEN">BROKEN</option>
                                            </select>
                                        </div>
                                    </div>
                                  
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">

                                                <select class="form-control" name="status" required>
                                                    <option value="<?php echo $status ?>" selected><?php if ($status == 0) {
                                                                                                        echo "VACANT";
                                                                                                    } else if($status==2) {
                                                                                                        echo "DELETED";
                                                                                                    } else {
                                                                                                        echo "OCCUPIED";
                                                                                                    } ?></option>
                                                                                                    <?php
                                                                                                    if($status!=1)
                                                                                                    {
                                                                                                    
                                                                                                    ?>
                                                    <option value="" disabled>--Status--</option>
                                                    <option value="0">VACANT</option>
                                                    <option value="2">DELETED</option>
                                                    <?php 
                                                                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                             
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"> </label>
                                        <div class="col-sm-10">

                                            <div id="2">
                                                <button id="submit_button" style="color:#fff" name="submit1" class="btn btn-primary" value="<?php echo $qabar_no ?>">Submit</button>

                                            </div>

                                        </div>
                                    </div>

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
                            <strong>QABAR NUMBERS ENTERED IS EITHER OCCUPIED OR IN SOMEONE'S HARWAI OR NOT FOUND</strong>
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