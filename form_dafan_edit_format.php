<?php
error_reporting(0);
$s1 = "SELECT name,address,reg_no from trust_info";
$run1 = $conn->query($s1);
$row1 = $run1->fetch_assoc();
$trust_name = $row1['name'];
$trust_address = $row1['address'];
$trust_reg = $row1['reg_no'];
$s2 = "SELECT * from dafan_info where id=$dafan_id";
$run2 = $conn->query($s2);
$row5 = $run2->fetch_assoc();
$harwai_status = $row5['harwai_status'];
$qabar_no = $row5['qabar_no'];
$haqq_un_nafs_amt = $row5['haqq_un_nafs_amt'];
$harwai_id = $row5['harwai_id'];
$dafan_id = $row5['id'];

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
$relationship_status = $row5['relationship_status'];


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
$receipt_date = $row5['created_date'];
$receipt_status = $row5['status'];
$time_of_death = $row5['time_of_death'];
$dcn = $row5['dcn'];
$reason_other = $row5['m_rod_other'];
$haqq_un_nafs_unit = $row5['haqq_un_nafs_unit'];
$dcn = $row5['death_certificate_number'];
$imc_no = $row5['imc_no'];
$imc_date = $row5['imc_date'];
$partner_name = $row5['partner_name'];
$partner_aadhaar = $row5['partner_aadhaar'];



