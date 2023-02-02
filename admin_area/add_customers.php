<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Update Categories </title>
    </head>

    <body>

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-12">
                <!-- col-lg-12 Begin -->

                <ol class="breadcrumb">
                    <!-- breadcrumb Begin -->

                    <li class="active">
                        <!-- active Begin -->

                        <i class="fa fa-dashboard"></i> Dashboard / Add Customers

                    </li><!-- active Finish -->

                </ol><!-- breadcrumb Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-12">
                <!-- col-lg-12 Begin -->

                <div class="panel panel-default">
                    <!-- panel panel-default Begin -->

                    <div class="panel-heading">
                        <!-- panel-heading Begin -->

                        <h3 class="panel-title">
                            <!-- panel-title Begin -->

                            <i class="fa fa-money fa-fw"></i> Add Customers

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">First Name: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="fname" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Last Name: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="lname" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Email: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="email" type="email" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Address: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="address" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Contuct: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="contuct" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Password: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="password" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Retype Password: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="re-password" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Image: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="img" type="file" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="add" value="Add Customer" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->

                    </div><!-- panel-body Finish -->

                </div><!-- canel panel-default Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

        <script src="js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>
    </body>

    </html>

    <?php
    if (isset($_POST["add"])) {

        include "../functions/function.php";

        $c_ip = getRealUserIp();
        $f_name = ucwords($_POST["fname"]);
        $l_name = ucwords($_POST["lname"]);
        $c_name = $f_name . " " . $l_name;
        $c_email = $_POST["email"];
        $c_pass = $_POST["password"];
        $c_re_pass = $_POST["re-password"];
        $c_ph = $_POST["contuct"];
        $c_add = ucwords($_POST["address"], ",");

        $c_img = $_FILES["img"]["name"];
        $c_image_tmp = $_FILES["img"]["tmp_name"];

        if (empty($c_img)) {
            $c_img = "";
        }
        
        $customerS = "SELECT * FROM customer";
        $customerQ = $con->query($customerS);
        $customerR = mysqli_fetch_assoc($customerQ);
        $customerEmail = $customerR["c_email"];

        if ($customerEmail !== $c_email) {
            if ($c_pass  === $c_re_pass) {
                $customerSql = "INSERT INTO `customer`(`c_ip`, `c_name`, `c_email`, `c_pass`, `c_ph`, `c_add`, `c_img`) VALUES ('$c_ip','$c_name','$c_email','$c_pass ','$c_ph','$c_add','$c_img')";
                $customerQuery = mysqli_query($con, $customerSql) or die('Customer Query Failed');

                if ($customerQuery) {

                    move_uploaded_file($c_image_tmp, "../customer/images/$c_img");

                    echo "<script>alert('Customer Add Sucessfully')</script>";
                    echo "<script>window.open('index.php?view_customers','_self')</script>";
                }
            } else {
                echo "<script>alert('Your Password and Retype Password is wrong')</script>";
            }
        } else {
            echo "<script>alert('This email address is already added. Please give a new email address')</script>";
        }
    }
    ?>



<?php } ?>