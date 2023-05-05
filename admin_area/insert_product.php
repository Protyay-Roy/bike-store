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
        <title> Insert Products </title>

        <style>
            label{
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

                        <i class="fa fa-dashboard"></i> Dashboard / Insert Products

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

                            <i class="fa fa-money fa-fw"></i> Insert Product

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Title </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="product_title" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Products Brands </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <select name="product_cat" class="form-control">
                                                <!-- form-control Begin -->

                                                <option> Select a Product Brand</option>

                                                <?php

                                                $s = "SELECT DISTINCT p_cat_id,p_cat_title FROM pro_categories";
                                                $q = $con->query($s);

                                                while ($r = mysqli_fetch_assoc($q)) {

                                                    echo "<option value='{$r["p_cat_id"]}'>{$r["p_cat_title"]}</option>";
                                                }

                                                ?>

                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Categories </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <select name="cat" class="form-control">
                                                <!-- form-control Begin -->

                                                <option> Select a Category </option>

                                                <?php

                                                $s = "SELECT * FROM categories";
                                                $q = $con->query($s);

                                                while ($r = mysqli_fetch_assoc($q)) {

                                                    echo "<option value='{$r["cat_id"]}'>{$r["cat_title"]}</option>";
                                                }

                                                ?>

                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Image 1 </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="product_img1" type="file" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Image 2 </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="product_img2" type="file" class="form-control">

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Image 3 </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="product_img3" type="file" class="form-control form-height-custom">

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product type </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <select name="product_type" class="form-control">
                                                <!-- form-control Begin -->

                                                <option value="NEW"> NEW</option>
                                                <option value="SALE"> SALE</option>


                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Product Price </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="product_price" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Engine Type </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="engine_type" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Max Power </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="max_power" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Max Torque </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="max_torque" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Max Speed </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="max_speed" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Fule Type </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="fule_type" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Cooling System </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="cooling_system" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Gear </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="gear" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Mileage </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="mileage" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Dimention </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="dimention" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Fuel Capacity </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="fuel_capacity" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Height </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="height" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Color </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="color" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Battery </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="battery" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Head Light </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="h_light" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Back Light </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="b_light" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Signal Light </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="s_light" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Front Break </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="front_break" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-12 control-label"> Back Break </label>

                                        <div class="col-md-12">
                                            <!-- col-md-12 Begin -->

                                            <input name="back_break" type="text" class="form-control" required>

                                        </div><!-- col-md-12 Finish -->

                                    </div><!-- form-group Finish -->
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-12 control-label"></label>

                                <div class="col-md-12">
                                    <!-- col-md-12 Begin -->

                                    <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-12 Finish -->

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

    if (isset($_POST["submit"])) {

        $product_title = $_POST["product_title"];
        $product_cat = $_POST["product_cat"];
        $cat = $_POST["cat"];
        $product_price = $_POST["product_price"];
        // $product_desc = $_POST["product_desc"];
        $product_type = $_POST["product_type"];

        $engine_type = $_POST["engine_type"];
        $max_power = $_POST["max_power"];
        $max_torque = $_POST["max_torque"];
        $max_speed = $_POST["max_speed"];
        $fule_type = $_POST["fule_type"];
        $cooling_system = $_POST["cooling_system"];
        $gear = $_POST["gear"];
        $mileage = $_POST["mileage"];
        $dimention = $_POST["dimention"];
        $fuel_capacity = $_POST["fuel_capacity"];
        $height = $_POST["height"];
        $color = $_POST["color"];
        $battery = $_POST["battery"];
        $h_light = $_POST["h_light"];
        $b_light = $_POST["b_light"];
        $s_light = $_POST["s_light"];
        $front_break = $_POST["front_break"];
        $back_break = $_POST["back_break"];

        $invoice_no = mt_rand();

        $product_img1 = $_FILES["product_img1"]["name"];
        $product_img2 = $_FILES["product_img2"]["name"];
        $product_img3 = $_FILES["product_img3"]["name"];

        $temp1 = $_FILES["product_img1"]["tmp_name"];
        $temp2 = $_FILES["product_img2"]["tmp_name"];
        $temp3 = $_FILES["product_img3"]["tmp_name"];

        $s = "INSERT INTO `product`(`cat_id`, `p_cat_id`,`date`, `p_title`, `p_img1`, `p_img2`, `p_img3`, `p_price`, `invoice_no`,`p_type`) VALUES ('$cat',$product_cat,NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$invoice_no','$product_type')";

        if ($con->query($s)) {

            move_uploaded_file($temp1, "product_images/$product_img1");
            move_uploaded_file($temp2, "product_images/$product_img2");
            move_uploaded_file($temp3, "product_images/$product_img3");

            $addAttr = "INSERT INTO `bike_attr`(`engine_type`, `max_power`, `max_torque`, `max_speed`, `fule_type`, `cooling_system`, `gear`, `mileage`, `dimention`, `fuel_capacity`, `height`, `color`, `battery`, `h_light`, `b_light`, `s_light`, `front_break`, `back_break`) VALUES ('$engine_type','$max_power','$max_torque','$max_speed','$fule_type','$cooling_system','$gear','$mileage','$dimention','$fuel_capacity','$height','$color','$battery','$h_light','$b_light','$s_light','$front_break','$back_break')";

            $addQuery = $con->query($addAttr);
            if($addQuery){

                echo "<script>alert('Product has been inserted sucessfully')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";

            }else{
                echo "<script>alert('Attr Insert Failed')</script>";

            }
        } else {
            echo "<script>alert('Failed')</script>";
        }
    }
    ?>

<?php } ?>