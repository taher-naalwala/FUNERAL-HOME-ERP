<?php
error_reporting(0);
$s1 = "SELECT name,address,reg_no from trust_info";
$run1 = $conn->query($s1);
$row1 = $run1->fetch_assoc();
$trust_name = $row1['name'];
$trust_address = $row1['address'];
$trust_reg = $row1['reg_no'];
$s2 = "SELECT * from harwai_info where id=$harwai_id";
$run2 = $conn->query($s2);
$row5 = $run2->fetch_assoc();
$sabeel_no = $row5['sabeel_no'];
$its = $row5['its'];
$name = $row5['name'];
$mobile = $row5['mobile'];
$address = $row5['address'];
$mohalla = $row5['mohalla'];
$b_its = $row5['n_its'];
$b_name = $row5['n_name'];
$b_mobile = $row5['n_mobile'];
$b_sabeel_no = $row5['n_sabeel_no'];
$b_address = $row5['n_address'];
$b_mohalla = $row5['n_mohalla'];
$harwai_status = $row5['status'];
$harwai_date = $row5['created_date'];




$b_relation = $row5['n_relation'];
$amt = $row5['amt'];




?>
<form method="POST">
    <button name="submit1" class="btn btn-warning float-right" value="<?php echo $harwai_id ?>">EDIT</button>
    <div id="printableArea<?php echo $receipt_number ?>">
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head id="Head1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>
                Harwai Form
            </title>

            <style>
                .ar {
                    font-family: "AL-FATEMI(Lisaan-ud-Dawat)", serif;
                    font-size: 36px;
                }

                .brk {
                    page-break-after: always;
                }

                td {
                    padding: 5px;
                }

                @media print {
                    body {
                        -webkit-print-color-adjust: exact;
                        margin: 0px;
                    }
                }
            </style>

        </head>

        <body class="page-body  page-fade boxed-layout">
            <center>


                <table border="1" width="725" align="center">
                    <tbody>
                        <tr>
                            <td colspan="2" width="100%">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" align="center" style="font: 18px Arial, Helvetica, sans-serif;"><b><?php echo $trust_name ?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo $trust_address  ?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo $trust_reg  ?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b>Managed By : Anjuman-E-Saifee</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <table width="100%">

                                    <tbody>

                                        <tr>
                                            <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Harwai No:</b> <input value="<?php echo $harwai_id ?>" name="harwai_id" required /></td>
                                            <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>Date :</b> <input type="text" name="harwai_date" placeholder="Select Date" autocomplete="FALSE" value="<?php echo $harwai_date ?>" class="datepicker" readonly required></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Purpose of Issue:</b> HARWAI</td>
                                            <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><b>FORM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                    <tbody>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr>
                                            <td colspan="10" align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b>MEMBER INFORMATION</b></td>
                                        </tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr>

                                            <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Sabeel Code: </b> <input value="<?php echo $sabeel_no ?>" name="sabeel_no" required /></td>
                                            <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b> <input value="<?php echo $its ?>" name="its" required /></td>

                                        </tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr>
                                            <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b> <input value="<?php echo $name ?>" name="name" required /></td>
                                            <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mobile:</b> <input value="<?php echo $mobile  ?>" name="mobile" required /></td>

                                        </tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr>
                                            <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Address:</b> <textarea name="address" required><?php echo $address ?></textarea></td>
                                            <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mohalla:</b> <select name="mohalla" required>
                                                    <option value="<?php echo $mohalla ?>"><?php echo $mohalla ?></option>
                                                    <option value="">--Select Mohalla--</option>
                                                    <option value="Saify Nagar">Saify Nagar</option>
                                                    <option value="Haidery">Haidery</option>
                                                    <option value="Masakin-E-Saifiyah">Masakin-E-Saifiyah</option>
                                                    <option value="Noorani Nagar">Noorani Nagar</option>
                                                    <option value="Ammar Nagar">Ammar Nagar</option>
                                                    <option value="Siyaganj">Siyaganj</option>
                                                    <option value="Mufaddal Nagar">Mufaddal Nagar</option>
                                                    <option value="Rao">Rao</option>
                                                    <option value="Hasanji Nagar">Hasanji Nagar</option>
                                                    <option value="Vajihi Mohalla">Vajihi Mohalla</option>
                                                    <option value="Husaini Mohalla">Husaini Mohalla</option>
                                                    <option value="Zainy Mohalla">Zainy Mohalla</option>
                                                    <option value="Chawwni">Chawwni</option>
                                                    <option value="Hakimi Bagh">Hakimi Bagh</option>
                                                    <option value="Saifee Mohalla">Saifee Mohalla</option>
                                                </select></td>

                                        </tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                    <tbody>

                                        <tr>

                                            <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Qabar Numbers:</b></td>

                                        </tr>
                                        <?php
                                        $s0 = "SELECT qabar_no,status from harwai_qabar where harwai_id=$harwai_id";
                                        $run0 = $conn->query($s0);
                                        while ($row0 = $run0->fetch_assoc()) {
                                            $qabar_no = $row0['qabar_no'];
                                            $qabar_status = $row0['status'];
                                        ?>
                                            <tr>

                                                <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b><?php echo $qabar_no; ?></b>
                                                    <b><select name="qabar_status[]" class="ml-4" required>
                                                            <option value="<?php echo $qabar_status . "(" . $qabar_no . ")" ?>" selected><?php if ($qabar_status == 0) {
                                                                                                                                                echo "VACANT";
                                                                                                                                            } else if ($qabar_status == 2) {
                                                                                                                                                echo "DELETED";
                                                                                                                                            } else {
                                                                                                                                                echo "OCCUPIED";
                                                                                                                                            }  ?></option>
                                                            <option value="" disabled>--Status--</option>
                                                            <option value="0(<?php echo $qabar_no ?>)" <?php
                                                                                                        if ($qabar_status == 1) {
                                                                                                            echo "disabled";
                                                                                                        }

                                                                                                        ?>>VACANT</option>
                                                            <option value="2(<?php echo $qabar_no ?>)" <?php
                                                                                                        if ($qabar_status == 1) {
                                                                                                            echo "disabled";
                                                                                                        }

                                                                                                        ?>>DELETED</option>

                                                        </select></b>
                                                </td>
                                            </tr>

                        </tr>
                    <?php
                                        }
                    ?>
                    </tbody>
                </table>
                </td>
                </tr>

                <tr>
                    <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Add Qabar Numbers:</b>

                        <input type="text" placeholder="Enter Qabar Numbers with comma (,) eg. 41,42,43" name="new_qabar_no" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tbody>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="10" align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b>NOMINEE INFORMATION</b></td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>

                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Sabeel Code: </b> <input value="<?php echo $b_sabeel_no ?>" name="n_sabeel_no" required /></td>
                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b> <input value="<?php echo $b_its ?>" name="n_its" required /></td>

                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b> <input value="<?php echo $b_name ?>" name="n_name" required /></td>
                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mobile:</b> <input value="<?php echo $b_mobile  ?>" name="n_mobile" required /></td>

                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Relation:</b> <input value="<?php echo $b_relation ?>" name="n_relation" required /></td>

                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mohalla:</b> <select name="n_mohalla" required>
                                            <option value="<?php echo $b_mohalla ?>"><?php echo $b_mohalla ?></option>
                                            <option value="">--Select Mohalla--</option>
                                            <option value="Saify Nagar">Saify Nagar</option>
                                            <option value="Haidery">Haidery</option>
                                            <option value="Masakin-E-Saifiyah">Masakin-E-Saifiyah</option>
                                            <option value="Noorani Nagar">Noorani Nagar</option>
                                            <option value="Ammar Nagar">Ammar Nagar</option>
                                            <option value="Siyaganj">Siyaganj</option>
                                            <option value="Mufaddal Nagar">Mufaddal Nagar</option>
                                            <option value="Rao">Rao</option>
                                            <option value="Hasanji Nagar">Hasanji Nagar</option>
                                            <option value="Vajihi Mohalla">Vajihi Mohalla</option>
                                            <option value="Husaini Mohalla">Husaini Mohalla</option>
                                            <option value="Zainy Mohalla">Zainy Mohalla</option>
                                            <option value="Chawwni">Chawwni</option>
                                            <option value="Hakimi Bagh">Hakimi Bagh</option>
                                            <option value="Saifee Mohalla">Saifee Mohalla</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Address:</b> <textarea name="n_address" required><?php echo $b_address ?></textarea></td>

                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <table width="100%">
                            <tbody>

                                <tr>

                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Voluntary Contribution:</b> Rs. <input value="<?php echo  $amt  ?>" name="amt" required /></td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tbody>




                                <tr>
                                    <td colspan="2">
                                        <table width="100%">

                                            <tbody>
                                                <br>

                                                <tr>
                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"><?php
                                                                                                                        if ($role_admin_id == 0) {
                                                                                                                        ?>

                                                            <b>Status: </b><select name="harwai_status" required>
                                                                <option value="<?php echo $harwai_status ?>" selected><?php if ($harwai_status == 0) {
                                                                                                                                echo "ACTIVE";
                                                                                                                            } else {
                                                                                                                                echo "DELETED";
                                                                                                                            } ?></option>
                                                                <option value="" disabled>--Status--</option>
                                                                <option value="0">ACTIVE</option>
                                                                <option value="1">DELETED</option>

                                                            </select>
                                                        <?php
                                                                                                                        }
                                                        ?>
                                                    </td>

                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> </td>
                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> </td>
                                                    <td align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b>ARAZ FOR RAZA</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                </tr>


                                                <tr>
                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>

                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Applicant</td>
                                                    <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Nominee</td>
                                                    <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Secretary</td>
                                                    <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Aamil Saheb</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                </tbody>
                </table>
                </td>
                </tr>





                </tbody>
                </table>
                </td>
                </tr>



                </tbody>
                </table>
                <p style="page-break-after:always;"></p>
            </center>
            <script>
                function printDiv(divName) {

                    var printContents = document.getElementById(divName).innerHTML;
                    w = window.open();

                    w.document.write(printContents);
                    w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

                    w.document.close(); // necessary for IE >= 10
                    w.focus(); // necessary for IE >= 10

                    return true;

                }
            </script>
        </body>

        </html>
    </div>
</form>