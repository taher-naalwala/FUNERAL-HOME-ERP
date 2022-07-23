<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
require('connectDB.php');
$admin_id = $_SESSION['admin_id_qabrastan'];

function get_operating_system()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $operating_system = 'Unknown Operating System';

    //Get the operating_system name
    if (preg_match('/linux/i', $u_agent)) {
        $operating_system = 'Linux';
    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
        $operating_system = 'Mac';
    } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
        $operating_system = 'Windows';
    } elseif (preg_match('/ubuntu/i', $u_agent)) {
        $operating_system = 'Ubuntu';
    } elseif (preg_match('/iphone/i', $u_agent)) {
        $operating_system = 'IPhone';
    } elseif (preg_match('/ipod/i', $u_agent)) {
        $operating_system = 'IPod';
    } elseif (preg_match('/ipad/i', $u_agent)) {
        $operating_system = 'IPad';
    } elseif (preg_match('/android/i', $u_agent)) {
        $operating_system = 'Android';
    } elseif (preg_match('/blackberry/i', $u_agent)) {
        $operating_system = 'Blackberry';
    } elseif (preg_match('/webos/i', $u_agent)) {
        $operating_system = 'Mobile';
    }

    return $operating_system;
}

$os = get_operating_system();


//3. If the form is submitted or not.
//3.1 If the form is submitted

//3.1.4 if the user is logged in Greets the user with message

if (isset($_SESSION['mobile_qabrastan'])) {
    $mobile=$_SESSION['mobile_qabrastan'];
} else {
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login-Qabrastan Software</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="colorrib/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="colorrib/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="colorrib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="colorrib/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="colorrib/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="colorrib/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="colorrib/css/util.css">
    <link rel="stylesheet" type="text/css" href="colorrib/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('colorrib/images/jamea.jpeg');">
            <div class="wrap-login100">


                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title">
                        OTP Verification
                    </span>
                    <?php
                    if (isset($_POST['submit'])) {
                        $user_entered_otp = $_POST['otp'];
                        $sql = "SELECT otp from web_login where id=$admin_id";
                        $run = $conn->query($sql);
                        $row = $run->fetch_assoc();
                        $server_otp = $row['otp'];
                        if ($user_entered_otp == $server_otp) {
                            $_SESSION['access_qabrastan'] = "1";
                            $log = "LOGIN TO QABRASTAN SOFTWARE FOR ADMINID ".$admin_id;
                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                            mysqli_query($conn, $s2_log);
                    ?>
                            <script type="text/javascript">
                                window.location = 'main.php';
                            </script>
                    <?php
                        } else {
                            $log = "ENTERED WRONG OTP FOR ADMINID ".$admin_id;
                            $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                            mysqli_query($conn, $s2_log);

                            echo '<div class="alert alert-danger">
                            OTP ENTERED IS WRONG
                            </div>';
                        }
                    }

                    if(isset($_POST['resend']))
                    {
                        $sql = "SELECT otp from web_login where id=$admin_id";
                        $run = $conn->query($sql);
                        $row = $run->fetch_assoc();
                        $server_otp = $row['otp'];
                        $url = "https://www.fast2sms.com/dev/bulkV2?authorization=Pkae36riBUTxlfMJyQGOSIsE8mRKYZX0dDA4VFjc7wb1nCNtohhVNsOKJqjRFMGU3fYbkSeyr7gnudoQ&route=dlt&sender_id=SDBJIN&message=136074&variables_values=" . $server_otp . "%7C&flash=0&numbers=".$mobile;
                        $ch = curl_init();

                        // set url 
                        curl_setopt($ch, CURLOPT_URL, $url);

                        //return the transfer as a string 
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        // $output contains the output string 
                        $output = curl_exec($ch);


                        // close curl resource to free up system resources 
                        curl_close($ch);
                    }
                    ?>

                    <div class="wrap-input100 ">
                        <input autocomplete="FALSE" class="input100" max="9999" type="number" name="otp" placeholder="ENTER OTP">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>



                    <div class="container-login100-form-btn">
                        <button type="submit" name="submit" value="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
               
                    <div class="container-login100-form-btn">
                        <button id="resend" type="submit" name="resend" value="submit" class="btn btn-info btn-block">
                            Resend OTP
                        </button>
                    </div>

                </form>



            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('input[type=number][max]:not([max=""])').on('input', function(ev) {
                var $this = $(this);
                var maxlength = $this.attr('max').length;
                var value = $this.val();
                if (value && value.length >= maxlength) {
                    $this.val(value.substr(0, maxlength));
                }
            });

        });



        $(function() {
            timer();
            $("#resend").attr("disabled", "disabled");
            //  $('#resend').text('Resend OTP (Wait For 30 seconds)');
            setTimeout(function() {
                $("#resend").removeAttr("disabled");
                // $('#resend').text('Resend OTP');
            }, 30000);

        });

        function timer() {
            var timeLeft = 30;
            var elem = document.getElementById('resend');

            var timerId = setInterval(countdown, 934);

            function countdown() {
                if (timeLeft == -1) {
                    clearTimeout(timerId);
                    elem.textContent = "Resend OTP";
                } else {
                    elem.textContent = "Resend OTP (Wait For " + timeLeft + ' seconds)';
                    timeLeft--;
                }
            }
        }
    </script>


    <!--===============================================================================================-->
    <script src="colorrib/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="colorrib/vendor/bootstrap/js/popper.js"></script>
    <script src="colorrib/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="colorrib/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="colorrib/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="colorrib/js/main.js"></script>

    
   
</body>

</html>