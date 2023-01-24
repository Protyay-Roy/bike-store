<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Customers

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <div class="add-customer"  style="margin-bottom: 20px;">
                <a href="index.php?add_customers" class="btn btn-success"> Add Customers </a>
            </div>
            <div class="panel panel-default">
                <!-- panel panel-default begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <h3 class="panel-title">
                        <!-- panel-title begin -->

                        <i class="fa fa-fw fa-users"></i> View Customers

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover">
                            <!-- table table-striped table-bordered table-hover begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr>
                                    <!-- tr begin -->
                                    <th> #ID: </th>
                                    <th> Name: </th>
                                    <th> Email: </th>
                                    <th> Address: </th>
                                    <th> Phone No: </th>
                                    <th> Image: </th>
                                    <th> Action: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->
                                <?php

                                $s = "select * from customer";
                                if ($q = $con->query($s)) {

                                    $i = 0;
                                    while ($r = $q->fetch_assoc()) {
                                        $i++;
                                ?>

                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['c_name']; ?></td>
                                            <td><?= $r['c_email']; ?></td>
                                            <td><?= $r['c_add']; ?></td>
                                            <td><?= $r['c_ph']; ?></td>
                                            <td>
                                                <img src="../customer/images/<?= $r['c_img']; ?>" alt="<?= $r['c_img']; ?>" style="height: 50px;">
                                            </td>
                                            <td style="font-size: 18px;">
                                                <a href="index.php?edit_customer=<?= $r['c_id']; ?>" style="margin-left: 5px;" class="text-primary"><i class="fa fa-pencil"></i></a>
                                                <a href="index.php?delete_customer=<?= $r['c_id']; ?>" style="margin-left: 10px;" class="text-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>

                                <?php }
                                } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->
                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>