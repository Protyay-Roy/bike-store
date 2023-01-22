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

                    <i class="fa fa-dashboard"></i> Dashboard / View Payments

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

                        <i class="fa fa-fw fa-money"></i> View Payments

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
                                    <th> Customer Name: </th>
                                    <th> Customer Address: </th>
                                    <th> Invoice No: </th>
                                    <th> Product Qty: </th>
                                    <th> Amount: </th>
                                    <th> Payment Mode: </th>
                                    <th> Ref No: </th>
                                    <th> Code: </th>
                                    <th> Payment Date: </th>
                                    <th> Delete: </th>

                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php

                                $sqlPending = "SELECT * FROM `payments`";
                                if ($queryPending = $con->query($sqlPending)) {

                                    $i = 0;
                                    while ($rowPending = mysqli_fetch_assoc($queryPending)) {

                                        $i++;
                                        $payment_id = $rowPending["payment_id"];
                                        $ref_no = $rowPending["ref_no"];
                                        $code = $rowPending["code"];
                                        $paymentMode = $rowPending["payment_mode"];
                                        $amount = $rowPending["amount"];
                                        $date = $rowPending["payment_date"];

                                        $orderId = $rowPending["order_id"];
                                        $orderSql = "SELECT * FROM customer_orders WHERE order_id = '$orderId'";
                                        $orderQuery = $con->query($orderSql) or die('OrderQuery Failed');
                                        $orderRow = $orderQuery->fetch_assoc();
                                        $email = $orderRow["c_email"];
                                        $productQty = $orderRow["qty"];

                                        $customerS = "SELECT * FROM customer WHERE c_email = '$email'";
                                        $customerQ = $con->query($customerS);
                                        $customerR = $customerQ->fetch_assoc();
                                        $customerAdd = $customerR["c_add"];
                                        $customerName = $customerR["c_name"];

                                        $sqlImg = "SELECT * FROM `product` WHERE `invoice_no` = {$rowPending["invoice_no"]}";
                                        $queryImg = $con->query($sqlImg);
                                        while ($rowImg = mysqli_fetch_assoc($queryImg)) {

                                ?>

                                            <tr>
                                                <!-- tr begin -->
                                                <td><?= $i; ?></td>
                                                <td><?= $customerName; ?></td>
                                                <td><?= $customerAdd; ?></td>
                                                <td><?= $rowPending["invoice_no"]; ?></td>
                                                <td><?= $productQty; ?></td>
                                                <td><?= $amount; ?></td>
                                                <td><?= $paymentMode; ?></td>
                                                <td><?= $ref_no; ?></td>
                                                <td><?= $code; ?></td>
                                                <td><?= $date; ?></td>
                                                <td>
                                                    <a href="index.php?delete_payment=<?= $payment_id; ?>" class="btn btn-danger"> DELETE</a>
                                                </td>

                                            </tr><!-- tr finish -->

                                <?php } } } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-hover table-striped table-bordered finish -->

                    </div><!-- table-responsive finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>