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
        <title> Insert Users </title>
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

                        <i class="fa fa-dashboard"></i> Dashboard / Insert Users

                    </li><!-- active Finish -->

                </ol><!-- breadcrumb Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-9 col-xs-offset-1">
                <!-- col-lg-12 Begin -->

                <div class="panel panel-default">
                    <!-- panel panel-default Begin -->

                    <div class="panel-heading">
                        <!-- panel-heading Begin -->

                        <h3 class="panel-title">
                            <!-- panel-title Begin -->

                            <i class="fa fa-money fa-fw"></i> Insert Users

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form action="index.php?insert_user" method="post" enctype="multipart/form-data">
                            <!-- form Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Name</label>

                                <input type="text" class="form-control" name="name" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Email</label>

                                <input type="text" class="form-control" name="email" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Password</label>

                                <input type="password" class="form-control" name="pass" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Contact</label>

                                <input type="text" class="form-control" name="contact" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Address</label>

                                <input type="text" class="form-control" name="address" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>About User's</label>

                                <textarea name="about" id="" cols="" rows="5" class="form-control" required></textarea>     
                            
                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Profile Picture</label>

                                <input type="file" class="form-control form-height-custom" name="img" required>

                            </div><!-- form-group Finish -->

                            <div class="text-center">
                                <!-- text-center Begin -->

                                <button type="submit" name="register" class="btn btn-primary">

                                    <i class="fa fa-user-md"></i> Register

                                </button>

                            </div><!-- text-center Finish -->

                        </form><!-- form Finish -->


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

    if (isset($_POST["register"])) {

        $userName = ucwords($_POST["name"]);

        $userEmail = $_POST["email"];

        $userPass = $_POST["pass"];

        $userContuct = $_POST["contact"];

        $userAbout = $_POST["about"];

        $a_cat = "3";

        $userAddress = ucwords($_POST["address"]);

        $userImg = $_FILES["img"]["name"];

        $userImg_tmp = $_FILES["img"]["tmp_name"];

         

        $userSql = "INSERT INTO `admin`(`a_name`, `a_cat`, `a_email`, `a_pass`, `a_address`, `a_con`, `a_about`, `a_img`) VALUES ('$userName','$a_cat','$userEmail','$userPass','$userAddress','$userContuct','$userAbout','$userImg')";

        $userQuery = mysqli_query($con, $userSql) or die('This Email address is already taken');

        if ($userQuery) {

            move_uploaded_file($userImg_tmp, "admin_images/$userImg");

            $adminSql = "SELECT * FROM `admin`";

            if ($adminQuery = mysqli_query($con, $adminSql) or die('Query Failed')){

                $adminEmail = mysqli_fetch_assoc($adminQuery);

                $_SESSION["admin_email"] = $adminEmail["a_email"];

                echo "<script>alert('You have been Registered Sucessfully')</script>";

                echo "<script>window.open('index.php?view_users','_self')</script>";
            }
            
        }
    }

    ?>

<?php
 } 
 ?>