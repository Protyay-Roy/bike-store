    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> <a href="index.php?dashboard">Dashboard</a> / View Pescription

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

                        <i class="fa fa-file" aria-hidden="true"></i> View Users Pescription

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
                                    <th> Pescription No: </th>
                                    <th> Users Name: </th>
                                    <th> Pescription File: </th>
                                    <th> Action: </th>
                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <!-- <tbody>

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
                                                            <a href='index.php?edit_user=" . $r["aid"] . "' style='margin-left: 5px;' class='text-primary'><i class='fa fa-pencil'></i></a>
                                                            
                                                            <a href='index.php?delete_user=" . $r["aid"] . "' style='margin-left: 10px;' class='text-danger' onclick='return confirm('Are you sure you want to delete?')'><i class='fa fa-trash'></i></a>
                                                        </td>";
                                            }
                                            ?>

                                        </tr>
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
                                                        <a href='index.php?edit_user=" . $r["aid"] . "' style='margin-left: 5px;' class='text-primary'><i class='fa fa-pencil'></i></a>
                                                        <a href='index.php?delete_user=" . $r["aid"] . "' style='margin-left: 10px;' class='text-danger' onclick='return confirm('Are you sure you want to delete?')'><i class='fa fa-trash'></i></a>
                                                        </td>";
                                            }
                                            ?>

                                        </tr>
                                <?php }
                                } ?>

                            </tbody> -->
                            <tbody>
                                <?php

                                $query = $con->query("SELECT * FROM pescription");
                                if ($query) {

                                    $i = 0;

                                    while ($row = mysqli_fetch_array($query)) {
                                        $i++;
                                        $user_query = $con->query("SELECT * FROM customer WHERE c_id = '{$row['customer_id']}'");
                                        $user_row = mysqli_fetch_array($user_query);

                                ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $user_row['c_name']; ?></td>
                                            <td><a class="btn btn-success" href="../customer/pescription_images/<?= $row['name']; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> </td>
                                            <td><a class="btn btn-danger" href="delete_pescription.php?delete_pescription=<?= $row['pescription_id']; ?>" onclick="return confirm('Are you sure you want to delete?')"> <i class='fa fa-trash'></i> </a></td>

                                            <!-- <a href='index.php?delete_user=" . $r["aid"] . "' style='margin-left: 10px;' class='text-danger' onclick='return confirm('Are you sure you want to delete?')'><i class='fa fa-trash'></i></a> -->
                                        </tr>
                                <?php  }
                                } ?>
                            </tbody>
                            <!-- tbody finish -->

                        </table><!-- table table-hover table-striped table-bordered finish -->

                    </div><!-- table-responsive finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->