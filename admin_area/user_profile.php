<?php

$sql = "SELECT * FROM `admin` WHERE `a_email`= '{$_SESSION['admin_email']}'";

if ($q = $con->query($sql)) {

    $r = mysqli_fetch_assoc($q);

    $adminImg = $r["a_img"];
}
?>
<div class="box-header">
    <!-- box-header Begin -->

    <center>
        <!-- center Begin -->

        <h2> Edit account </h2>

    </center><!-- center Finish -->

    <form action="" method="post" enctype="multipart/form-data">
        <!-- form Begin -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Name</label>

            <input type="text" class="form-control" name="name" required value="<?= $r["a_name"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Email</label>

            <input type="text" class="form-control" name="email" disabled value="<?= $r["a_email"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Contact</label>

            <input type="text" class="form-control" name="contact" required value="<?= $r["a_con"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Address</label>

            <input type="text" class="form-control" name="address" required value="<?= $r["a_address"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Profile Picture</label>

            <input type="file" class="form-control form-height-custom" name="image">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>About Yourself</label>

            <textarea name="about" id="" cols="" rows="3" class="form-control form-height-custom">
        <?= $r["a_about"] ?>
    </textarea>

        </div><!-- form-group Finish -->

        <div class="text-center">
            <!-- text-center Begin -->

            <button type="submit" name="update" class="btn btn-primary">

                <i class="fa fa-user-md"></i> Update

            </button>

        </div><!-- text-center Finish -->

    </form><!-- form Finish -->

</div><!-- box-header Finish -->

<?php
if (isset($_POST["update"])) {

    $a_name = ucwords($_POST["name"]);

    $a_ph = $_POST["contact"];

    $a_about = $_POST["about"];

    $a_add = ucwords($_POST["address"]);

    $a_img = $_FILES["image"]["name"];

    $a_image_tmp = $_FILES["image"]["tmp_name"];

    if (empty($a_img)) {
        $a_img = $adminImg;
    }

    $s = "UPDATE `admin` SET `a_name`='$a_name',`a_address`='$a_add',`a_con`='$a_ph',`a_about`='$a_about',`a_img`='$a_img' WHERE `a_email` = '{$_SESSION["admin_email"]}'";

    if (mysqli_query($con, $s) or die('Query Failed')) {

        move_uploaded_file($a_image_tmp, "admin_images/$a_img");

        echo "<script>alert('Your Profile have been Update Sucessfully')</script>";

        echo "<script>window.open('index.php?view_users','_self')</script>";
    } else {


        echo "<script>alert('Something Wrong')</script>";

        echo "<script>window.open('index.php?user_profile','_self')</script>";
    }
}

?>