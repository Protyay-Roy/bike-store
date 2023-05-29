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
        <title> Update Products </title>

        <style>
            label {
                text-align: left !important;
                margin-bottom: 5px !important;
            }
        </style>
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

                        <i class="fa fa-dashboard"></i> Dashboard / Update Products

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

                            <i class="fa fa-money fa-fw"></i> Update Product

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <?php

                        if (isset($_GET['edit_product'])) {

                            $edit_product = $_GET['edit_product'];
                            $sql = "SELECT * FROM `product` WHERE `p_id` = '$edit_product'";

                            if ($query = $con->query($sql)) {

                                $res = $query->fetch_assoc();
                                $product_id = $res["p_id"];
                                $product_type = $res["p_type"];
                                $img1 = $res["p_img1"];
                                $img2 = $res["p_img2"];
                                $img3 = $res["p_img3"];
                            }

                            $sqlAttr = "SELECT * FROM `bike_attr` WHERE `id` = '$edit_product'";
                            // var_dump($sqlAttr); die();

                            if ($queryAttr = $con->query($sqlAttr)) {

                                $resAttr = $queryAttr->fetch_assoc();
                            }
                        }

                        ?>

                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="">
                            <!-- form-horizontal Begin -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Title </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="product_id" type="hidden" value="<?= $res["p_id"] ?>">

                                            <input name="product_title" type="text" class="form-control" required value="<?= $res["p_title"] ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Generic Name </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="product_generic_name" type="text" class="form-control" required value="<?= $res["p_generic_name"] ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Category </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <select name="product_cat" class="form-control">
                                                <!-- form-control Begin -->

                                                <?php

                                                $sql2 = "SELECT * FROM `pro_categories` WHERE `p_cat_id` = '{$res["p_cat_id"]}'";

                                                if ($que = $con->query($sql2)) {

                                                    $r_pro = $que->fetch_assoc();
                                                }

                                                ?>

                                                <option value="<?= $r_pro["p_cat_id"]; ?>" selected> <?= $r_pro["p_cat_title"]; ?> </option>

                                                <?php

                                                $s = "SELECT DISTINCT p_cat_id,p_cat_title FROM pro_categories";
                                                $q = $con->query($s);

                                                while ($r_p_cat = mysqli_fetch_assoc($q)) {

                                                    echo "<option value='{$r_p_cat["p_cat_id"]}'>{$r_p_cat["p_cat_title"]}</option>";
                                                }

                                                ?>


                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Category </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <select name="cat" class="form-control">
                                                <!-- form-control Begin -->

                                                <?php

                                                $sql3 = "SELECT * FROM `categories` WHERE `cat_id` = '{$res["cat_id"]}'";

                                                if ($que2 = $con->query($sql3)) {

                                                    $r_cat = $que2->fetch_assoc();
                                                }

                                                ?>

                                                <option value="<?= $r_cat["cat_id"]; ?>" selected> <?= $r_cat["cat_title"]; ?> </option>

                                                <?php

                                                $s = "SELECT * FROM categories";
                                                $q = $con->query($s);

                                                while ($r = mysqli_fetch_assoc($q)) {

                                                    echo "<option value='{$r["cat_id"]}'>{$r["cat_title"]}</option>";
                                                }

                                                ?>

                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Price </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="product_price" type="text" class="form-control" required value="<?= $res["p_price"] ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->


                                </div><!-- form-group Finish -->
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product type </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <select name="product_type" class="form-control">
                                                <!-- form-control Begin -->

                                                <option><?= $product_type; ?></option>
                                                <option value="NEW">NEW</option>
                                                <option value="SALE">SALE</option>


                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Image 1 </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="product_img1" type="file" class="form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Image 2 </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="product_img2" type="file" class="form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Image 3 </label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="product_img3" type="file" class="form-control form-height-custom">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"></label>

                                        <div class="col-md-12">
                                            <!-- col-md-6 Begin -->

                                            <input name="submit" value="Update Product" type="submit" class="btn btn-primary form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>
                            </div>
                            <!-- </div> -->

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

    if (isset($_POST["submit"])) {

        $product_id = $_POST["product_id"];
        $product_title = $_POST["product_title"];
        $product_generic_name = $_POST["product_generic_name"];
        $product_cat = $_POST["product_cat"];
        $cat = $_POST["cat"];
        $product_type = $_POST["product_type"];
        $product_price = $_POST["product_price"];


        $product_img1 = $_FILES["product_img1"]["name"];
        $product_img2 = $_FILES["product_img2"]["name"];
        $product_img3 = $_FILES["product_img3"]["name"];

        if ($product_img1 == "") {
            $product_img1 = $img1;
        };
        if (empty($product_img2)) {
            $product_img2 = $img2;
        };
        if (empty($product_img3)) {
            $product_img3 = $img3;
        };

        $temp1 = $_FILES["product_img1"]["tmp_name"];
        $temp2 = $_FILES["product_img2"]["tmp_name"];
        $temp3 = $_FILES["product_img3"]["tmp_name"];

        $update_sql = "UPDATE `product` SET `cat_id`='$cat',`p_cat_id`='$product_cat',`date`=NOW(),`p_title`='$product_title',`p_generic_name`='$product_generic_name',`p_img1`='$product_img1',`p_img2`='$product_img2',`p_img3`='$product_img3',`p_price`='$product_price',`p_type`= '$product_type' WHERE `p_id` = '$product_id'";
        if ($con->query($update_sql)) {

            move_uploaded_file($temp1, "product_images/$product_img1");
            move_uploaded_file($temp2, "product_images/$product_img2");
            move_uploaded_file($temp3, "product_images/$product_img3");


            echo "<script>alert('Product has been Updated sucessfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }

    ?>


<?php } ?>