?>
<form method="POST">
    <button name="submit1" class="btn btn-warning float-right" value="<?php echo $dafan_id ?>">EDIT</button>
    <div id="printableArea<?php echo $dafan_id ?>">
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head id="Head1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>
                Dafan Receipt
            </title>
            <style>
                .ar {
                    font-family: "AL-FATEMI(Lisaan-ud-Dawat)", serif;
                    font-size: 36px;
                }

                .brk {
                    page-break-after: always;
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
                                            <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo $trust_reg  ?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b>Managed By : Anjuman-E-Saifee</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <input type="hidden" name="harwai_id" value="<?php echo $harwai_id ?>" required />
                        <input type="hidden" name="qabar_no_original" value="<?php echo $qabar_no ?>" required />
                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Form No:</b><?php echo $dafan_id  ?></td>
                                            <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>Date :</b> <input type="text" name="receipt_date" placeholder="Select Receipt Date" autocomplete="FALSE" value="<?php echo $receipt_date ?>" class="datepicker" readonly required>
                                            </td>
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
                                            <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Purpose of Issue:</b> DAFAN</td>
                                            <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>Qabar Number:</b>
                                                <div class="search-box">

                                                    <input name="input" type="text" autocomplete="off" value="<?php echo $qabar_no ?>" placeholder="Enter Qabar Number..." required />

                                                    <div class="result"></div>
                                                </div>
                                            </td>
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
                                            <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>IMC No: </b><input value="<?php echo $imc_no ?>" name="imc_no" /> </td>
                                            <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>IMC Date:</b><input autocomplete="FALSE" value="<?php echo $imc_date ?>" type="date" name="imc_date" class="datep11icker" /></td>

                            </td>
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
                                    <td colspan="10" align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b>MAYYAT INFORMATION</b></td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>

                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Sabeel Code: </b><input value="<?php echo $sabeel_no ?>" name="m_sabeel_no" /> </td>
                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b><input value="<?php echo $its ?>" name="m_its" /> </td>

                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b><input value="<?php echo $name ?>" name="m_name" /> </td>
                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Surname:</b> <input value="<?php echo $surname  ?>" name="surname" /></td>

                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Father's Name:</b> <input value="<?php echo $father_name ?>" name="father_name" /></td>
                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Motehr's Name:</b> <input value="<?php echo $mother_name  ?>" name="mother_name" /></td>


                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Age:</b> <input value="<?php echo $age ?>" type="number" name="age" /></td>
                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Place of Death:</b> <input value="<?php echo $place_of_death ?>" name="place_of_death" /></td>


                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mohalla:</b> <select name="m_mohalla">
                                            <option value="<?php echo $mohalla ?>" selected><?php echo $mohalla ?></option>
                                            <option value="" disabled>--Select Mohalla--</option>
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
                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Gender:</b> <select name="gender">
                                            <option value="<?php echo $gender ?>" selected><?php echo $gender ?></option>
                                            <option value="" disabled>--GENDER--</option>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>

                                        </select>
                                    </td>


                                </tr>

                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Aadhaar Number:</b><input value="<?php echo $aadhaar ?>" name="m_aadhaar_no" /> </td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>

                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Hijri Date of Death:</b><input type="number" name="hijri_date" value="<?php echo $hijri_date ?>" placeholder="Date" autocomplete="FALSE"> <select name="hijri_month">
                                            <option value="<?php echo $hijri_month ?>" selected><?php echo $hijri_month ?></option>
                                            <option value="" disabled>--Hijri Month--</option>
                                            <option value="Moharram al-Haraam">Moharram al-Haraam</option>
                                            <option value="Safar al-Muzaffar">Safar al-Muzaffar</option>
                                            <option value="Rabi al-Awwal">Rabi al-Awwal</option>
                                            <option value="Rabi al-Aakhar">Rabi al-Aakhar</option>
                                            <option value="Jumada al-Ula">Jumada al-Ula</option>
                                            <option value="Jumada al-Ukhra">Jumada al-Ukhra</option>
                                            <option value="Rajab al-Asab">Rajab al-Asab</option>
                                            <option value="Shabaan al-Karim">Shabaan al-Karim</option>
                                            <option value="Ramadaan al-Moazzam">Ramadaan al-Moazzam</option>
                                            <option value="Shawwal al-Mukarram">Shawwal al-Mukarram</option>
                                            <option value="Zilqadah al-Haraam">Zilqadah al-Haraam</option>
                                            <option value="Zilhaj al-Haraam">Zilhaj al-Haraam</option>
                                        </select><input type="number" name="hijri_year" placeholder="Year" autocomplete="FALSE" value="<?php echo $hijri_year ?>">
                                    </td>




                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>English Date of Death:</b><input autocomplete="FALSE" value="<?php echo $date_of_death ?>" name="date_of_death" type="date" class="datepicker11" /> </td>
                                </tr>

                                <tr></tr>
                                <tr></tr>
                                <tr></tr>

                                <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Relationship Status:</b><select name="relationship_status" onchange="change_relationship_status()" id="relationship_status">
                                            <option value="<?php echo $relationship_status ?>" selected><?php echo $relationship_status ?></option>
                                            <option value="" disabled>--SELECT RELATIONSHIP STATUS--</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>

                                            <option value="Not Available">Not Available</option>

                                        </select>
                                    </td>




                                </tr>

                                <tr></tr>
                                <tr></tr>
                                <tr></tr>

                                <tr id="partner">
                                    <script>
                                        function change_relationship_status() {
                                            var relationship_status = document.getElementById("relationship_status").value;
                                            if (relationship_status == "Married") {
                                                document.getElementById("partner").innerHTML = ' <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"> <b>Spouse Name:</b><input value="<?php echo $partner_name ?>" name="partner_name" required /></td> <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Spouse Aadhaar Number:</b><input value="<?php echo $partner_aadhaar ?>" name="partner_aadhaar" required /></td> ';

                                            } else {
                                                $("#partner").empty();

                                            }

                                        }
                                    </script>
                                   
                                    <?php
                                    if ($relationship_status == "Married") {
                                    ?>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"> <b>Spouse Name:</b><input value="<?php echo $partner_name ?>" name="partner_name" required/></td>




                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Spouse Aadhaar Number:</b><input value="<?php echo $partner_aadhaar ?>" name="partner_aadhaar" required /></td>
                                    <?php
                                    }
                                    ?>
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
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Death Certificate Number:</b> <input value="<?php echo $dcn ?>" name="dcn" /></td>
                                    <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Time of Death:</b> <input type="time" value="<?php echo $time_of_death; ?>" placeholder="Enter Time of Death" name="time_of_death" onfocus="this.removeAttribute('readonly');" /></td>


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

                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Address:</b><textarea name="m_address"><?php echo $address ?></textarea> </td>
                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Reason of Death:</b><select name="m_reason">
                                            <option value="<?php echo $reason ?>" selected><?php echo $reason ?></option>
                                            <option value="" disabled>--Select Reason of Death--</option>
                                            <option value="Natural">Natural</option>
                                            <option value="Critical Illness">Critical Illness</option>
                                            <option value="Organ Failure">Organ Failure</option>
                                            <option value="Diabetes">Diabetes</option>
                                            <option value="Cancer">Cancer</option>
                                            <option value="Heart Attack">Heart Attack</option>
                                            <option value="Accident">Accident</option>
                                            <option value="COVID-19">COVID-19</option>
                                            <option value="Suicide">Suicide</option>
                                            <option value="Stroke">Stroke</option>


                                        </select> </td>

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

                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Harwai:</b> Will Update Depending on Qabar Number</td>

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

                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Voluntary Contribution: Rs.</b><input type="number" value="<?php echo  $amt ?>" name="amt" /> </td>

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

                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Haqq Un Nafs Unit: </b><input type="number" value="<?php echo  $haqq_un_nafs_unit ?>" name="haqq_un_nafs_unit" /> </td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tbody>
                                <br>
                                <tr>
                                    <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Remarks (if any)______________________________________________________</b></td>


                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td align="center" colspan="2"></td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>

                                <tr></tr>
                                <tr>

                                    <?php
                                    if ($role_admin_id == 0) {
                                    ?>

                                        <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Status:</b><select name="receipt_status">
                                                <option value="<?php echo $receipt_status ?>" selected><?php if ($receipt_status == 0) {
                                                                                                            echo "ACTIVE";
                                                                                                        } else {
                                                                                                            echo "DELETED";
                                                                                                        } ?></option>
                                                <option value="" disabled>--Receipt Status--</option>
                                                <option value="0">ACTIVE</option>
                                                <option value="1">DELETED</option>

                                            </select></td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                                <tr></tr>

                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">

                                            <tbody>
                                                <tr>
                                                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>

                                                    <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Secretary</td>
                                                    <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Aamil Saheb</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
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
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b><input type="number" value="<?php echo $b_its ?>" name="b_its" /> </td>
                                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Relation:</b>
                                        <select name="b_relation">
                                            <option value="<?php echo $b_relation ?>" selected><?php echo $b_relation ?></option>
                                            <option value="" disabled>--Select Relation--</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Father">Father</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Son">Son</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Auntie">Auntie</option>
                                            <option value="Uncle">Uncle</option>
                                            <option value="Niece">Niece</option>
                                            <option value="Nephew">Nephew</option>
                                            <option value="Cousin">Cousin</option>
                                            <option value="Grandmother">Grandmother</option>
                                            <option value="Grandfather">Grandfather</option>
                                            <option value="Grandson">Grandson</option>
                                            <option value="Granddaughter">Granddaughter</option>
                                            <option value="Stepsister">Stepsister</option>
                                            <option value="Stepbrother">Stepbrother</option>
                                            <option value="Stepmother">Stepmother</option>
                                            <option value="Stepfather">Stepfather</option>
                                            <option value="Stepdaughter">Stepdaughter</option>
                                            <option value="Stepson">Stepson</option>
                                            <option value="Sister in law">Sister in law</option>
                                            <option value="Mother in law">Mother in law</option>
                                            <option value="Father in law">Father in law</option>
                                            <option value="Daughter in law">Daughter in law</option>
                                            <option value="Son in law">Son in law</option>
                                            <option value="Friend">Friend</option>
                                            <option value="Family Member">Family Member</option>
                                            <option value="Pet">Pet</option>


                                        </select>


                                    </td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>



                </tr>
                <tr>
                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b><input value="<?php echo $b_name ?>" name="b_name" /> </td>
                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mobile:</b><input type="number" value="<?php echo $b_mobile ?>" name="b_mobile" /> </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"> </td>
                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;">____________________</td>
                </tr>
                <tr>
                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"> </td>
                    <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;">Signature(Concern Person)</td>
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

                $('.search-box input[type="text"]').on("keyup input", function() {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if (inputVal.length) {
                        $.get("search_qabar_number.php?harwai_id=<?php echo $harwai_id ?>", {
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
            </script>
        </body>

        </html>
    </div>
</form>