<div class="card-block table-border-style">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Amount</th>
                    <th>Received</th>
                    <th>Balance</th>
                    <th>Full Payment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $name ?></th>
                    <td><?php echo $amt ?></td>
                    <td> <input data-toggle="modal" data-target="#exampleModal<?php echo $total_amt_paid ?>" class="btn btn-outline-info" value="<?php echo $total_amt_paid ?>" readonly /> </td>
                    <td><?php echo $amt - $total_amt_paid ?></td>
                    <td><?php
                        if ($payment_status == 0) {
                            echo "NO";
                        } else {
                            echo "YES";
                        }
                        ?></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="exampleModal<?php echo $total_amt_paid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo "LEDGER"  ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php


                ?>
                <div class="table-responsive">
                    <table border=1 class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>RECEIPT NO</th>
                                <th>DEBIT</th>
                                <th>CREDIT</th>
                                <th>BALANCE</th>
                                <th>View</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td><?php echo $amt ?></td>
                                <td>-</td>
                                <td><?php echo $amt ?></td>
                                <td>-</td>
                            </tr>
                            <?php
                            $total_amt = $amt;


                            while ($row01 = $run01->fetch_assoc()) {

                            ?>
                                <tr>
                                    <td><?php echo $row01['date'] ?></td>
                                    <td><?php echo $row01['id'] ?></td>
                                    <td>-</td>

                                    <td><?php echo $row01['amt'] ?></td>
                                    <?php
                                    if ($row01['status'] == "0") {
                                    ?>
                                        <td><?php echo $total_amt - $row01['amt'] ?></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><?php echo "DELETED"; ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td><a target="_blank" href="receipt_add_view.php?id=<?php echo $row01['id'] ?>&entry_type=<?php echo $entry_type ?>">View</a></td>

                                </tr>

                            <?php
                             if ($row01['status'] == "0") {
                                $total_amt = $total_amt - $row01['amt'];
                             }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" style="color:#FFF" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>