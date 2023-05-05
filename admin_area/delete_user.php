<?php
    include "db_con.php";

    if (isset($_GET["delete_user"])){

        $delete_id = $_GET["delete_user"];

        $q = $con->query("DELETE FROM admin WHERE aid = '$delete_id'"); 
        
        if ($q) {
            unset($delete_id);
            echo "<script>window.open('index.php?view_users', '_self')</script>";
        }

    }

?>