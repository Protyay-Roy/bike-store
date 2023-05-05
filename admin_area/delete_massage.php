
<?php
    
    session_start();

    $massage_id = $_GET['delete_massage'];

    $s= "DELETE FROM `massage` WHERE `m_id` = '{$massage_id}'";
    
    if ( $con->query($s) ) {

        echo "<script>alert('Massage Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_massages','_self')</script>";
        
    }

?>