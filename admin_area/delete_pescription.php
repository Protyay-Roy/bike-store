<?php
    include "db_con.php";

    if (isset($_GET["delete_pescription"])){

        $delete_id = $_GET["delete_pescription"];

        $q = $con->query("DELETE FROM pescription WHERE pescription_id = '$delete_id'"); 
        
        if ($q) {
            unset($delete_id);
            echo "<script>window.open('index.php?pescription', '_self')</script>";
        }

    }

?>