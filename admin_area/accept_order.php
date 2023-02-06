<?php

include("db_con.php");
session_start();

if (!isset($_SESSION["admin_email"])) {

    header("location:login.php");

} else {

    if (isset($_GET["req"])) {

        $orderId = $_GET["req"];

        $orderSql = "SELECT * FROM customer_orders WHERE order_id = '$orderId'";
        $orderQuery = $con->query($orderSql) or die ('Order Query Failed');
        $orderRow = $orderQuery->fetch_assoc();

        $c_email = $orderRow["c_email"];
        $qty = $orderRow["qty"];
        $invNo = $orderRow["invoice_no"];

        $pendingSql = "SELECT * FROM pending_orders WHERE order_id = '$orderId'";
        $pendingQuery = $con->query($pendingSql) or die ('Pending Query Failed');
        $pendingRow = $pendingQuery->fetch_assoc();

        $price = $pendingRow["amount"];
        $payment_mode = $pendingRow["payment_mode"];
        $ref_no = $pendingRow["ref_no"];
        $code = $pendingRow["code"];
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d/M/Y h:i A');
        $status = "Payment Complete";

        $paymentSql = "INSERT INTO `payments`(`order_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`, `status`) VALUES ('$orderId','$invNo','$price','$payment_mode','$ref_no','$code','$date','$status')";

        if ($paymentQuery = $con->query($paymentSql) or die ('Payment Query Failed')) {

            $date = date('d/M/Y');
            $updateSql = "UPDATE `customer_orders` SET `order_date`='$date',`order_status`='$status' WHERE `order_id` = '$orderId'";
            $deleteQuery = $con->query($updateSql) or die ('Update Query Failed');

            $deleteSql = "DELETE FROM `pending_orders` WHERE `order_id` ='$orderId'";
            $deleteQuery = $con->query($deleteSql) or die ('Delete Query Failed');

            echo "<script>alert('Payment Complete')</script>";
            echo "<script>window.open('index.php?view_orders','_self')</script>";
        }
    }
}
?>