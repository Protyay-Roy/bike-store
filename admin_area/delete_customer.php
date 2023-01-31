<?php
    include "db_con.php";

    if (isset($_GET["delete_customer"])){

        $delete_id = $_GET["delete_customer"];

        $q = $con->query("DELETE FROM customer WHERE c_id = '$delete_id'");
        
        if ($q) {
            unset($delete_id);
            echo "<script>window.open('index.php?view_customers', '_self')</script>";
        }

    }

?>