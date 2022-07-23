<input type="submit" class="btn btn-warning float-right" onclick="printDiv('printableArea<?php echo $receipt_number . 'receipt' ?>')" value="Print" />
<div id="printableArea<?php echo $receipt_number . "receipt" ?>">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head id="Head1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Receipt
        </title>
        <style>
            .ar1 {
                font-family: "AL-FATEMI(Lisaan-ud-Dawat)", serif;
                font-size: 18px;
            }

            .brk {
                page-break-after: always;
            }

            img {
                page-break-before: auto;
                /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
                page-break-after: auto;
                /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
                page-break-inside: avoid;
                /* or 'auto' */
            }

            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                    margin: 0px;
                }

                .ar1 {
                    font-family: "AL-FATEMI(Lisaan-ud-Dawat)", serif;
                    font-size: 18px;
                }

                img {
                    page-break-before: auto;
                    /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
                    page-break-after: auto;
                    /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
                    page-break-inside: avoid;
                    /* or 'auto' */
                }


            }
        </style>

    </head>

    <body class="page-body  page-fade boxed-layout">
        <center>


            <table border="1" width="525px" align="center">
                <tbody>
                    <tr>
                        <td colspan="2" width="100%">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 18px Arial, Helvetica, sans-serif;"><b><?php echo "DAWOODI BOHRA JAMAAT, INDORE " ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo "Trust Reg. No. 894/2006,Indore" ?></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b>Managed By : Anjuman-E-Saifee</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>

                            <table width="100%">
                                <tbody>

                                    <tr>
                                        <td align="left" style="font: 16px Arial, Helvetica, sans-serif;"><?php if ($entry_type == "new") {
                                                                                                                echo "NW/";
                                                                                                            } else {
                                                                                                                echo "OD/";
                                                                                                            }
                                                                                                            echo $receipt_number ?><b><span class="ar1"> رسيد نمبر</span></td>

                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><?php echo date('d F Y [D]', strtotime($receipt_date)) ?> <b><span class="ar1">تاريخ </span></td>

                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;">(<img src="images/receipt/1.png" width="100px" />)<?php if ($receipt_name == "") {
                                                                                                                                                                    echo " " . $name;
                                                                                                                                                                } else {
                                                                                                                                                                    echo " " . $receipt_name;
                                                                                                                                                                } ?> <b><span class="ar1"> نام </span></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" style="font: 16px Arial, Helvetica, sans-serif;"><b>ITS No. </b> <?php echo $its ?></td>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><b>Sabeel Code </b> <?php echo $sabeel_no ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" style="font: 16px Arial, Helvetica, sans-serif;"><b>By </b> <?php
                                                                                                                        if ($mode == 0) {

                                                                                                                            echo "CASH";
                                                                                                                        } else {
                                                                                                                            echo "CHEQUE NO. " . $cn;
                                                                                                                        }  ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>

                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><b><span class="ar1">بعد السلام الجميل</span></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><?php echo "Rs. " . $amt  ?><img src="images/receipt/4.png" width="120px" /></td>
                                    </tr>
                                    <tr>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><?php echo getIndianCurrency($amt) ?><b><span class="ar1"> انكه </span> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="center" style="font: 16px Arial, Helvetica, sans-serif;"><img src="images/receipt/5.png" width="20px" /><b><span class="ar1"> طريقسس وصول تهيا </span> Voluntary Contribution </td>
                                        <?php
                                        if ($receipt_status == 1) {
                                        ?>
                                            <td align="right"><img src="images/deleted.png" style="max-width: 100px;"> </td>
                                        <?php
                                        } else {
                                        ?>

                                        <?php
                                        }
                                        ?>

                                    </tr>
                                    <tr>


                                        <td align="center" valign="top" style="font: 16px Arial, Helvetica, sans-serif;"><img src="images/receipt/7.png" width="100px" />(<img src="images/receipt/6.png" width="140px" />)</td>

                                    </tr>

                                </tbody>
                            </table>
                            <br>

                        </td>
                    </tr>

                </tbody>
            </table>
            </td>
            </tr>



            </tbody>
            </table>

            <br>
            <br>

            <table border="1" width="525px" align="center">
                <tbody>
                    <tr>
                        <td colspan="2" width="100%">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 18px Arial, Helvetica, sans-serif;"><b><?php echo "DAWOODI BOHRA JAMAAT, INDORE " ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo "Trust Reg. No. 894/2006,Indore" ?></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b>Managed By : Anjuman-E-Saifee</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>

                            <table width="100%">
                                <tbody>

                                    <tr>
                                        <td align="left" style="font: 16px Arial, Helvetica, sans-serif;"><?php if ($entry_type == "new") {
                                                                                                                echo "NW/";
                                                                                                            } else {
                                                                                                                echo "OD/";
                                                                                                            }
                                                                                                            echo $receipt_number ?><b><span class="ar1"> رسيد نمبر</span></td>

                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><?php echo date('d F Y [D]', strtotime($receipt_date)) ?> <b><span class="ar1">تاريخ </span></td>

                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;">(<img src="images/receipt/1.png" width="100px" />)<?php if ($receipt_name == "") {
                                                                                                                                                                    echo " " . $name;
                                                                                                                                                                } else {
                                                                                                                                                                    echo " " . $receipt_name;
                                                                                                                                                                } ?> <b><span class="ar1"> نام </span></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" style="font: 16px Arial, Helvetica, sans-serif;"><b>ITS No. </b> <?php echo $its ?></td>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><b>Sabeel Code </b> <?php echo $sabeel_no ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" style="font: 16px Arial, Helvetica, sans-serif;"><b>By </b> <?php
                                                                                                                        if ($mode == 0) {

                                                                                                                            echo "CASH";
                                                                                                                        } else {
                                                                                                                            echo "CHEQUE NO. " . $cn;
                                                                                                                        }  ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>

                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><b><span class="ar1">بعد السلام الجميل</span></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><?php echo "Rs. " . $amt  ?><img src="images/receipt/4.png" width="120px" /></td>
                                    </tr>
                                    <tr>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><?php echo getIndianCurrency($amt) ?><b><span class="ar1"> انكه </span> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="center" style="font: 16px Arial, Helvetica, sans-serif;"><img src="images/receipt/5.png" width="20px" /><b><span class="ar1"> طريقسس وصول تهيا </span> Voluntary Contribution </td>
                                        <?php
                                        if ($receipt_status == 1) {
                                        ?>
                                            <td align="right"><img src="images/deleted.png" style="max-width: 100px;"> </td>
                                        <?php
                                        } else {
                                        ?>

                                        <?php
                                        }
                                        ?>

                                    </tr>
                                    <tr>


                                        <td align="center" valign="top" style="font: 16px Arial, Helvetica, sans-serif;"><img src="images/receipt/7.png" width="100px" />(<img src="images/receipt/6.png" width="140px" />)</td>

                                    </tr>

                                </tbody>
                            </table>
                            <br>

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