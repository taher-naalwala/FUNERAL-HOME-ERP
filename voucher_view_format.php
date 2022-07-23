<?php

error_reporting(0);
function getIndianCurrency($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(
        0 => '', 1 => 'ONE', 2 => 'TWO',
        3 => 'THREE', 4 => 'FOUR', 5 => 'FIVE', 6 => 'SIX',
        7 => 'SEVEN', 8 => 'EIGHT', 9 => 'NINE',
        10 => 'TEN', 11 => 'ELEVEN', 12 => 'TWELVE',
        13 => 'THIRTEEN', 14 => 'FOURTEEN', 15 => 'FIFTEEN',
        16 => 'SIXTEEN', 17 => 'SEVENTEEN', 18 => 'EIGHTEEN',
        19 => 'NINETEEN', 20 => 'TWENTY', 30 => 'THIRTY',
        40 => 'FORTY', 50 => 'FIFTY', 60 => 'SIXTY',
        70 => 'SEVENTY', 80 => 'EIGHTY', 90 => 'NINETY'
    );
    $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? '' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
            $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'RUPEES ' : '') . $paise;
}

require('connectDB.php');
$s2 = "SELECT * from voucher_info WHERE id=$voucher_id";
$run2 = $conn->query($s2);
$row2 = $run2->fetch_assoc();
$trust_id = $row2['trust_id'];
$s3 = "SELECT name,address,reg_no from trust_info";
$run3 = $conn->query($s3);
$row3 = $run3->fetch_assoc();
$trust_name = $row3['name'];
$trust_address = $row3['address'];
$trust_reg = $row3['reg_no'];
$name = $row2['name'];
$bill = $row2['bill_no'];
$account = $row2['account_of'];
$pay_mode = $row2['pay_mode'];
$cn = $row2['cn'];
$voucher_status = $row2['status'];
$debit = $row2['amt'];
$voucher_date = $row2['date'];
$option = $row2['debit'];


?>

<input type="submit" class="btn btn-warning float-right" onclick="printDiv('printableArea1')" value="Print" />
<br>
<br>
<div id="printableArea1">



    <style>
        .btn-block {
            background-color: #4e73df;
        }

        .btn {
            color: #fff;
        }


        .box_receipt1 {
            margin-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
            padding-bottom: 10px;

            border: 1px solid #000000;
            word-wrap: break-word;

        }


        @media print {

            .print-area {
                display: block;
            }

            .box_receipt1 {
                margin-top: 10px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 10px;
                padding-bottom: 10px;

                border: 1px solid #000000;
                word-wrap: break-word;

            }

            .box_r2 {
                width: 150px;
                height: 50px;
                border: 1px solid #000000;
                word-wrap: break-word;
                float: right;
            }




            .example-screen {
                display: none;
            }

            .box_r1 {
                width: 150px;
                height: 50px;
                border: 1px solid #000000;
                word-wrap: break-word;

            }


        }
    </style>


    <div class="print-area">
        <div class="box_receipt1">
            <table width="100%">
                <style>
                    .upper_title {
                        line-height: 5px;
                    }
                </style>
                <tr>
                    <td align="left" style="font: 14px Arial, Helvetica, sans-serif;">
                       

                            <p> <u><b>DAWOODI BOHRA JAMAAT</b></u></p>

                            <p> Trust Reg. No. 894/2006,Indore</p>
                      
                       
                       
                        <p>Al-Masjid-us-Saifee,Saifee Nagar, Khatiwala Tank,</p>

                        <p>Indore - 452014 - Tel.: 0731-4095836-37</p>
                    </td>
                    <td align="right" style="font: 14px Arial, Helvetica, sans-serif;">

                        <style>
                            .box_r2 {
                                width: 150px;
                                height: 50px;
                                border: 1px solid #000000;
                                word-wrap: break-word;
                                float: right;
                            }
                        </style>
                        <p style="text-align:left;">
                            <span style="float:right;">
                                <div class="box_r2 text-center" style="text-align:center;font-size:large;padding-top:10px">
                                    <b>Voucher No. <?php echo $voucher_id ?></b>
                                    <br>
                                   
                                </div>
                            </span>
                        </p>
                    </td>
                </tr>
            </table>






            <p style="text-align:left;">
                <span style="float:right;">
                    Date &nbsp;&nbsp;<u><b><?php echo date('d F Y', strtotime($date)) ?></b></u>
                </span>
            </p>
            <p>Debit &nbsp;&nbsp;<u><b><?php echo  $option; ?></b></u></p>



            <p>Rs. in words &nbsp;&nbsp;<u><b><?php echo getIndianCurrency($debit) ?></b></u></p>
            <div style="float:left;">
                <p>Amount being paid to &nbsp;&nbsp;<u><b><?php echo $name ?></b></u></p>
            </div>
            <?php
            if ($voucher_status == 1) {
            ?>
                <div style="float:right;">

                    <img style="max-width:200px" src="images/deleted.png">

                </div>
            <?php
            }
            ?>
            <br>
            <br>
            <p style="align:left"> on Account of &nbsp;&nbsp;<u><b><?php echo $account ?></b></u></p>


            <p style="text-align:left;">
                Bill No. &nbsp;&nbsp;<u><b><?php echo $bill ?></b></u>
                <span>
                    on Dated &nbsp;&nbsp;<u><b><?php echo date('d F Y', strtotime($voucher_date)) ?></b></u>
                </span>
            </p>


            <style>
                .box_r1 {
                    width: 150px;
                    height: 50px;
                    border: 1px solid #000000;
                    word-wrap: break-word;

                }
            </style>


            <p style="text-align:left;">
                <?php
                if ($mode == "Cheque") {
                ?>
            <p>Cheque No. &nbsp;&nbsp;<u><b><?php echo $cn ?></b></u></p>
        <?php

                } else {
        ?>
            <p>By &nbsp;&nbsp;<u><b><?php echo "Cash" ?></b></u></p>
        <?php
                }
        ?>
        <span style="float: right;margin-bottom: 40px;">
            <div class="box_r1" style="text-align:center;font-size:large;padding-top:10px">
                &#x20B9;&nbsp;<b><?php echo $debit ?></b>
            </div>

        </span>


        <table width="100%" style="margin-top: 40px;">


            <tr>
                <td align="left" style="font: 16px Arial, Helvetica, sans-serif;">Passed By</td>
                <td align="center" style="font: 16px Arial, Helvetica, sans-serif;">Accountant</td>
                <td align="right" style="font: 16px Arial, Helvetica, sans-serif;">Receiver's Signature</td>
            </tr>
        </table>

        </div>
    </div>
</div>




<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w = window.open();

        w.document.write(printContents);
        w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
    }
</script>