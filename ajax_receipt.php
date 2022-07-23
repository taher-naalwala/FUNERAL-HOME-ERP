<?php
require('connectDB.php');
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "0") { ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">

                <select name="category" class="form-control" onChange="change_category()" id="category" required>
                    <option value="" disabled>--CATEGORY--</option>
                    <option value="0" selected>Form Number</option>
                    <option value="1">Qabar Number</option>
                    <option value="2">Marhoom</option>

                </select>
            </div>
        </div>

    <?php }
    if ($type == "1") { ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Harwai</label>
            <div class="col-sm-10">

                <div class="form-group">

                    <select class="form-control" name="br" id="br" onchange="change_br()" required>
                        <option value="" disabled>--Select--</option>
                        <option value="0">Harwai Number</option>
                        <option value="1">NAME / ITS</option>

                    </select>
                </div>
            </div>
        </div>



    <?php }
    if ($type == "2") { ?>
        <div class="form-group row"><label class="col-sm-2 col-form-label">Budget</label>
            <div class="col-sm-10">
                <div class="form-group">

                    <select class="form-control" name="budget" id="budget" required>
                        <option value="" disabled>--Budget--</option>
                        <?php
                        $sql = "SELECT DISTINCT amt from qabar_info WHERE status=0 AND harwai_status=0";
                        $run = $conn->query($sql);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_assoc()) {

                                $amt = $row['amt'];
                        ?>
                                <option value='<?php echo $amt ?>'><?php echo $amt ?></option>
                        <?php }
                        }

                        ?>

                    </select>
                </div>
            </div>
        </div>

    <?php }
    if ($type == "3") { ?>
        <div class="form-group row"><label class="col-sm-2 col-form-label">Budget</label>
            <div class="col-sm-10">
                <div class="form-group">

                    <div class="search-box">

                        <input class="form-control" name="input" type="text" autocomplete="off" placeholder="Enter Marhoom ITS/NAME..." required />

                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
    if ($type == "4") { ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Form Number</label>
            <div class="col-sm-10">

                <div class="form-group">

                    <input name="receipt_no" class="form-control" placeholder="Enter Form Number" required>
                </div>
            </div>
        </div>

    <?php }
}
if (isset($_GET['br'])) {
    $br = $_GET['br'];
    if ($br == 0) {
    ?>
        <div class="form-group row">

            <label class="col-sm-2 col-form-label">Harwai Number</label>
            <div class="col-sm-10">
                <div class="form-group"> <input name="harwai_no" class="form-control" placeholder="Enter Harwai Number" required></div>
            </div>
        </div> <?php
            } else {
                ?>
        <div class="form-group row">

            <label class="col-sm-2 col-form-label">ITS / NAME</label>
            <div class="col-sm-10">
                <div class="search-box">

                    <input class="form-control" name="input" type="text" autocomplete="off" placeholder="Enter ITS/NAME..." required />

                    <div class="result"></div>
                </div>
            </div>
        <?php
            }
        }
        if (isset($_GET['category'])) {
            $br = $_GET['category'];
            if ($br == 0) {
        ?>
            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Form Number</label>
                <div class="col-sm-10">
                    <div class="form-group"> <input name="form_no" class="form-control" placeholder="Enter Form Number" required></div>
                </div>
            </div> <?php
                } else if ($br == 1) {
                    ?>
            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Qabar Number</label>
                <div class="col-sm-10">
                    <div class="form-group"> <input name="qabar_no" class="form-control" placeholder="Enter Qabar Number" required></div>
                </div>
            </div>
        <?php
                } else {
        ?>
            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Marhoom</label>
                <div class="col-sm-10">
                    <div class="search-box">

                        <input class="form-control" name="input" type="text" autocomplete="off" placeholder="Enter ITS/NAME..." required />

                        <div class="result"></div>
                    </div>
                </div>
        <?php
                }
            }
        ?>