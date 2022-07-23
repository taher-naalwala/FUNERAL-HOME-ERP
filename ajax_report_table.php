<?php
require('connectDB.php');

$type = $_GET['type'];
if ($type == 1) {

    $br = $_GET['br'];
    if ($br == 0) {
        $harwai_id = $_GET['harwai_no'];
        $sql = "SELECT COUNT(*) as c FROM harwai_info where id=$harwai_id";
        $s2 = "SELECT * from harwai_info where id=$harwai_id";
    } else if ($br == 1) {

        $get_id = $_GET['input'];
        if (strpos($get_id, '(') !== false) {

            $first_index = stripos($get_id, "(") + 1;
            $s_id_e = substr($get_id, $first_index);
            $get_id = rtrim($s_id_e, ") ");
        }

        $sql = "SELECT COUNT(*) as c FROM harwai_info where id='$get_id'";
        $s2 = "SELECT * from harwai_info where id='$get_id'";
    } else {
        $qabar_no = strtoupper($_GET['qabar_no']);

        $sql = "SELECT COUNT(*) as c from harwai_qabar where qabar_no='$qabar_no'";
        $s21 = "SELECT harwai_id from harwai_qabar where qabar_no='$qabar_no'";
    }
    $run = $conn->query($sql);
    $row = $run->fetch_assoc();
    $c = $row['c'];
    if ($c > 0) {


        $s1 = "SELECT name,address,reg_no from trust_info";
        $run1 = $conn->query($s1);
        $row1 = $run1->fetch_assoc();
        $trust_name = $row1['name'];
        $trust_address = $row1['address'];
        $trust_reg = $row1['reg_no'];

        if ($br == 2) {
            $run2 = $conn->query($s21);
            $row51 = $run2->fetch_assoc();
            $harwai_id = $row51['harwai_id'];
            $s2 = "SELECT * from harwai_info where id=$harwai_id";
            $run2 = $conn->query($s2);
            $row5 = $run2->fetch_assoc();
        } else {

            $run2 = $conn->query($s2);
            $row5 = $run2->fetch_assoc();
            $harwai_id = $row5['id'];
        }



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
        $harwai_created_date = $row5['created_date'];



        $b_relation = $row5['n_relation'];
        $amt = $row5['amt'];
        $s6 = "SELECT qabar_no from harwai_qabar where harwai_id=$harwai_id";
        $run6 = $conn->query($s6);
        $qabar_no = "";
        while ($row6 = $run6->fetch_assoc()) {
            $qabar_no = $qabar_no . "" . $row6['qabar_no'] . ",";
        }
        $qabar_no = substr($qabar_no, 0, strlen($qabar_no) - 1);





?>
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Harwai Form</h5>

                                        <?php

                                        require('form_harwai_format.php');


                                        ?>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Ledger</h5>

                                        <?php
                                        if ($harwai_created_date < '2022-03-01') {
                                            $sql2 = "SELECT amt from dafan_receipt where type=1 and harwai_id=$harwai_id and status=0";
                                            $sql01 = "SELECT amt,id,date,status from dafan_receipt where type=1 and harwai_id=$harwai_id";
                                            $entry_type = "old";
                                        } else {
                                            $sql2 = "SELECT amt from dafan_receipt_1 where type=1 and harwai_id=$harwai_id and status=0";
                                            $sql01 = "SELECT amt,id,date,status from dafan_receipt_1 where type=1 and harwai_id=$harwai_id";
                                            $entry_type = "new";
                                        }
                                        $run2 = $conn->query($sql2);
                                        if ($run2->num_rows > 0) {
                                            $total_amt_paid = 0;
                                            while ($row2 = $run2->fetch_assoc()) {
                                                $total_amt_paid = $total_amt_paid + $row2['amt'];
                                            }
                                        } else {
                                            $total_amt_paid = 0;
                                        }
                                        $run01 = $conn->query($sql01);
                                        require('receipt_add_table.php');


                                        ?>
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
    ?>
        <div class="alert alert-danger background-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled text-white"></i>
            </button>
            <strong>NOT FOUND</strong>
        </div>
        <?php
    }
} else if ($type == 0) {

    $category = $_GET['category'];
    if ($category == 0) {
        $dafan_id = $_GET['form_no'];
        $s2 = "SELECT * from dafan_info where id=$dafan_id";
        $sql = "SELECT COUNT(*) as c FROM dafan_info where id=$dafan_id";
    } else if ($category == 1) {
        $qabar_no = strtoupper($_GET['qabar_no']);
        $s2 = "SELECT * from dafan_info where qabar_no='$qabar_no' and status=0";
        $sql = "SELECT COUNT(*) as c FROM dafan_info where qabar_no='$qabar_no' and status=0";
    } else {
        $get_id = $_GET['input'];
        if (strpos($get_id, '(') !== false) {

            $first_index = stripos($get_id, "(") + 1;
            $s_id_e = substr($get_id, $first_index);
            $get_id = rtrim($s_id_e, ") ");
        }

        $sql = "SELECT COUNT(*) as c FROM dafan_info where id='$get_id'";
        $s2 = "SELECT * from dafan_info where id='$get_id'";
    }

    $run = $conn->query($sql);
    $row = $run->fetch_assoc();
    $c = $row['c'];
    if ($c > 0) {
        $s1 = "SELECT name,address,reg_no from trust_info";
        $run1 = $conn->query($s1);
        $row1 = $run1->fetch_assoc();
        $trust_name = $row1['name'];
        $trust_address = $row1['address'];
        $trust_reg = $row1['reg_no'];

        $run2 = $conn->query($s2);
        while ($row5 = $run2->fetch_assoc()) {
            $dafan_id = $row5['id'];
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

        ?>
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">Dafan Form</h5>

                                            <?php

                                            require('form_dafan_format.php');


                                            ?>
                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">Ledger</h5>

                                            <?php
                                            if ($date_of_death < '2022-03-01') {
                                                $sql2 = "SELECT amt from dafan_receipt where type=0 and dafan_id=$dafan_id and status=0";
                                                $sql01 = "SELECT amt,id,status,date from dafan_receipt where type=0 and dafan_id=$dafan_id";
                                                $entry_type = "old";
                                            } else {
                                                $sql2 = "SELECT amt from dafan_receipt_1 where type=0 and dafan_id=$dafan_id and status=0";
                                                $sql01 = "SELECT amt,id,status,date from dafan_receipt_1 where type=0 and dafan_id=$dafan_id";
                                                $entry_type = "new";
                                            }
                                            $run2 = $conn->query($sql2);
                                            if ($run2->num_rows > 0) {
                                                $total_amt_paid = 0;
                                                while ($row2 = $run2->fetch_assoc()) {
                                                    $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                }
                                            } else {
                                                $total_amt_paid = 0;
                                            }
                                            $run01 = $conn->query($sql01);
                                            require('receipt_add_table.php');


                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
} else if ($type == 5) {
    $qabar_no = strtoupper($_GET['qabar_no']);
    $sql = "SELECT  * from qabar_info where number='$qabar_no'";
    $run = $conn->query($sql);
    $row = $run->fetch_assoc();
    $amt = $row['amt'];
    $status = $row['status'];
    if ($status == 0) {
        $status_name = "VACANT";
    } else if ($status == 1) {
        $status_name = "OCCUPIED";
    } else {
        $status_name = "DELETED";
    }
    $type = $row['type'];

    $harwai_status = $row['harwai_status'];
    if ($harwai_status == 0) {
        $harwai_status_name = "NOT A HARWAI QABAR";
    } else {
        $harwai_status_name = "HARWAI QABAR";
    }
    $created_timestamp = $row['created_timestamp'];
    $date = $row['date'];
    $timestamp = $row['timestamp'];
    $created_date = $row['created_date'];
    $created_admin_id = $row['created_admin_id'];
    $admin_id = $row['admin_id'];
    $sql = "SELECT name from web_login where id=$admin_id";
    $run = $conn->query($sql);
    $row = $run->fetch_assoc();
    $admin_name = $row['name'];

    $sql1 = "SELECT name from web_login where id=$created_admin_id";
    $run = $conn->query($sql1);
    $row = $run->fetch_assoc();
    $created_admin_name = $row['name'];

    ?>
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">

                                <div class="card-block">
                                    <h5 class="sub-title">Qabar Number: <?php echo $qabar_no ?></h5>
                                    <p>AMOUNT: <b><?php echo $amt ?></p>

                                    <p>STATUS: <b><?php echo $status_name ?></p>
                                    <p>TYPE: <b><?php echo $type ?></p>
                                    <p>HARWAI STATUS: <b><?php echo $harwai_status_name ?></p>
                                    <p>CREATED BY ADMIN: <b><?php echo $created_admin_name ?></p>
                                    <p>CREATED ON: <b><?php echo $created_date ?> AT <?php echo $created_timestamp ?></p>
                                    <p>MODIFIED BY ADMIN: <b><?php echo $admin_name ?></p>
                                    <p>MODIFIED ON: <b><?php echo $date ?> AT <?php echo $timestamp ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($status == 1 || $harwai_status == 1) {
        if ($status == 1) {
            $qabar_no = strtoupper($_GET['qabar_no']);
            $s2 = "SELECT * from dafan_info where qabar_no='$qabar_no'";
            $sql = "SELECT COUNT(*) as c FROM dafan_info where qabar_no='$qabar_no'";
            $run = $conn->query($sql);
            $row = $run->fetch_assoc();
            $c = $row['c'];
            if ($c > 0) {
                $s1 = "SELECT name,address,reg_no from trust_info";
                $run1 = $conn->query($s1);
                $row1 = $run1->fetch_assoc();
                $trust_name = $row1['name'];
                $trust_address = $row1['address'];
                $trust_reg = $row1['reg_no'];

                $run2 = $conn->query($s2);
                $row5 = $run2->fetch_assoc();
                $dafan_id = $row5['id'];
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

    ?>
                <div class="pcoded-inner-content">

                    <div class="main-body">
                        <div class="page-wrapper">

                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title">Dafan Form</h5>

                                                <?php

                                                require('form_dafan_format.php');


                                                ?>
                                            </div>
                                        </div>
                                        <div class="card">

                                            <div class="card-block">
                                                <h5 class="sub-title">Ledger</h5>

                                                <?php
                                                if ($date_of_death < '2022-03-01') {
                                                    $sql2 = "SELECT amt from dafan_receipt where type=0 and dafan_id=$dafan_id and status=0";
                                                    $sql01 = "SELECT amt,id,status,date from dafan_receipt where type=0 and dafan_id=$dafan_id";
                                                    $entry_type = "old";
                                                } else {
                                                    $sql2 = "SELECT amt from dafan_receipt_1 where type=0 and dafan_id=$dafan_id and status=0";
                                                    $sql01 = "SELECT amt,id,status,date from dafan_receipt_1 where type=0 and dafan_id=$dafan_id";
                                                    $entry_type = "new";
                                                }
                                                $run2 = $conn->query($sql2);
                                                if ($run2->num_rows > 0) {
                                                    $total_amt_paid = 0;
                                                    while ($row2 = $run2->fetch_assoc()) {
                                                        $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                    }
                                                } else {
                                                    $total_amt_paid = 0;
                                                }
                                                $run01 = $conn->query($sql01);
                                                require('receipt_add_table.php');


                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            }
        }

        if ($harwai_status == 1) {


            $sql = "SELECT COUNT(*) as c from harwai_qabar where qabar_no='$qabar_no'";
            $s21 = "SELECT harwai_id from harwai_qabar where qabar_no='$qabar_no'";
            $run = $conn->query($sql);
            $row = $run->fetch_assoc();
            $c = $row['c'];



            $s1 = "SELECT name,address,reg_no from trust_info";
            $run1 = $conn->query($s1);
            $row1 = $run1->fetch_assoc();
            $trust_name = $row1['name'];
            $trust_address = $row1['address'];
            $trust_reg = $row1['reg_no'];

            $run2 = $conn->query($s21);
            $row51 = $run2->fetch_assoc();
            $harwai_id = $row51['harwai_id'];
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





            ?>
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">Harwai Form</h5>

                                            <?php

                                            require('form_harwai_format.php');


                                            ?>
                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">Ledger</h5>

                                            <?php
                                            if ($harwai_created_date < '2022-03-01') {
                                                $sql2 = "SELECT amt from dafan_receipt where type=1 and harwai_id=$harwai_id and status=0";
                                                $sql01 = "SELECT  amt,id,date,status from dafan_receipt where type=1 and harwai_id=$harwai_id";
                                                $entry_type = "old";
                                            } else {
                                                $sql2 = "SELECT amt from dafan_receipt_1 where type=1 and harwai_id=$harwai_id and status=0";
                                                $sql01 = "SELECT  amt,id,date,status from dafan_receipt_1 where type=1 and harwai_id=$harwai_id";
                                                $entry_type = "new";
                                            }
                                            $run2 = $conn->query($sql2);
                                            if ($run2->num_rows > 0) {
                                                $total_amt_paid = 0;
                                                while ($row2 = $run2->fetch_assoc()) {
                                                    $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                }
                                            } else {
                                                $total_amt_paid = 0;
                                            }
                                            $run01 = $conn->query($sql01);
                                            require('receipt_add_table.php');


                                            ?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php


        }
    }
    ?>

    <?php
} else if ($type == 6) {
    $p_type = $_GET['p_type'];
    if ($p_type == 1) {
        $sql = "SELECT id,name,amt,mobile FROM harwai_info where payment_status=0";
        $run = $conn->query($sql);
        if ($run->num_rows > 0) {

    ?>
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Payment Pending (Harwai)</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="order-table" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>HARWAI NO</th>
                                                            <th>NAME</th>
                                                            <th>MOBILE</th>
                                                            <th>AMOUNT</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row = $run->fetch_assoc()) {
                                                        ?>
                                                            <tr>
                                                                <?php
                                                                $harwai_id = $row['id'];
                                                                $name = $row['name'];
                                                                $sql2 = "SELECT amt from dafan_receipt_1 where type=1 and harwai_id=$harwai_id";
                                                                $run2 = $conn->query($sql2);
                                                                if ($run2->num_rows > 0) {
                                                                    $total_amt_paid = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                                    }
                                                                } else {
                                                                    $total_amt_paid = 0;
                                                                }
                                                                $amt = $row['amt'];
                                                                $mobile = $row['mobile'];
                                                                ?>
                                                                <td><a href="form_view_harwai.php?harwai_id=<?php echo $harwai_id ?>" target="_blank"><?php echo $harwai_id ?></a></td>

                                                                <td><?php echo $name ?></td>
                                                                <td><?php echo $mobile ?></td>
                                                                <td><?php echo $amt - $total_amt_paid ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>HARWAI NO</th>
                                                            <th>NAME</th>
                                                            <th>MOBILE</th>
                                                            <th>AMOUNT</th>

                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery.datatables.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/datatables.buttons.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/jszip.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/pdfmake.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/vfs_fonts.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/buttons.print.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/buttons.html5.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/datatables.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/datatables.responsive.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/responsive.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>

            <script>
                $(document).ready(function() {
                    $('#order-table').DataTable({

                        dom: 'Bfrtip',
                        buttons: [

                            'print',
                            'excelHtml5',

                            'pdfHtml5'

                        ]
                    });
                });
            </script>

        <?php

        } else {
        ?>
            <div class="alert alert-danger background-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>NO PAYMENT PENDING</strong>
            </div>
        <?php
        }
    } else {
        $sql = "SELECT id,m_name,amt,b_mobile,b_name FROM dafan_info where payment_status=0";
        $run = $conn->query($sql);
        if ($run->num_rows > 0) {

        ?>
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Payment Pending (Dafan)</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="order-table" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>DAFAN FORM NO</th>
                                                            <th>MARHOOM NAME</th>
                                                            <th>MEMBER NAME</th>
                                                            <th>MOBILE</th>
                                                            <th>AMOUNT</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row = $run->fetch_assoc()) {
                                                        ?>
                                                            <tr>
                                                                <?php
                                                                $dafan_id = $row['id'];
                                                                $m_name = $row['m_name'];
                                                                $b_name = $row['b_name'];
                                                                $sql2 = "SELECT amt from dafan_receipt_1 where type=0 and dafan_id=$dafan_id";
                                                                $run2 = $conn->query($sql2);
                                                                if ($run2->num_rows > 0) {
                                                                    $total_amt_paid = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $total_amt_paid = $total_amt_paid + $row2['amt'];
                                                                    }
                                                                } else {
                                                                    $total_amt_paid = 0;
                                                                }
                                                                $amt = $row['amt'];
                                                                $mobile = $row['b_mobile'];
                                                                ?>
                                                                <td><a href="form_view_dafan.php?dafan_id=<?php echo $dafan_id ?>" target="_blank"><?php echo $dafan_id ?></a></td>
                                                                <td><?php echo $m_name ?></td>
                                                                <td><?php echo $b_name ?></td>
                                                                <td><?php echo $mobile ?></td>
                                                                <td><?php echo $amt - $total_amt_paid ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>DAFAN FORM NO</th>
                                                            <th>MARHOOM NAME</th>
                                                            <th>MEMBER NAME</th>
                                                            <th>MOBILE</th>
                                                            <th>AMOUNT</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery.datatables.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/datatables.buttons.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/jszip.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/pdfmake.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/vfs_fonts.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/buttons.print.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/buttons.html5.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/datatables.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/datatables.responsive.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
            <script src="js/responsive.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>



            <script>
                $(document).ready(function() {
                    $('#order-table').DataTable({
                        "order": [
                            [0, "desc"]
                        ],

                        dom: 'Bfrtip',
                        buttons: [

                            'print',
                            'excelHtml5',

                            'pdfHtml5'

                        ]
                    });
                });
            </script>

        <?php

        } else {
        ?>
            <div class="alert alert-danger background-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>NO PAYMENT PENDING</strong>
            </div>
        <?php
        }
    }
} else if ($type == 7) {
    $p_type = $_GET['ledger_type'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $checkbox = $_GET['checkbox'];
    $columns = implode(', ', $checkbox);
    if ($p_type == 4) {
        $sql = "SELECT amt,date,timestamp,adminid,status,type,id FROM `dafan_receipt_1` WHERE (date>='$start_date' and date<='$end_date') UNION SELECT amt,date,timestamp,admin_id,status,type,id FROM `voucher_info` WHERE (date>='$start_date' and date<='$end_date') ORDER BY date ASC";
    } else if ($p_type == 0) {
        $sql = "SELECT amt,date,timestamp,adminid,status,type,id FROM `dafan_receipt_1` WHERE (date>='$start_date' and date<='$end_date') and type=0 ORDER BY date ASC";
    } else if ($p_type == 1) {
        $sql = "SELECT amt,date,timestamp,adminid,status,type,id FROM `dafan_receipt_1` WHERE (date>='$start_date' and date<='$end_date') and type=1 ORDER BY date ASC";
    } else {
        $voucher_type = $_GET['voucher_type'];
        if ($voucher_type == "0") {
            $sql = "SELECT amt,date,timestamp,admin_id,status,type,id FROM `voucher_info` WHERE (date>='$start_date' and date<='$end_date') ORDER BY date ASC";
        } else {
            $sql = "SELECT amt,date,timestamp,admin_id,status,type,id FROM `voucher_info` WHERE (date>='$start_date' and date<='$end_date') and debit='$voucher_type' ORDER BY date ASC";
        }
    }
    $run = $conn->query($sql);
    if ($run->num_rows > 0) {
        ?>
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ledger</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <?php
                                                        if (in_array("date", $checkbox)) {

                                                            echo "<th>DATE</th>";
                                                        }
                                                        if (in_array("cb", $checkbox)) {

                                                            echo "<th>CREATED BY</th>";
                                                        }
                                                        if (in_array("type", $checkbox)) {

                                                            echo "<th>TYPE</th>";
                                                        }
                                                        if (in_array("status", $checkbox)) {

                                                            echo "<th>STATUS</th>";
                                                        }
                                                        if (in_array("id", $checkbox)) {

                                                            echo "<th>ID</th>";
                                                        }
                                                        if (in_array("qn", $checkbox)) {

                                                            echo "<th>QABAR NO.</th>";
                                                        }
                                                        if (in_array("d_amt", $checkbox)) {

                                                            echo "<th>DEFAULT AMT</th>";
                                                        }
                                                        if (in_array("hu", $checkbox)) {

                                                            echo "<th>HAQQ UN NAFS UNIT</th>";
                                                        }
                                                        if (in_array("hn_amt", $checkbox)) {

                                                            echo "<th>HAQQ UN NAFS AMT</th>";
                                                        }
                                                        if (in_array("hn_amt", $checkbox)) {

                                                            echo "<th>HAQQ UN NAFS AMT</th>";
                                                        }
                                                        if (in_array("hs", $checkbox)) {

                                                            echo "<th>HARWAI STATUS</th>";
                                                        }
                                                        if (in_array("md", $checkbox)) {

                                                            echo "<th>MARHOOM ITS</th>";
                                                            echo "<th>MARHOOM NAME</th>";
                                                            echo "<th>MARHOOM SURNAME</th>";
                                                            echo "<th>MARHOOM MOTHER</th>";
                                                            echo "<th>MARHOOM FATHER</th>";
                                                            echo "<th>MARHOOM AGE</th>";
                                                            echo "<th>MARHOOM PLACE OF DEATH</th>";
                                                            echo "<th>MARHOOM GENDER</th>";

                                                            echo "<th>MARHOOM ADDRESS</th>";
                                                            echo "<th>MARHOOM REASON OF DEATH</th>";
                                                            echo "<th>MARHOOM SABEEL NO</th>";
                                                            echo "<th>MARHOOM MOHALLA</th>";
                                                            echo "<th>MARHOOM AADHAAR</th>";
                                                        }
                                                        if (in_array("bmd", $checkbox)) {

                                                            echo "<th>BOOKING MEMBER ITS</th>";
                                                            echo "<th>BOOKING MEMBER NAME</th>";
                                                            echo "<th>BOOKING MEMBER MOBILE</th>";
                                                            echo "<th>BOOKING MEMBER RELATION</th>";
                                                        }
                                                        if (in_array("dod", $checkbox)) {

                                                            echo "<th>DATE OF DEATH</th>";
                                                        }
                                                        if (in_array("hdod", $checkbox)) {

                                                            echo "<th>HIJRI DATE OF DEATH</th>";
                                                            echo "<th>HIJRI MONTH OF DEATH</th>";
                                                            echo "<th>HIJRI YEAR OF DEATH</th>";
                                                        }
                                                        if (in_array("ps", $checkbox)) {

                                                            echo "<th>PAYMENT STATUS</th>";
                                                        }
                                                        if (in_array("hnd", $checkbox)) {

                                                            echo "<th>NOMINEE ITS</th>";
                                                            echo "<th>NOMINEE NAME</th>";

                                                            echo "<th>NOMINEE ADDRESS</th>";

                                                            echo "<th>NOMINEE SABEEL NO</th>";
                                                            echo "<th>NOMINEE MOHALLA</th>";
                                                            echo "<th>NOMINEE MOBILE</th>";
                                                            echo "<th>NOMINEE RELATION</th>";
                                                        }
                                                        if (in_array("hd", $checkbox)) {

                                                            echo "<th>HARWAI ITS</th>";
                                                            echo "<th>HARWAI NAME</th>";

                                                            echo "<th>HARWAI ADDRESS</th>";

                                                            echo "<th>HARWAI SABEEL NO</th>";
                                                            echo "<th>HARWAI MOHALLA</th>";
                                                            echo "<th>HARWAI MOBILE</th>";
                                                        }


                                                        ?>

                                                        <th>DEBIT</th>
                                                        <th>CREDIT</th>
                                                        <th>BALANCE</th>
                                                        <th>VIEW</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $balance = 0;
                                                    while ($row = $run->fetch_assoc()) {
                                                        $type = $row['type'];

                                                        $id = $row['id'];

                                                        if ($type == 0) {
                                                            $s1 = "SELECT dafan_id from dafan_receipt_1 where id=$id";
                                                            $run1 = $conn->query($s1);
                                                            $row1 = $run1->fetch_assoc();
                                                            $dafan_id = $row1['dafan_id'];
                                                        } else if ($type == 1) {
                                                            $s1 = "SELECT harwai_id from dafan_receipt_1 where id=$id";
                                                            $run1 = $conn->query($s1);
                                                            $row1 = $run1->fetch_assoc();
                                                            $harwai_id = $row1['harwai_id'];
                                                        }
                                                    ?>
                                                        <tr>
                                                            <?php
                                                            $date = $row['date'];
                                                            $amt = $row['amt'];
                                                            if ($p_type == 2) {
                                                                $admin_id = $row['admin_id'];
                                                            } else {
                                                                $admin_id = $row['adminid'];
                                                            }
                                                            $status = $row['status'];

                                                            if ($type == 0) {
                                                                $type_name = "DAFAN";
                                                            } else if ($type == 1) {
                                                                $type_name = "HARWAI";
                                                            } else {
                                                                $type_name = "VOUCHER";
                                                            }

                                                            if ($status == 0) {
                                                                $status_name = "ACTIVE";
                                                            } else {
                                                                $status_name = "DELETED";
                                                            }
                                                            $sql1 = "SELECT name from web_login where id=$admin_id";
                                                            $run1 = $conn->query($sql1);
                                                            $row1 = $run1->fetch_assoc();
                                                            $admin_name = $row1['name'];

                                                            if (in_array("date", $checkbox)) { ?>
                                                                <td><?php echo $date ?></td>
                                                            <?php
                                                            }
                                                            if (in_array("cb", $checkbox)) { ?>
                                                                <td><?php echo $admin_name ?></td>
                                                            <?php
                                                            }
                                                            if (in_array("type", $checkbox)) { ?>
                                                                <td><?php echo $type_name ?></td>
                                                            <?php
                                                            }
                                                            if (in_array("status", $checkbox)) { ?>
                                                                <td><?php echo $status_name ?></td>
                                                                <?php
                                                            }
                                                            if (in_array("id", $checkbox)) {

                                                                if ($type == 0) {
                                                                ?>
                                                                    <td><?php echo $dafan_id ?></td>
                                                                <?php
                                                                } else if ($type == 1) {
                                                                ?>
                                                                    <td><?php echo $harwai_id ?></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td><?php echo $id ?></td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("qn", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT qabar_no from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $qabar_no = $row2['qabar_no'];
                                                                ?>
                                                                    <td><?php echo $qabar_no ?></td>
                                                                <?php
                                                                } else if ($type == 1) {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("d_amt", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT default_amt from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $default_amt = $row2['default_amt'];
                                                                ?>
                                                                    <td><?php echo $default_amt ?></td>
                                                                <?php
                                                                } else if ($type == 1) {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }

                                                            if (in_array("hu", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT haqq_un_nafs_unit from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $haqq_un_nafs_unit = $row2['haqq_un_nafs_unit'];
                                                                ?>
                                                                    <td><?php echo $haqq_un_nafs_unit ?></td>
                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("hn_amt", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT haqq_un_nafs_amt from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $haqq_un_nafs_amt = $row2['haqq_un_nafs_amt'];
                                                                ?>
                                                                    <td><?php echo $haqq_un_nafs_amt ?></td>
                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("hs", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT harwai_status from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $harwai_status = $row2['harwai_status'];
                                                                    if ($harwai_status == 0) {
                                                                        $harwai_status_name = "NOT HARWAI QABAR";
                                                                    } else {
                                                                        $harwai_status_name = "HARWAI QABAR";
                                                                    }
                                                                ?>
                                                                    <td><?php echo $harwai_status_name ?></td>
                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("md", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT m_its,m_name,m_address,m_rod,m_sabeel_no,m_mohalla,m_aadhaar_no,surname,mother_name,father_name,age,place_of_death,gender from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $m_its = $row2['m_its'];
                                                                    $m_name = $row2['m_name'];
                                                                    $m_address = $row2['m_address'];
                                                                    $m_rod = $row2['m_rod'];
                                                                    $m_sabeel_no = $row2['m_sabeel_no'];
                                                                    $m_mohalla = $row2['m_mohalla'];
                                                                    $m_aadhaar = $row2['m_aadhaar_no'];
                                                                    $m_surname = $row2['surname'];
                                                                    $m_mother = $row2['mother_name'];
                                                                    $m_father = $row2['father_name'];
                                                                    $m_age = $row2['age'];
                                                                    $place_of_death = $row2['place_of_death'];
                                                                    $gender = $row2['gender'];

                                                                ?>
                                                                    <td><?php echo $m_its ?></td>
                                                                    <td><?php echo $m_name ?></td>
                                                                    <td><?php echo $m_surname ?></td>
                                                                    <td><?php echo $m_mother ?></td>
                                                                    <td><?php echo $m_father ?></td>
                                                                    <td><?php echo $m_age ?></td>
                                                                    <td><?php echo $place_of_death ?></td>
                                                                    <td><?php echo $gender ?></td>

                                                                    <td><?php echo $m_address ?></td>
                                                                    <td><?php echo $m_rod ?></td>
                                                                    <td><?php echo $m_sabeel_no ?></td>
                                                                    <td><?php echo $m_mohalla ?></td>
                                                                    <td><?php echo $m_aadhaar ?></td>
                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("bmd", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT b_its,b_name,b_mobile,b_relation from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $b_its = $row2['b_its'];
                                                                    $b_name = $row2['b_name'];
                                                                    $b_mobile = $row2['b_mobile'];
                                                                    $b_relation = $row2['b_relation'];

                                                                ?>
                                                                    <td><?php echo $b_its ?></td>
                                                                    <td><?php echo $b_name ?></td>
                                                                    <td><?php echo $b_mobile ?></td>
                                                                    <td><?php echo $b_relation ?></td>

                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>

                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("dod", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT date_of_death from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $date_of_death = $row2['date_of_death'];
                                                                ?>
                                                                    <td><?php echo $date_of_death ?></td>
                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }

                                                            if (in_array("hdod", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT hijri_date_of_death,hijri_month_of_death,hijri_year_of_death from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $hijri_date_of_death = $row2['hijri_date_of_death'];
                                                                    $hijri_month_of_death = $row2['hijri_month_of_death'];
                                                                    $hijri_year_of_death = $row2['hijri_year_of_death'];


                                                                ?>
                                                                    <td><?php echo $hijri_date_of_death ?></td>
                                                                    <td><?php echo $hijri_month_of_death ?></td>
                                                                    <td><?php echo $hijri_year_of_death ?></td>


                                                                <?php
                                                                } else if ($type == 1) {

                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>

                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("ps", $checkbox)) {

                                                                if ($type == 0) {
                                                                    $s2 = "SELECT payment_status from dafan_info where id=$dafan_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $payment_status = $row2['payment_status'];
                                                                    if ($payment_status == 0) {
                                                                        $payment_status_name = "PENDING";
                                                                    } else {
                                                                        $payment_status_name = "RECEIVED";
                                                                    }
                                                                ?>
                                                                    <td><?php echo $payment_status_name ?></td>
                                                                <?php
                                                                } else if ($type == 1) {
                                                                    $s2 = "SELECT payment_status from harwai_info where id=$harwai_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $payment_status = $row2['payment_status'];
                                                                    if ($payment_status == 0) {
                                                                        $payment_status_name = "PENDING";
                                                                    } else {
                                                                        $payment_status_name = "RECEIVED";
                                                                    }

                                                                ?>
                                                                    <td><?php echo $payment_status_name ?></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                <?php
                                                                }
                                                            }
                                                            if (in_array("hnd", $checkbox)) {

                                                                if ($type == 0) {


                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                <?php
                                                                } else if ($type == 1) {
                                                                    $s2 = "SELECT n_its,n_name,n_address,n_sabeel_no,n_mohalla,n_mobile,n_relation from harwai_info where id=$harwai_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $n_its = $row2['n_its'];
                                                                    $n_name = $row2['n_name'];
                                                                    $n_address = $row2['n_address'];

                                                                    $n_sabeel_no = $row2['n_sabeel_no'];
                                                                    $n_mohalla = $row2['n_mohalla'];
                                                                    $n_mobile = $row2['n_mobile'];
                                                                    $n_relation = $row2['n_relation'];

                                                                ?>

                                                                    <td><?php echo $n_its ?></td>
                                                                    <td><?php echo $n_name ?></td>
                                                                    <td><?php echo $n_address ?></td>

                                                                    <td><?php echo $n_sabeel_no ?></td>
                                                                    <td><?php echo $n_mohalla ?></td>
                                                                    <td><?php echo $n_mobile ?></td>
                                                                    <td><?php echo $n_relation ?></td>




                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>

                                                                <?php
                                                                }
                                                            }

                                                            if (in_array("hd", $checkbox)) {

                                                                if ($type == 0) {


                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>

                                                                <?php
                                                                } else if ($type == 1) {
                                                                    $s2 = "SELECT its,name,address,sabeel_no,mohalla,mobile from harwai_info where id=$harwai_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $its = $row2['its'];
                                                                    $name = $row2['name'];
                                                                    $address = $row2['address'];

                                                                    $sabeel_no = $row2['sabeel_no'];
                                                                    $mohalla = $row2['mohalla'];
                                                                    $mobile = $row2['mobile'];


                                                                ?>

                                                                    <td><?php echo $its ?></td>
                                                                    <td><?php echo $name ?></td>
                                                                    <td><?php echo $address ?></td>

                                                                    <td><?php echo $sabeel_no ?></td>
                                                                    <td><?php echo $mohalla ?></td>
                                                                    <td><?php echo $mobile ?></td>




                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>

                                                            <?php
                                                                }
                                                            }

                                                            ?>


                                                            <?php
                                                            if ($type == 2) {
                                                                if ($status == 0) {
                                                                    $balance = $balance - $amt;
                                                                }
                                                            ?>
                                                                <td><?php echo $amt ?></td>
                                                                <td>-</td>
                                                            <?php
                                                            } else {
                                                                if ($status == 0) {
                                                                    $balance = $balance + $amt;
                                                                }
                                                            ?>

                                                                <td>-</td>
                                                                <td><?php echo $amt ?></td>
                                                            <?php
                                                            }
                                                            ?>



                                                            <td><?php echo $balance ?></td>

                                                            <?php
                                                            if ($type == 0) {

                                                            ?>
                                                                <td><a href="receipt_add_view.php?id=<?php echo $id ?>&entry_type=new" target="_blank">VIEW</a></td>

                                                            <?php

                                                            } else if ($type == 1) {

                                                            ?>
                                                                <td><a href="receipt_add_view.php?id=<?php echo $id ?>&entry_type=new" target="_blank">VIEW</a></td>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td><a href="voucher_add_view.php?id=<?php echo $id ?>&entry_type=new" target="_blank">VIEW</a></td>

                                                            <?php
                                                            }


                                                            ?>

                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <?php
                                                        if (in_array("date", $checkbox)) {

                                                            echo "<th>DATE</th>";
                                                        }
                                                        if (in_array("cb", $checkbox)) {

                                                            echo "<th>CREATED BY</th>";
                                                        }
                                                        if (in_array("type", $checkbox)) {

                                                            echo "<th>TYPE</th>";
                                                        }
                                                        if (in_array("status", $checkbox)) {

                                                            echo "<th>STATUS</th>";
                                                        }
                                                        if (in_array("id", $checkbox)) {

                                                            echo "<th>ID</th>";
                                                        }
                                                        if (in_array("qn", $checkbox)) {

                                                            echo "<th>QABAR NO.</th>";
                                                        }
                                                        if (in_array("d_amt", $checkbox)) {

                                                            echo "<th>DEFAULT AMT</th>";
                                                        }
                                                        if (in_array("hu", $checkbox)) {

                                                            echo "<th>HAQQ UN NAFS UNIT</th>";
                                                        }
                                                        if (in_array("hn_amt", $checkbox)) {

                                                            echo "<th>HAQQ UN NAFS AMT</th>";
                                                        }
                                                        if (in_array("hn_amt", $checkbox)) {

                                                            echo "<th>HAQQ UN NAFS AMT</th>";
                                                        }
                                                        if (in_array("hs", $checkbox)) {

                                                            echo "<th>HARWAI STATUS</th>";
                                                        }
                                                        if (in_array("md", $checkbox)) {

                                                            echo "<th>MARHOOM ITS</th>";
                                                            echo "<th>MARHOOM NAME</th>";
                                                            echo "<th>MARHOOM SURNAME</th>";
                                                            echo "<th>MARHOOM MOTHER</th>";
                                                            echo "<th>MARHOOM FATHER</th>";
                                                            echo "<th>MARHOOM AGE</th>";
                                                            echo "<th>MARHOOM PLACE OF DEATH</th>";
                                                            echo "<th>MARHOOM GENDER</th>";

                                                            echo "<th>MARHOOM ADDRESS</th>";
                                                            echo "<th>MARHOOM REASON OF DEATH</th>";
                                                            echo "<th>MARHOOM SABEEL NO</th>";
                                                            echo "<th>MARHOOM MOHALLA</th>";
                                                            echo "<th>MARHOOM AADHAAR</th>";
                                                        }
                                                        if (in_array("bmd", $checkbox)) {

                                                            echo "<th>BOOKING MEMBER ITS</th>";
                                                            echo "<th>BOOKING MEMBER NAME</th>";
                                                            echo "<th>BOOKING MEMBER MOBILE</th>";
                                                            echo "<th>BOOKING MEMBER RELATION</th>";
                                                        }
                                                        if (in_array("dod", $checkbox)) {

                                                            echo "<th>DATE OF DEATH</th>";
                                                        }
                                                        if (in_array("hdod", $checkbox)) {

                                                            echo "<th>HIJRI DATE OF DEATH</th>";
                                                            echo "<th>HIJRI MONTH OF DEATH</th>";
                                                            echo "<th>HIJRI YEAR OF DEATH</th>";
                                                        }
                                                        if (in_array("ps", $checkbox)) {

                                                            echo "<th>PAYMENT STATUS</th>";
                                                        }
                                                        if (in_array("hnd", $checkbox)) {

                                                            echo "<th>NOMINEE ITS</th>";
                                                            echo "<th>NOMINEE NAME</th>";

                                                            echo "<th>NOMINEE ADDRESS</th>";

                                                            echo "<th>NOMINEE SABEEL NO</th>";
                                                            echo "<th>NOMINEE MOHALLA</th>";
                                                            echo "<th>NOMINEE MOBILE</th>";
                                                            echo "<th>NOMINEE RELATION</th>";
                                                        }

                                                        ?>
                                                        <th>DEBIT</th>
                                                        <th>CREDIT</th>
                                                        <th>BALANCE</th>
                                                        <th>VIEW</th>

                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.datatables.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/datatables.buttons.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/jszip.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/pdfmake.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/vfs_fonts.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/buttons.print.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/buttons.html5.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/datatables.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/datatables.responsive.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/responsive.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>


        <script>
            $(document).ready(function() {
                $('#order-table').DataTable({

                    "pageLength": 1000,
                    dom: 'Bfrtip',
                    buttons: [

                        'print',
                        'excelHtml5',

                        'pdfHtml5'

                    ]
                });
            });
        </script>

    <?php

    } else {
    ?>
        <div class="alert alert-danger background-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled text-white"></i>
            </button>
            <strong>NO LEDGER AVAILABLE</strong>
        </div>
    <?php
    }
} else if ($type == 8) {

    $user_logcat = $_GET['user_logcat'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    if ($user_logcat == 0) {
        $sql = "SELECT id,log,adminid,date,timestamp from user_logcat where date>='$start_date' and date<='$end_date' ORDER BY id DESC";
    } else {
        $sql = "SELECT id,log,adminid,date,timestamp from user_logcat where (date>='$start_date' and date<='$end_date') and adminid=$user_logcat ORDER BY id DESC";
    }

    $run = $conn->query($sql);
    if ($run->num_rows > 0) {

    ?>
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>LOGCAT</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>USER</th>
                                                        <th>LOG</th>
                                                        <th>DATE</th>
                                                        <th>TIME</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = $run->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <?php
                                                            $log = $row['log'];
                                                            $date = $row['date'];
                                                            $time = $row['timestamp'];
                                                            $adminid = $row['adminid'];
                                                            $s1 = "SELECT name from web_login where id=$adminid";
                                                            $run1 = $conn->query($s1);
                                                            $row1 = $run1->fetch_assoc();
                                                            $admin_name = $row1['name'];
                                                            ?>
                                                            <td><?php echo $admin_name ?></td>

                                                            <td><?php echo $log ?></td>
                                                            <td><?php echo $date ?></td>
                                                            <td><?php echo $time ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>USER</th>
                                                        <th>LOG</th>
                                                        <th>DATE</th>
                                                        <th>TIME</th>

                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.datatables.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/datatables.buttons.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/jszip.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/pdfmake.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/vfs_fonts.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/buttons.print.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/buttons.html5.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/datatables.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/datatables.responsive.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>
        <script src="js/responsive.bootstrap4.min.js" type="7ab3cb0e204785e18dc50839-text/javascript"></script>

        <script>
            $(document).ready(function() {
                $('#order-table').DataTable({
                    pageLength: 1000,
                    dom: 'Bfrtip',
                    buttons: [

                        'print',
                        'excelHtml5',

                        'pdfHtml5'

                    ]
                });
            });
        </script>

    <?php

    } else {
    ?>
        <div class="alert alert-danger background-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled text-white"></i>
            </button>
            <strong>NO LOGCAT FOUND</strong>
        </div>
<?php
    }
}

?>