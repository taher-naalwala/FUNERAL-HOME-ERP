<?php
error_reporting(0);
?>

<input type="submit" class="btn btn-warning float-right" onclick="printDiv('printableArea<?php echo $receipt_number ?>')" value="Print" />
<div id="printableArea<?php echo $receipt_number ?>">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head id="Head1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Harwai Receipt
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
                                        <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Harwai No:</b> <?php echo $harwai_id  ?></td>
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

                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Sabeel Code: </b> <?php echo $sabeel_no ?></td>
                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b> <?php echo $its ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b> <?php echo $name ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mobile:</b> <?php echo $mobile  ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Address:</b> <?php echo $address ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mohalla:</b> <?php echo $mohalla  ?></td>

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
                                                <b>
                                                    <?php if ($qabar_status == 0) {
                                                        echo "(VACANT)";
                                                    } else if ($qabar_status == 2) {
                                                        echo "(DELETED)";
                                                    } else {
                                                        $sql="SELECT m_name from dafan_info where qabar_no=$qabar_no and status=0";
                                                        $run=$conn->query($sql);
                                                        $row=$run->fetch_assoc();
                                                        $m_name=$row['m_name'];
                                                        echo "(OCCUPIED) ( ".$m_name." )";
                                                    }  ?>
                                                   
                                                </b>
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

                                <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Sabeel Code: </b> <?php echo $b_sabeel_no ?></td>
                                <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>ITS ID:</b> <?php echo $b_its ?></td>

                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Name:</b> <?php echo $b_name ?></td>
                                <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mobile:</b> <?php echo $b_mobile  ?></td>

                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Relation:</b> <?php echo $b_relation ?></td>

                                <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Mohalla:</b> <?php echo $b_mohalla  ?></td>

                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Address:</b> <?php echo $b_address ?></td>

                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <!--
            <tr>

                <td colspan="2">
                    <table width="100%">
                        <tbody>

                            <tr>

                                <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Voluntary Contribution:</b> <?php // echo "Rs. " . $amt  ?></td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
                                -->


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
                                                <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> <?php
                                        if ($harwai_status == 1) {
                                        ?>
                                           <img src="images/deleted.png" style="max-width: 100px;">
                                        <?php
                                        } else {
                                        ?>

                                        <?php
                                        }
                                        ?></td>

                                                <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> </td>
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
                                                <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                            </tr>
                                            <tr>
                                          
                                                <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Applicant</td>
                                                <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Nominee</td>
                                                <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Secretary</td>
                                                <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Umoor Maaliyah</td>
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