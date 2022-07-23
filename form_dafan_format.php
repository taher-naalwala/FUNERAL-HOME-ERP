<?php
error_reporting(0);
?>
<input type="submit" class="btn btn-warning float-right" onclick="printDiv('printableArea<?php echo $receipt_number ?>')" value="Print" />
<div id="printableArea<?php echo $receipt_number ?>">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head id="Head1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Dafan Form
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
                                        <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Form No:</b> <?php echo $dafan_id ?></td>
                                        <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>Date :</b> <?php echo date('d F Y [D]', strtotime($date)) ?></td>
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
                                        <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>Qabar Number:</b><?php echo $qabar_no ?></td>
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


                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>IMC Number:</b> <?php echo $imc_no ?></td>
                                        <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>IMC Date:</b> <?php echo $imc_date ?></td>

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

                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Sabeel Code: </b> <?php echo $sabeel_no ?></td>
                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b> <?php echo $its ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b> <?php echo $name ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Surname:</b> <?php echo $surname  ?></td>


                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Father's Name:</b> <?php echo $father_name ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mother's Name:</b> <?php echo $mother_name  ?></td>


                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Age:</b> <?php echo $age ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Place of Death:</b> <?php echo $place_of_death ?></td>


                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Address:</b> <?php echo $address ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Gender:</b> <?php echo $gender ?></td>


                                    </tr>

                                    <tr>
                                    <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Aadhaar Number:</b> <?php echo $aadhaar ?></td>
                                    
                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Reason of Death:</b> <?php if ($reason == "OTHER") {
                                                                                                                                                    echo $reason . " (" . $reason_other . ")";
                                                                                                                                                } else {
                                                                                                                                                    echo $reason;
                                                                                                                                                } ?></td>
                                    </tr>


                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Hijri Date of Death:</b> <?php echo $hijri_date . " " . $hijri_month . " " . $hijri_year ?></td>

                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>English Date of Death:</b> <?php echo $date_of_death ?></td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mohalla:</b> <?php echo $mohalla ?></td>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Time of Death:</b> <?php echo $time_of_death ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Death Certificate Number:</b> <?php if (empty($dcn)) {
                                                                                                                                                            echo "CURRENTLY NOT AVAILABLE";
                                                                                                                                                        } else {
                                                                                                                                                            echo $dcn;
                                                                                                                                                        } ?></td>

                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Relationship Status:</b> <?php echo $relationship_status ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <?php
                                    if ($relationship_status == "Married") {



                                    ?>
                                        <tr>

                                            <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Spouse Name:</b> <?php echo $partner_name ?></td>

                                            <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Spouse Aadhaar Number:</b> <?php echo $partner_aadhaar ?></td>

                                        </tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                    <?php
                                    }
                                    ?>
                                  
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <table width="100%">
                                <tbody>

                                    <tr>

                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Harwai:</b> <?php if ($harwai_status == 1) {
                                                                                                                                            echo "YES";
                                                                                                                                        } else {
                                                                                                                                            echo "NO";
                                                                                                                                        } ?></td>

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

                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Voluntary Contribution:</b> <?php echo "Rs. " . $amt  ?></td>

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

                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Haqq Un Nafs Unit:</b> <?php echo $haqq_un_nafs_unit . " ( Rs. 119 X " . $haqq_un_nafs_unit . ")";  ?></td>

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
                                        <!-- <td align="center" colspan="2"><span class="ar">حق النفس</span></td> -->


                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>

                                    <tr></tr>

                                    <tr>
                                        <!--
                                        <td align="center" colspan="2">

                                            <table width="20%" border="0" cellspacing="0" height="15px">
                                                <tbody>
                                                    <tr>

                                                        <td align="center" style="font: 18px Arial, Helvetica, sans-serif;">119 X <b><u> </u></b></td>

                                                    </tr>

                                                </tbody>

                                            </table>
                                        </td>
                                                                                                                                    -->
                                        <?php
                                        if ($dafan_status == 1) {
                                        ?>
                                            <td align="right"><img src="images/deleted.png" style="max-width: 100px;"> </td>
                                        <?php
                                        } else {
                                        ?>

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
                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> </td>
                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> </td>

                                                        <td align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b> ARAZ FOR RAZA</b></td>
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
                                                    </tr>
                                                    <tr>

                                                        <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Secretary</td>
                                                        <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Umoor Maaliyah</td>
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
                                        <td colspan="10" align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b>BOOKING MEMBER INFORMATION</b></td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>


                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b> <?php echo $b_its  ?></td>
                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Relation:</b> <?php echo $b_relation  ?></td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>



                    </tr>
                    <tr>
                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b> <?php echo $b_name  ?></td>
                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mobile:</b><?php echo $b_mobile  ?></td>
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
        </script>
    </body>

    </html>
</div>