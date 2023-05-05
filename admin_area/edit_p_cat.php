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
        <title> Update Product Brands </title>
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

                        <i class="fa fa-dashboard"></i> Dashboard / Update Product Brands

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

                            <i class="fa fa-money fa-fw"></i> Update Product Brands

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <?php

                        if (isset($_GET['edit_p_cat'])) {

                            $p_cat_id = $_GET['edit_p_cat'];
                            $s = "select * from pro_categories where p_cat_id = '$p_cat_id'";

                            if ($q = $con->query($s)) {

                                $r = $q->fetch_assoc();
                            }
                        }

                        ?>

                        <form method="post" class="form-horizontal">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Product Brands Title </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="pro_categories_title" type="text" class="form-control" required value="<?= $r['p_cat_title']; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label">Product Brands Desc </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <textarea name="pro_categories_desc" cols="19" rows="6" class="form-control"><?= $r['p_cat_desc']; ?></textarea>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Update Product Categories" type="submit" class="btn btn-primary form-control">

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

    if (isset($_POST["submit"])) {

        $p_cat_title = $_POST["pro_categories_title"];
        $p_cat_desc = $_POST["pro_categories_desc"];

        $s = "UPDATE `pro_categories` SET `p_cat_title`='{$p_cat_title}',`p_cat_desc`='{$p_cat_desc}' WHERE `p_cat_id` = '{$p_cat_id}'";

        if ($con->query($s)) {

            echo "<script>alert('Update sucessfully')</script>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        } else {

            echo "<script>alert('Failed')</script>";
        }
    }


    ?>



<?php } ?>