
<?php

    session_start();

    $payment_id = $_GET['delete_payment'];

    $s= "DELETE FROM `payments` WHERE `payment_id` = '$payment_id'";
    
    if ( $con->query($s) ) {

        echo "<script>alert('Payment Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_payments','_self')</script>";
        
    }

?>