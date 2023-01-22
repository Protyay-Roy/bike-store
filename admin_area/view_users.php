<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    $aCatQ = $con->query("SELECT * FROM admin WHERE a_email = '{$_SESSION['admin_email']}'");
    $aCatR = mysqli_fetch_assoc($aCatQ);
    $aCat = $aCatR["a_cat"];

    $aCatStatusQ = $con->query("SELECT * FROM admin_cat WHERE a_cat_id = '$aCat'");
    $aCatStatusR = mysqli_fetch_assoc($aCatStatusQ);
    $aCatStatus = $aCatStatusR["a_cat_status"];

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Users

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <div class="panel panel-default">
                <!-- panel panel-default begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <h3 class="panel-title">
                        <!-- panel-title begin -->

                        <i class="fa fa-fw fa-users"></i> View Users

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->


                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-hover table-striped table-bordered">
                            <!-- table table-hover table-striped table-bordered begin -->

                            <thead>
                                <!-- thead begin -->

                                <tr>
                                    <!-- th begin -->
                                    <th> Users no: </th>
                                    <th> Users Name: </th>
                                    <th> Users Email: </th>
                                    <th> Users Address: </th>
                                    <th> Users Contuct No: </th>
                                    <th> About User: </th>
                                    <th> Users Image: </th>
                                    <th>Login / Log out: </th>
                                    
                                    <?php
                                    if ($aCat == 1) {
                                        echo "<th> Admin Categories: </th>
                                              <th>Manage Admin: </th>";
                                    }
                                    ?>

                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php
                                $sts = 1;
                                $s = "SELECT * FROM `admin` WHERE a_status = '$sts' ";
                                if ($q = $con->query($s)) {

                                    $i = 0;
                                    while ($r = $q->fetch_assoc()) {

                                        $adminCatQ = $con->query("SELECT * FROM admin_cat WHERE a_cat_id = '{$r['a_cat']}'");
                                        $adminCatR = mysqli_fetch_assoc($adminCatQ);
                                        $adminCat = $adminCatR["a_cat_status"];

                                        $i++;
                                ?>
                                        <tr>
                                            <!-- online tr begin -->
                                            <?php
                                            if (isset($r["a_status"])) {
                                                echo '
                                            <td> 
                                                <button class="btn btn-success">' . $i . '</button>
                                            </td>';
                                            }

                                            ?>
                                            <td><?= $r["a_name"]; ?></td>
                                            <td><?= $r["a_email"]; ?></td>
                                            <td><?= $r["a_address"]; ?></td>
                                            <td><?= $r["a_con"]; ?></td>
                                            <td><?= $r["a_about"]; ?></td>
                                            <td>
                                                <img style="height: 50px;" src="admin_images/<?= $r["a_img"] ?>" alt="<?= $r["a_img"] ?>">
                                            </td>
                                            <td><?= $r["a_session"]; ?></td>
                                            <?php
                                            if ($aCat == 1) {
                                                echo "<td>$adminCat</td>
                                                        <td style='font-size: 18px;'>
                                                            <a href='index.php?edit_user=".$r["aid"]."' style='margin-left: 5px;' class='text-primary'><i class='fa fa-pencil'></i></a>
                                                            
                                                            <a href='index.php?delete_user=".$r["aid"]."' style='margin-left: 10px;' class='text-danger' onclick='return confirm('Are you sure you want to delete?')'><i class='fa fa-trash'></i></a>
                                                        </td>";
                                                        
                                            }
                                            ?>

                                        </tr><!-- online tr finish -->
                                    <?php
                                    }
                                }

                                $sts = 0;
                                $s = "SELECT * FROM `admin` WHERE a_status = '$sts' ";
                                if ($q = $con->query($s)) {

                                    while ($r = $q->fetch_assoc()) {

                                        $adminCatQ = $con->query("SELECT * FROM admin_cat WHERE a_cat_id = '{$r['a_cat']}'");
                                        $adminCatR = mysqli_fetch_assoc($adminCatQ);
                                        $adminCat = $adminCatR["a_cat_status"];

                                        $i++;
                                    ?>
                                        <tr>
                                            <!-- offline tr begin -->
                                            <?php
                                            if (isset($r["a_status"])) {
                                                echo '
                                            <td> 
                                                <button class="btn btn-default">' . $i . '</button>
                                            </td>';
                                            }
                                            ?>
                                            
                                            <td><?= $r["a_name"]; ?></td>
                                            <td><?= $r["a_email"]; ?></td>
                                            <td><?= $r["a_address"]; ?></td>
                                            <td><?= $r["a_con"]; ?></td>
                                            <td><?= $r["a_about"]; ?></td>
                                            <td>
                                                <img style="height: 50px;" src="admin_images/<?= $r["a_img"] ?>" alt="<?= $r["a_img"] ?>">
                                            </td>
                                            <td><?= $r["a_session"]; ?></td>
                                            <?php
                                            if ($aCat == 1) {
                                                echo "<td>$adminCat</td>
                                                        <td style='font-size: 18px;'>
                                                        <a href='index.php?edit_user=".$r["aid"]."' style='margin-left: 5px;' class='text-primary'><i class='fa fa-pencil'></i></a>
                                                        <a href='index.php?delete_user=".$r["aid"]."' style='margin-left: 10px;' class='text-danger' onclick='return confirm('Are you sure you want to delete?')'><i class='fa fa-trash'></i></a>
                                                        </td>";
                                            }
                                            ?>

                                        </tr><!-- offline tr finish -->
                                <?php }
                                } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-hover table-striped table-bordered finish -->

                    </div><!-- table-responsive finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>