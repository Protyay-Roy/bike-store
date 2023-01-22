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

                    <i class="fa fa-dashboard"></i> Dashboard / View Orders

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

                        <i class="fa fa-fw fa-book"></i> View Orders

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

                                    <th> Order no: </th>
                                    <th> Customer Email: </th>
                                    <th> Invoice No: </th>
                                    <th> Amount: </th>
                                    <th> Product Qty: </th>
                                    <th> Ordered Date / Complete Date: </th>
                                    <th> Payment Mode: </th>
                                    <th> Ref No: </th>
                                    <th> Code: </th>
                                    <th> Delivery Address: </th>
                                    <th> Status: </th>

                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php

                                $sqlPending = "SELECT * FROM `pending_orders`";
                                if ($queryPending = $con->query($sqlPending)) {

                                    $i = 0;
                                    while ($rowPending = mysqli_fetch_assoc($queryPending)) {

                                        $i++;
                                        $ref_no = $rowPending["ref_no"];
                                        $code = $rowPending["code"];
                                        $paymentMode = $rowPending["payment_mode"];
                                        $amount = $rowPending["amount"];
                                        $date = $rowPending["date"];
                                        $delivery_add = $rowPending["delivery_add"];

                                        $orderId = $rowPending["order_id"];
                                        $orderSql = "SELECT * FROM customer_orders WHERE order_id = '$orderId'";
                                        $orderQuery = $con->query($orderSql) or die('OrderQuery Failed');
                                        $orderRow = $orderQuery->fetch_assoc();
                                        $email = $orderRow["c_email"];
                                        $productQty = $orderRow["qty"];

                                        $sqlImg = "SELECT * FROM `product` WHERE `invoice_no` = {$rowPending["invoice_no"]}";
                                        $queryImg = $con->query($sqlImg);
                                        while ($rowImg = mysqli_fetch_assoc($queryImg)) {
                                ?>

                                            <tr>
                                                <!-- tr begin -->
                                                <td><?= $i; ?></td>
                                                <td> <?= $email; ?> </td>
                                                <td> <?= $rowPending["invoice_no"]; ?> </td>
                                                <td> <?= $amount; ?> </td>
                                                <td> <?= $productQty; ?> </td>
                                                <td> <?= $date; ?> </td>
                                                <td> <?= $paymentMode; ?> </td>
                                                <td> <?= $ref_no; ?> </td>
                                                <td> <?= $code; ?> </td>
                                                <td> <?= $delivery_add; ?> </td>
                                                <td>
                                                    <a href='accept_order.php?req=<?= $orderId; ?>' class="btn btn-success">Accept</a>
                                                </td>
                                             

                                            </tr><!-- tr finish -->

                                <?php }
                                    }
                                } ?>

                                <?php
                                
                                $status = "Payment Complete";
                                $s = "SELECT * FROM `customer_orders` WHERE order_status = '$status'";
                                if ($q = $con->query($s)) {

                                    $i = 0;
                                    while ($r = $q->fetch_assoc()) {
                                        $i++; ?>

                                        <tr>
                                            <!-- tr begin -->
                                            <td><?= $i; ?></td>
                                            <td><?= $r["c_email"]; ?></td>
                                            <td><?= $r["invoice_no"]; ?></td>
                                            <td><?= $r["due_amount"]; ?></td>
                                            <td><?= $r["qty"]; ?></td>
                                            <td><?= $r["order_date"]; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-danger">
                                                <b>Completed</b>
                                            </td>

                                        </tr><!-- tr finish -->

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