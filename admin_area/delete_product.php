<?php

if (isset($_GET['delete_product'])) {

    $delete_id = $_GET['delete_product'];

    $delete_pro = "delete from product where p_id='$delete_id'";

    $run_delete = mysqli_query($con, $delete_pro);


    echo "<script>alert('One of your product has been Deleted')</script>";

    echo "<script>window.open('index.php?view_products','_self')</script>";

    // if ($run_delete) {


    //     $delete_attr = "delete from bike_attr where id='$delete_id'";

    //     $run_delete_attr = mysqli_query($con, $delete_attr);

    //     if ($run_delete_attr) {

    //         echo "<script>alert('One of your product has been Deleted')</script>";

    //         echo "<script>window.open('index.php?view_products','_self')</script>";
    //     }
    // }
}
