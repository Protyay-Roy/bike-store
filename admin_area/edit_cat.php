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

                        <i class="fa fa-dashboard"></i> Dashboard / Categories / Update Categories

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

                            <i class="fa fa-money fa-fw"></i> Update Categories

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <?php

                        if (isset($_GET['edit_cat'])) {

                            $cat_id = $_GET['edit_cat'];
                            $s = "select * from categories where cat_id = '$cat_id'";

                            if ($q = $con->query($s)) {

                                $r = $q->fetch_assoc();
                            }
                        }

                        ?>

                        <form method="post" class="form-horizontal">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Categories Title </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="categories_title" type="text" class="form-control" required value="<?= $r['cat_title']; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Categories Desc </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <textarea name="categories_desc" cols="19" rows="6" class="form-control"><?= $r['cat_desc']; ?></textarea>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Update Categories" type="submit" class="btn btn-primary form-control">

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

        $cat_title = $_POST["categories_title"];
        $cat_desc = $_POST["categories_desc"];

        $s = "UPDATE `categories` SET `cat_title`='{$cat_title}',`cat_desc`='{$cat_desc}' WHERE `cat_id` = '{$cat_id}'";

        if ($con->query($s)) {

            echo "<script>alert('Categories has been inserted sucessfully')</script>";
            echo "<script>window.open('index.php?view_cats','_self')</script>";
        } else {

            echo "<script>alert('Failed')</script>";
        }
    }

    ?>

<?php } ?>