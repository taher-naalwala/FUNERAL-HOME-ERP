<?php
$url = $_SERVER['REQUEST_URI'];

?>
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>



<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a href="main.php">
                        <h5>Qabrastan</h5>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu icon-toggle-right"></i>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-prepend search-close">
                                        <i class="feather icon-x input-group-text"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn">
                                        <i class="feather icon-search input-group-text"></i>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" class="waves-effect waves-light" data-cf-modified-d2d1d6e2f87cbebdf4013b26-="">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">


                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">

                                    <span><?php echo $_SESSION['Full_Name_qabrastan'] ?></span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                    <li>
                                        <a href="logout.php">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <?php
        $forms_access = $_SESSION['forms_access_qabrastan'];
        ?>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigation-label">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="<?php
                                            if (strpos($url, "main.php") !== false) {
                                                echo "active";
                                            }
                                            ?>">
                                    <a href="main.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-home"></i>
                                        </span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>


                                <div class="pcoded-navigation-label">Powers</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <?php
                                    if (in_array("1", $forms_access) || in_array("2", $forms_access) || in_array("29", $forms_access) || in_array("30", $forms_access)) {
                                    ?>
                                        <li class="pcoded-hasmenu <?php
                                                                    if (strpos($url, "add.php?name=Qabar") !== false ||  strpos($url, "edit.php?name=Qabar") !== false || strpos($url, "delete.php?name=Qabar") !== false) {
                                                                        echo "active pcoded-trigger";
                                                                    }

                                                                    ?> ">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-box"></i>
                                                </span>
                                                <span class="pcoded-mtext">Qabar</span>
                                            </a>

                                            <ul class="pcoded-submenu">
                                                <?php
                                                if (in_array("1", $forms_access) || in_array("2", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "add.php?name=Qabar") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="add.php?name=Qabar" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Add</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("1", $forms_access) || in_array("29", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "edit.php?name=Qabar") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="edit.php?name=Qabar" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Edit</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("1", $forms_access) || in_array("30", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "delete.php?name=Qabar") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="delete.php?name=Qabar" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Delete</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                            </ul>


                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (in_array("3", $forms_access) || in_array("11", $forms_access) || in_array("25", $forms_access) || in_array("26", $forms_access) || in_array("33", $forms_access)) {
                                    ?>
                                        <li class="pcoded-hasmenu <?php
                                                                    if (strpos($url, "harwai_edit.php") !== false || strpos($url, "harwai_view.php") !== false || strpos($url, "add.php?name=Harwai") !== false || strpos($url, "harwai_delete.php") !== false) {
                                                                        echo "active pcoded-trigger";
                                                                    }

                                                                    ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-box"></i>
                                                </span>
                                                <span class="pcoded-mtext">Harwai</span>
                                            </a>

                                            <ul class="pcoded-submenu">
                                                <?php
                                                if (in_array("3", $forms_access) || in_array("11", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "add.php?name=Harwai") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="add.php?name=Harwai" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Add</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("3", $forms_access) || in_array("25", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "harwai_edit.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="harwai_edit.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Edit</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("3", $forms_access) || in_array("33", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "harwai_delete.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="harwai_delete.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Delete</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("3", $forms_access) || in_array("26", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "harwai_view.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="harwai_view.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">View</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                            </ul>


                                        </li>
                                    <?php
                                    }
                                    ?>


                                    <?php
                                    if (in_array("4", $forms_access) || in_array("13", $forms_access) || in_array("21", $forms_access) || in_array("22", $forms_access)  || in_array("32", $forms_access)) {
                                    ?>
                                        <li class="pcoded-hasmenu <?php
                                                                    if (strpos($url, "dafan_add.php") !== false || strpos($url, "dafan_form.php") !== false || strpos($url, "dafan_edit.php") !== false || strpos($url, "dafan_delete.php") !== false) {
                                                                        echo "active pcoded-trigger";
                                                                    }

                                                                    ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-box"></i>
                                                </span>
                                                <span class="pcoded-mtext">Dafan</span>
                                            </a>

                                            <ul class="pcoded-submenu">
                                                <?php
                                                if (in_array("4", $forms_access) || in_array("13", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "dafan_add.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="dafan_add.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Add</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                                <?php
                                                if (in_array("4", $forms_access) || in_array("22", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "dafan_edit.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="dafan_edit.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Edit</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("4", $forms_access) || in_array("32", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "dafan_delete.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="dafan_delete.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Delete</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("4", $forms_access) || in_array("21", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "dafan_form.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="dafan_form.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">View</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                            </ul>


                                        </li>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (in_array("23", $forms_access) || in_array("24", $forms_access) || in_array("27", $forms_access) || in_array("28", $forms_access) || in_array("31", $forms_access)) {
                                    ?>
                                        <li class="pcoded-hasmenu <?php
                                                                    if (strpos($url, "receipt_add.php") !== false || strpos($url, "receipt_edit.php") !== false || strpos($url, "receipt_view.php") !== false || strpos($url, "delete.php?name=RECEIPT") !== false) {
                                                                        echo "active pcoded-trigger";
                                                                    }

                                                                    ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-box"></i>
                                                </span>
                                                <span class="pcoded-mtext">Receipt</span>
                                            </a>

                                            <ul class="pcoded-submenu">
                                                <?php
                                                if (in_array("23", $forms_access) || in_array("24", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "receipt_add.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="receipt_add.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Add</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (in_array("23", $forms_access) || in_array("27", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "receipt_edit.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="receipt_edit.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Edit</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (in_array("23", $forms_access) || in_array("31", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "delete.php?name=RECEIPT") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="delete.php?name=RECEIPT" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Delete</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("23", $forms_access) || in_array("28", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "receipt_view.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="receipt_view.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">View</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                            </ul>


                                        </li>
                                    <?php
                                    }
                                    ?>


                                    <?php
                                    if (in_array("15", $forms_access) || in_array("14", $forms_access) || in_array("16", $forms_access) || in_array("17", $forms_access) || in_array("18", $forms_access)) {
                                    ?>
                                        <li class="pcoded-hasmenu <?php
                                                                    if (strpos($url, "voucher_add.php") !== false || strpos($url, "edit.php?name=Voucher") !== false || strpos($url, "delete.php?name=Voucher") !== false || strpos($url, "voucher_view.php") !== false) {
                                                                        echo "active pcoded-trigger";
                                                                    }

                                                                    ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-box"></i>
                                                </span>
                                                <span class="pcoded-mtext">Voucher</span>
                                            </a>

                                            <ul class="pcoded-submenu">
                                                <?php
                                                if (in_array("15", $forms_access) || in_array("14", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "voucher_add.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="voucher_add.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Add</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (in_array("16", $forms_access) || in_array("14", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "edit.php?name=Voucher") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="edit.php?name=Voucher" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Edit</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("17", $forms_access) || in_array("14", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "delete.php?name=Voucher") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="delete.php?name=Voucher" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Delete</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("18", $forms_access) || in_array("14", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "voucher_view.php") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="voucher_view.php" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">View</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                            </ul>


                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (in_array("5", $forms_access) || in_array("12", $forms_access) || in_array("19", $forms_access) || in_array("20", $forms_access)) {
                                    ?>
                                        <li class="pcoded-hasmenu <?php
                                                                    if (strpos($url, "add.php?name=Access") !== false || strpos($url, "edit.php?name=Access") !== false || strpos($url, "delete.php?name=Access") !== false) {
                                                                        echo "active pcoded-trigger";
                                                                    }

                                                                    ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-box"></i>
                                                </span>
                                                <span class="pcoded-mtext">Access</span>
                                            </a>

                                            <ul class="pcoded-submenu">
                                                <?php
                                                if (in_array("5", $forms_access) || in_array("12", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "add.php?name=Access") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="add.php?name=Access" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Add</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("19", $forms_access) || in_array("5", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "edit.php?name=Access") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="edit.php?name=Access" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Edit</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (in_array("20", $forms_access) || in_array("5", $forms_access)) {
                                                ?>
                                                    <li class="<?php
                                                                if (strpos($url, "delete.php?name=Access") !== false) {
                                                                    echo "active";
                                                                }
                                                                ?>">
                                                        <a href="delete.php?name=Access" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Delete</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                            </ul>


                                        </li>
                                    <?php
                                    }
                                    ?>


                                </ul>
                                <?php
                                if (in_array("10", $forms_access)) {
                                ?>

                                    <div class="pcoded-navigation-label">Analytics</div>
                                    <ul class="pcoded-item pcoded-left-item">



                                        <li class="">
                                            <a href="report.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-inbox"></i>
                                                </span>
                                                <span class="pcoded-mtext">Reports</span>
                                            </a>
                                        </li>


                                    </ul>
                                <?php
                                }
                                ?>
                                <?php
                                if (in_array("9", $forms_access) || in_array("34", $forms_access)) {
                                ?>

                                    <div class="pcoded-navigation-label">Maintenance</div>
                                    <ul class="pcoded-item pcoded-left-item">

                                        <?php
                                        if (in_array("9", $forms_access)) {
                                        ?>

                                            <li class="<?php
                                                        if (strpos($url, "maintenance.php") !== false) {
                                                            echo "active";
                                                        }
                                                        ?>">
                                                <a href="maintenance.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon">
                                                        <i class="feather icon-box"></i>
                                                    </span>
                                                    <span class="pcoded-mtext">Maintenance</span>
                                                </a>
                                            </li>

                                        <?php
                                        }
                                        if (in_array("34", $forms_access)) {
                                        ?>
                                            <li class="<?php
                                                        if (strpos($url, "backup.php") !== false) {
                                                            echo "active";
                                                        }
                                                        ?>">
                                                <a href="backup.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon">
                                                        <i class="feather icon-box"></i>
                                                    </span>
                                                    <span class="pcoded-mtext">Backup Data</span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>


                                    </ul>
                                <?php
                                }
                                ?>


                        </div>
                    </div>
                </nav>