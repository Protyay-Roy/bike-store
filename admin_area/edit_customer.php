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

                        <i class="fa fa-dashboard"></i> Dashboard / Update Customer

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

                            <i class="fa fa-money fa-fw"></i> Update Customer

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <?php

                        if (isset($_GET['edit_customer'])) {

                            $p_cat_id = $_GET['edit_customer'];
                            $s = "select * from customer where c_id = '$p_cat_id'";

                            if ($q = $con->query($s)) {

                                $r = $q->fetch_assoc();
                                $c_img = $r["c_img"];
                                $c_id = $r["c_id"];
                                $c_name = explode(" ", $r["c_name"]);
                                $l_name = end($c_name);
                                $f_name = $c_name[0];
                            }
                        }

                        ?>

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">First Name: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="fname" type="text" class="form-control" required value="<?= $f_name; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Last Name: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="lname" type="text" class="form-control" required value="<?= $l_name; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Email: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="email" type="email" class="form-control" required value="<?= $r['c_email']; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Address: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="address" type="text" class="form-control" required value="<?= $r['c_add']; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Contuct: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="contuct" type="text" class="form-control" required value="<?= $r['c_ph']; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Image: </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="img" type="file" class="form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="update" value="Update Customer Information" type="submit" class="btn btn-primary form-control">

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
//     if (file_exists($filePath)) 
//     {
//       unlink($filePath);
//        echo "File Successfully Delete."; 
//    }
//    else
//    {
//     echo "File does not exists"; 
//    }

    if (isset($_POST["update"])) {

        $fname = ucwords($_POST["fname"]);
        $lname = ucwords($_POST["lname"]);
        $name = $fname." ".$lname;
        $email = $_POST["email"];
        $address = ucwords($_POST["address"]);
        $contuct = $_POST["contuct"];
        $img = $_FILES["img"]["name"];
        $img_tmp = $_FILES["img"]["tmp_name"];

        if($img == "") {
            $img = $c_img;
        }

        $s = "UPDATE `customer` SET `c_name`='$name',`c_email`='$email',`c_ph`='$contuct',`c_add`='$address',`c_img`='$img' WHERE c_id = '$c_id'";

        if ($con->query($s)) {

            move_uploaded_file($img_tmp,"../customer/images/$img");

            echo "<script>alert('Update successful')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";
        } else {

            echo "<script>alert('Failed')</script>";
        }
    }


    ?>



<?php } ?>