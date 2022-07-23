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
    if (in_array("25", $forms_access) || in_array("3", $forms_access)) {
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
$get_name = "HARWAI";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HARWAI EDIT</title>

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
                                        <h5 class="sub-title">Edit <?php echo $get_name ?></h5>
                                        <form method="GET">


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select class="form-control" name="type" id="br" onchange="change_br()" required>
                                                        <option value="" disabled>--Select--</option>
                                                        <option value="0">Harwai Number</option>
                                                        <option value="2">Qabar Number</option>
                                                        <option value="1">NAME / ITS</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div id="1">
                                                <div class="form-group row">

                                                    <label class="col-sm-2 col-form-label">Harwai Number</label>
                                                    <div class="col-sm-10">


                                                        <div class="form-group">

                                                            <input name="harwai_no" class="form-control" placeholder="Enter Harwai Number" required>
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

                                if (isset($_POST['submit1'])) {
                                    $harwai_id = $_POST['submit1'];
                                    $new_harwai_id=$_POST['harwai_id'];

                                    $its = $_POST['its'];

                                    $name = strtoupper($_POST['name']);
                                  

                                    $sabeel_no = $_POST['sabeel_no'];
                                    $address = strtoupper($_POST['address']);
                                    $mohalla = strtoupper($_POST['mohalla']);
                                    $mobile = $_POST['mobile'];
                                    $b_its = $_POST['n_its'];
                                    $b_name = strtoupper($_POST['n_name']);
                                    $b_mobile = $_POST['n_mobile'];
                                    $b_sabeel_no = $_POST['n_sabeel_no'];
                                    $b_relation = $_POST['n_relation'];
                                    $b_mohalla = strtoupper($_POST['n_mohalla']);
                                    $b_address = $_POST['n_address'];
                                    $harwai_date = $_POST['harwai_date'];
                                    $amt = $_POST['amt'];
                                    $new_qabar_no = $_POST['new_qabar_no'];

                                    $qabar_status_array = $_POST['qabar_status'];
                                    if($role_admin_id==0)
                                    {
                                        $harwai_status=$_POST['harwai_status'];
                                        $s1 = "UPDATE harwai_info SET status=$harwai_status,its='$its',name='$name',sabeel_no='$sabeel_no',address='$address',mohalla='$mohalla',mobile='$mobile',n_its='$b_its',n_name='$b_name',n_mobile='$b_mobile',n_mohalla='$b_mohalla',n_sabeel_no='$b_sabeel_no',n_relation='$b_relation',n_address='$b_address',date='$date',timestamp='$time',admin_id=$admin_id,id=$new_harwai_id,created_date='$harwai_date',amt='$amt' WHERE id=$harwai_id";
                                 
                                    }
                                    else
                                    {
                                        $s1 = "UPDATE harwai_info SET its='$its',name='$name',sabeel_no='$sabeel_no',address='$address',mohalla='$mohalla',mobile='$mobile',n_its='$b_its',n_name='$b_name',n_mobile='$b_mobile',n_mohalla='$b_mohalla',n_sabeel_no='$b_sabeel_no',n_relation='$b_relation',n_address='$b_address',date='$date',timestamp='$time',admin_id=$admin_id,id=$new_harwai_id,created_date='$harwai_date',amt='$amt' WHERE id=$harwai_id";
                                 
                                    }
                                      if (mysqli_query($conn, $s1)) {
                                        foreach ($qabar_status_array as $qabar_status_value) {
                                            $first_index = stripos($qabar_status_value, "(") + 1;
                                            $s_id_e = substr($qabar_status_value, $first_index);
                                            $qabar_no = rtrim($s_id_e, ") ");
                                            $qabar_status = substr($qabar_status_value, 0, 1);
                                            if ($qabar_status == 2) {

                                                $s2 = "DELETE from harwai_qabar where harwai_id=$harwai_id and qabar_no='$qabar_no'";
                                                if (mysqli_query($conn, $s2)) {
                                                    $s3 = "UPDATE qabar_info set status=0,harwai_status=0 where number='$qabar_no'";
                                                    if (mysqli_query($conn, $s3)) {
                                                    }
                                                }
                                            }
                                        }
                                        if (empty($new_qabar_no)) {
                                            $log = "EDITTED HARWAI FOR ".$name."(".$harwai_id.")";
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
                                                window.open('form_view_harwai.php?harwai_id=<?php echo $new_harwai_id ?>', '_blank');
                                            </script>
                                            <?php
                                        } else {
                                          /*  $qabar_no = "( " . $_POST['new_qabar_no'] . " )";
                                            $qabar_no_string = $_POST['new_qabar_no'];
                                            $qabar_arr = preg_split("/\,/", $qabar_no_string);
                                            $count_qabar_arr = count($qabar_arr); */


                                            $record = explode(",",strtoupper($_POST['new_qabar_no']));
                                            $record_count=count($record);
                                            $count_qabar_arr=$record_count;
                                            $qabar_no_string="";
                                            for($i=0;$i<$record_count;$i++)
                                            {
                                               $qabar_no_string=$qabar_no_string. "'".$record[$i]."',";
                                            }

                                            $qabar_no="( ".substr($qabar_no_string,0,-1)." )";
                                            $qabar_arr = preg_split("/\,/", strtoupper($_POST['new_qabar_no']));




                                            $sql = "SELECT COUNT(*) AS c from qabar_info WHERE (number IN $qabar_no) AND status=0 AND harwai_status=0";
                                            $run = $conn->query($sql);
                                            $row = $run->fetch_assoc();
                                            $count = $row['c'];
                                            if ($count != $count_qabar_arr) {
                                            ?>
                                                <div class="alert alert-danger background-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                    </button>
                                                    <strong>QABAR NUMBERS ENTERED ARE EITHER OCCUPIED OR IN SOMEONE'S HARWAI</strong>
                                                </div>
                                                <?php
                                            } else {
                                                $s4 = "UPDATE qabar_info SET harwai_status=1 WHERE (number IN $qabar_no)";
                                                if (mysqli_query($conn, $s4)) {


                                                    foreach ($qabar_arr as $qabar_arr_value) {

                                                        $s5 = "INSERT INTO harwai_qabar( `harwai_id`, `qabar_no`, `status`, `admin_id`, `date`, `timestamp`) VALUES ($harwai_id,'$qabar_arr_value',0,$admin_id,'$date','$time')";
                                                        mysqli_query($conn, $s5);
                                                    }
                                                ?>
                                                    <div class="alert alert-success background-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>SUCCESS</strong>
                                                    </div>
                                                    <script type="text/javascript">
                                                        window.open('form_view_harwai.php?harwai_id=<?php echo $harwai_id ?>', '_blank');
                                                    </script>
                                <?php
                                                }
                                            }
                                        }
                                    }
                                }


                                ?>

                                <?php
                                if (isset($_GET['submit'])) {
                                    $type = $_GET['type'];
                                    if ($type == 0) {
                                        $harwai_id = $_GET['harwai_no'];
                                        $sql0 = "SELECT id from harwai_info where id=$harwai_id";
                                        $run0 = $conn->query($sql0);
                                        if ($run0->num_rows > 0) {

                                ?>
                                            <div class="card">

                                                <div class="card-block">
                                                    <h5 class="sub-title">Harwai Number: <?php echo $harwai_id ?></h5>
                                                    <?php
                                                    require('form_harwai_edit_format.php');
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
                                                <strong>NOT FOUND</strong>
                                            </div>
                                            <?php
                                        }
                                    } else if($type==1) {
                                        $get_id = $_GET['input'];
                                        if (strpos($get_id, '(') !== false) {

                                            $first_index = stripos($get_id, "(") + 1;
                                            $s_id_e = substr($get_id, $first_index);
                                            $get_id = rtrim($s_id_e, ") ");
                                        }
                                        $sql0 = "SELECT id from harwai_info where id=$get_id";
                                        $run0 = $conn->query($sql0);
                                        if ($run0->num_rows > 0) {
                                            while ($row0 = $run0->fetch_assoc()) {
                                                $harwai_id = $row0['id'];


                                            ?>
                                                <div class="card">

                                                    <div class="card-block">
                                                        <h5 class="sub-title">Harwai Number: <?php echo $harwai_id ?></h5>
                                                        <?php
                                                        require('form_harwai_edit_format.php');
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="alert alert-danger background-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>NOT FOUND</strong>
                                            </div>
                                <?php
                                        }
                                    }
                                    else {
                                        $qabar_no = strtoupper($_GET['qabar_no']);
                                      
                                        $sql0 = "SELECT harwai_id from harwai_qabar where qabar_no='$qabar_no'";
                                        $run0 = $conn->query($sql0);
                                        if ($run0->num_rows > 0) {
                                            while ($row0 = $run0->fetch_assoc()) {
                                                $harwai_id = $row0['harwai_id'];


                                            ?>
                                                <div class="card">

                                                    <div class="card-block">
                                                        <h5 class="sub-title">Harwai Number: <?php echo $harwai_id ?></h5>
                                                        <?php
                                                        require('form_harwai_edit_format.php');
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="alert alert-danger background-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>NOT FOUND</strong>
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

=
    <?php
    require('footer.php');
    ?>
</body>

</html>