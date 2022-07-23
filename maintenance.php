<?php
session_start();
$admin_id = $_SESSION['admin_id_qabrastan'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintainence</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">
    <style>
        .razorpay-payment-button {
            color: #fff;
            background-color: #4e73df;
            border-radius: 3px;
            margin-bottom: 10px;
            margin-left: 10px;
        }
    </style>

</head>

<body>

    <?php
    require('style.php');
    require('connectDB.php');
    $forms_access = $_SESSION['forms_access_qabrastan'];
    if (isset($_SESSION['access_qabrastan']) && (($_SESSION['role_qabrastan'] == "0") || in_array("34", $forms_access))) {
    ?>
        <div class="pcoded-content">

            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="feather icon-box bg-c-blue"></i>
                            <div class="d-inline">
                                <h5>Maintenance</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class=" breadcrumb breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="maintenance.php"><i class="feather icon-box"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Maintenance</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            echo '<div class="alert alert-info ml-2 mr-2 mt-2" role="alert">
Maintainence Date : ' . $_SESSION['exp_date_qabrastan'] . '
</div>';
            ?>
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">


                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="card mb-4 mt-3">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">6 Month Maintainence</h6>
                                                </div>
                                                <div class="card-body">


                                                    <p>NAME - TAHER NAALWALA</p>
                                                    <p> ACC/NO.- 38774015047</p>
                                                    <p> IFSC CODE - SBIN0030426</p>
                                                    <p>AMOUNT - RS. 6000</p>
                                                    <p>PREVIOUS TRANSACTION ID - <?php
                                                                                    $sql = "SELECT pay_id from web_login";
                                                                                    $run = $conn->query($sql);
                                                                                    $row = $run->fetch_assoc();
                                                                                    echo $row['pay_id'];

                                                                                    ?></p>




                                                    <form method="POST">
                                                        <?php
                                                        if (isset($_POST['submit'])) {
                                                            $transaction_id = $_POST['transaction_id'];
                                                            $sql = "UPDATE web_login set pay_id='$transaction_id'";
                                                            if (mysqli_query($conn, $sql)) {
                                                        ?>
                                                                <div class="alert alert-success background-success">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                                    </button>
                                                                    <strong>Success</strong>
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
                                                        ?>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Transaction ID</label>
                                                            <div class="col-sm-10">

                                                                <input type="text" name="transaction_id" placeholder="Enter Transaction ID" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">

                                                                <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>

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
                    </div>
                </div>
            </div>
        <?php
    } else {
        echo '<div class="alert alert-danger ml-2 mr-2 mt-2" role="alert">
            <h5>You are not allowed to access this page. Ask Your Admin to Pay the Maintainence Charge to Continue..</h5>
           </div>';
    }
        ?>


      
        <?php
        require('footer.php');
        ?>

</body>

</html>