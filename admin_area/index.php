<?php
session_start();

include ("db_con.php");

if (!isset($_SESSION["admin_email"])){

    echo "<script>window.open('login.php','_self')</script>";

} else{

    $admin_sql = "SELECT * FROM `admin` WHERE `a_email` = '{$_SESSION["admin_email"]}'";
    $admin_q = $con->query($admin_sql);
    $admin_r = mysqli_fetch_array($admin_q);
    $aId = $admin_r["aid"];
    $aName = $admin_r["a_name"];
    $aEmail = $admin_r["a_email"];
    $aPass = $admin_r["a_pass"];
    $aContuct = $admin_r["a_con"];
    $aAddress = $admin_r["a_address"];
    $aAbout = $admin_r["a_about"];
    $aImage = $admin_r["a_img"];

    $pro_sql = "SELECT * FROM `product`";
    $pro_q = $con->query($pro_sql);
    $pro_row = $pro_q->num_rows;

    $cus_sql = "SELECT * FROM `customer`";
    $cus_q = $con->query($cus_sql);
    $cus_row = $cus_q->num_rows;

    $cat_sql = "SELECT DISTINCT `p_cat_title` FROM `pro_categories`";
    $cat_q = $con->query($cat_sql);
    $cat_row = $cat_q->num_rows;

    $orderSQL = "SELECT * FROM `customer_orders`";
    $orderQUERY = $con->query($orderSQL);
    $orderROW = $orderQUERY->num_rows;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIKE STORE</title>

    <!-- Favicon
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.webp"> -->

    <link rel="stylesheet" href="css/styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="css/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php

                    if(isset($_GET["dashboard"])){
                        include ("dashboard.php");
                    }

                    if(isset($_GET["insert_product"])){
                        include ("insert_product.php");
                    }

                    if(isset($_GET["view_products"])){
                        include ("view_products.php");
                    }

                    if(isset($_GET["edit_product"])){
                        include ("edit_product.php");
                    }

                    if(isset($_GET["delete_product"])){
                        include ("delete_product.php");
                    }

                    if(isset($_GET["insert_p_cat"])){
                        include ("insert_p_cat.php");
                    }

                    if(isset($_GET["view_p_cats"])){
                        include ("view_p_cats.php");
                    }

                    if(isset($_GET["edit_p_cat"])){
                        include ("edit_p_cat.php");
                    }

                    if(isset($_GET["delete_p_cat"])){
                        include ("delete_p_cat.php");
                    }


                    if(isset($_GET["insert_cat"])){
                        include ("insert_cat.php");
                    }

                    if(isset($_GET["view_cats"])){
                        include ("view_cats.php");
                    }

                    if(isset($_GET["edit_cat"])){
                        include ("edit_cat.php");
                    }

                    if(isset($_GET["delete_cat"])){
                        include ("delete_cat.php");
                    }
                    
                    if(isset($_GET["view_customers"])){
                        include ("view_customers.php");
                    }
                    
                    if(isset($_GET["add_customers"])){
                        include ("add_customers.php");
                    }
                    
                    if(isset($_GET["edit_customer"])){
                        include ("edit_customer.php");
                    }
                    
                    if(isset($_GET["delete_customer"])){
                        include ("delete_customer.php");
                    }

                    if (isset($_GET['view_orders'])) {
                        include ('view_orders.php');
                    }

                    if (isset($_GET['view_payments'])) {
                        include ('view_payments.php');
                    }
                    if (isset($_GET['delete_payment'])) {
                        include ('delete_payment.php');
                    }

                    if (isset($_GET['view_massages'])) {
                        include ('view_massages.php');
                    }
                    if (isset($_GET['delete_massage'])) {
                        include ('delete_massage.php');
                    }

                    if (isset($_GET['insert_user'])) {
                        include ('insert_user.php');
                    }

                    if (isset($_GET['view_users'])) {
                        include ('view_users.php');
                    }

                    if (isset($_GET['user_profile'])) {
                        include ('user_profile.php');
                    }
                    
                    if (isset($_GET['edit_user'])) {
                        include ('edit_user.php');
                    }
                    
                    if (isset($_GET['delete_user'])) {
                        include ('delete_user.php');
                    }
                    
                    if (isset($_GET['change_pass'])) {
                        include ('change_pass.php');
                    }
                
                ?>
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>          
<script src="js/bootstrap-337.min.js"></script>

</body>
</html>

<?php } ?>