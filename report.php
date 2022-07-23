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

    if (in_array("10", $forms_access)) {
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
    <title>Report</title>


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

            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                constrainInput: false
            });

        });
    </script>
    <style>
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.8) url("images/loader.gif") center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }
    </style>
</head>

<body>

    <?php
    require('style.php');
    require('search_harwai_name_css.php');
    ?>


    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-inbox bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Report</h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="main.php"> <i class="feather icon-inbox"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Report</a> </li>
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
                                        <h5 class="sub-title">REPORT </h5>
                                        <form id="form1" method="GET">
                                            <div class="row">
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <select name="type" class="form-control" onChange="change_type()" id="type" required>
                                                                <option value="" disabled>--TYPE--</option>
                                                                <option value="0" selected>Dafan</option>
                                                                <option value="1">Harwai</option>
                                                                <option value="5">Qabar Number</option>
                                                                <option value="6">Payment Pending</option>
                                                                <option value="7">Ledger</option>
                                                                <option value="8">User Logcat</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div id="1">
                                                        <div class="form-group ">

                                                            <div class="col-sm-10">

                                                                <select name="category" class="form-control" onChange="change_category()" id="category" required>
                                                                    <option value="" disabled>--CATEGORY--</option>

                                                                    <option value="0" selected>Form Number</option>
                                                                    <option value="1">Qabar Number</option>
                                                                    <option value="2">Marhoom</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div id="2">
                                                        <div class="form-group">

                                                            <div class="col-sm-10">
                                                                <input name="form_no" class="form-control" placeholder="Enter Form Number" required>



                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <div id="3">
                                                                <button id="submit_button" style="color:#fff" name="submit" class="btn btn-primary" value="submit">Submit</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <div id="4">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <div id="5">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="6">

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
        <div id="report_table">
        </div>
        <div class="overlay"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>




    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->






    <script>
        function change_type() {
            $("#1").empty();
            $("#2").empty();
            $("#3").empty();
            $("#4").empty();
            $("#5").empty();


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "ajax_report.php?type=" + document.getElementById("type").value, false);
            xmlhttp.send(null);
            document.getElementById("1").innerHTML = xmlhttp.responseText;

            if (document.getElementById("type").value == 1) {
                document.getElementById("2").innerHTML = ' <div class="form-group row"><div class="col-sm-10"><div class="form-group"> <input name="harwai_no" class="form-control" placeholder="Enter Harwai Number" required></div></div></div>';
                document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 0) {
                document.getElementById("2").innerHTML = '<div class="form-group row">  <div class="col-sm-10"> <input name="form_no" class="form-control" placeholder="Enter Form Number" required> </div> </div>';

                document.getElementById("3").innerHTML = ' <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 3) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


            }
            if (document.getElementById("type").value == 5) {
                document.getElementById("2").innerHTML = '  <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 6) {
                document.getElementById("2").innerHTML = '  <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';


            }
            if (document.getElementById("type").value == 7) {
                document.getElementById("4").innerHTML = '  <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';
                document.getElementById("3").innerHTML = ' <input type="text" value="<?php echo $date ?>" name="end_date" placeholder="Select End Date" autocomplete="FALSE" class="form-control datepicker" id="datepicker" required>';
                document.getElementById("2").innerHTML = ' <input type="text" value="2022-01-01" name="start_date" placeholder="Select Start Date" autocomplete="FALSE" class="form-control datepicker" id="datepicker" required>';

                document.getElementById("6").innerHTML = ' <div class="row mt-4"> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="id" name="checkbox[]" value="id"> <label class="form-check-label" for="id">ID</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="date" name="checkbox[]" value="date" checked> <label class="form-check-label" for="date">DATE</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="cb" name="checkbox[]" value="cb" > <label class="form-check-label" for="cb">CREATED BY</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="type" name="checkbox[]" value="type" checked> <label class="form-check-label" for="type">TYPE</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="status" name="checkbox[]" value="status" checked> <label class="form-check-label" for="status">STATUS</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="qn" name="checkbox[]" value="qn"> <label class="form-check-label" for="qn">Qabar Number</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="d_amt" name="checkbox[]" value="d_amt"> <label class="form-check-label" for="d_amt">Default Amount</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="hu" name="checkbox[]" value="hu"> <label class="form-check-label" for="hu">Haqq Un Nafs Unit</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="hn_amt" name="checkbox[]" value="hn_amt"> <label class="form-check-label" for="hn_amt">Haqq Un Nafs Unit Amt</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="hs" name="checkbox[]" value="hs"> <label class="form-check-label" for="hs">Harwai Status</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="md" name="checkbox[]" value="md"> <label class="form-check-label" for="md">Marhoom Details</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="bmd" name="checkbox[]" value="bmd"> <label class="form-check-label" for="bmd">Booking Member Details</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="dod" name="checkbox[]" value="dod"> <label class="form-check-label" for="dod">Date of Death</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="hdod" name="checkbox[]" value="hdod"> <label class="form-check-label" for="hdod">Hijri Date of Death</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="ps" name="checkbox[]" value="ps"> <label class="form-check-label" for="ps">Payment Status</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="hd" name="checkbox[]" value="hd"> <label class="form-check-label" for="hd">Harwai Details</label> </div> <div class="form-check ml-2"> <input type="checkbox" class="form-check-input" id="hnd" name="checkbox[]" value="hnd"> <label class="form-check-label" for="hnd">Harwai Nominee Details</label> </div> </div>';

            }
            if (document.getElementById("type").value == 8) {
                document.getElementById("4").innerHTML = '  <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';
                document.getElementById("3").innerHTML = ' <input type="text" value="<?php echo $date ?>" name="end_date" placeholder="Select End Date" autocomplete="FALSE" class="form-control datepicker"  required>';
                document.getElementById("2").innerHTML = ' <input type="text" value="<?php echo $date ?>" name="start_date" placeholder="Select Start Date" autocomplete="FALSE" class="form-control datepicker"  required>';

               
            }
            if (document.getElementById("type").value == 4) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


            }

            if (document.getElementById("type").value == 2) {
                document.getElementById("2").innerHTML = '  <div class="form-group row"><div class="col-sm-10"><button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button></div></div>';


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

            $(function() {

                $(".datepicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    constrainInput: false
                });

            });


        }

        $("#input2,#input1").keyup(function() {


            $('#output').val($('#input1').val() * $('#input2').val());

        });


        function change_br() {

            $("#2").empty();


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "ajax_report.php?br=" + document.getElementById("br").value, false);
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

        function change_category() {

            $("#2").empty();


            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "ajax_report.php?category=" + document.getElementById("category").value, false);
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


        function change_ledger_type() {

            $("#2").empty();

            var ledger_type = document.getElementById("ledger_type").value;

            if (ledger_type == 2) {


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "ajax_report.php?ledger_type=" + document.getElementById("ledger_type").value, false);
                xmlhttp.send(null);
                document.getElementById("2").innerHTML = xmlhttp.responseText;


                document.getElementById("5").innerHTML = '  <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';
                document.getElementById("4").innerHTML = ' <input type="text" value="<?php echo $date ?>" name="end_date" placeholder="Select End Date" autocomplete="FALSE" class="form-control datepicker" id="datepicker" required>';
                document.getElementById("3").innerHTML = ' <input type="text" value="2022-01-01" name="start_date" placeholder="Select Start Date" autocomplete="FALSE" class="form-control datepicker" id="datepicker" required>';

            } else {
                document.getElementById("4").innerHTML = '  <button id="submit_button" name="submit" class="btn btn-primary" value="submit">Submit</button>';
                document.getElementById("3").innerHTML = ' <input type="text" value="<?php echo $date ?>" name="end_date" placeholder="Select End Date" autocomplete="FALSE" class="form-control datepicker" id="datepicker" required>';
                document.getElementById("2").innerHTML = ' <input type="text" value="2022-01-01" name="start_date" placeholder="Select Start Date" autocomplete="FALSE" class="form-control datepicker" id="datepicker" required>';
                $('#5').empty();
            }

            $(function() {

                $(".datepicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    constrainInput: false
                });

            });

        }

        $(function() {

            $('#form1').on('submit', function(e) {
                $("body").addClass("loading");
                e.preventDefault();

                $.ajax({
                    type: 'GET',
                    url: 'ajax_report_table.php',
                    data: $('#form1').serialize(),
                    success: function(response) {
                        $('#report_table').html(response);
                        $("body").removeClass("loading");
                    }
                });
/*
                $(document).on({
                    ajaxStart: function() {
                        $("body").addClass("loading");
                    },
                    ajaxStop: function() {
                        $("body").removeClass("loading");
                    }
                }); */

            });

        });
    </script>
    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>