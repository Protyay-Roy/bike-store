<style>
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    hr {
        height: 3px !important;

    }
</style>
<?php

$sql = "SELECT * FROM `customer` WHERE `c_email`= '{$_SESSION['c_email']}'";

if ($q = $con->query($sql)) {

    $r = mysqli_fetch_assoc($q);
}
?>
<center>
    <!-- center Begin -->

    <h2> Edit account </h2>

</center><!-- center Finish -->

<hr class="mt-2 mb-5">
<div class="col-md-10 offset-1">
    <div class="box-header">
        <!-- box-header Begin -->



        <form action="" method="post" enctype="multipart/form-data">
            <!-- form Begin -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Your Name:</label>

                <input type="text" class="form-control" name="c_name" required value="<?= $r["c_name"] ?>">

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Your Email:</label>

                <input type="text" class="form-control" name="c_email" disabled value="<?= $r["c_email"] ?>">

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Your Contact:</label>

                <input type="text" class="form-control" name="c_contact" required value="<?= $r["c_ph"] ?>">

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Your Address:</label>

                <input type="text" class="form-control" name="c_address" required value="<?= $r["c_add"] ?>">

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Your Profile Picture:</label>

                <input type="file" class="form-control form-height-custom" name="c_image">

            </div><!-- form-group Finish -->

            <div class="text-center">
                <!-- text-center Begin -->

                <button type="submit" name="update" class="btn btn-primary">

                    <i class="fa fa-user-md"></i> Update

                </button>

            </div><!-- text-center Finish -->

        </form><!-- form Finish -->

    </div><!-- box-header Finish -->
</div>

<?php
if (isset($_POST["update"])) {

    $c_name = ucwords($_POST["c_name"]);
    $c_email = $_POST["c_email"];
    $c_ph = $_POST["c_contact"];
    $c_add = ucwords($_POST["c_address"]);

    $c_img = $_FILES["c_image"]["name"];
    $c_image_tmp = $_FILES["c_image"]["tmp_name"];

    $imgQ = "SELECT * FROM customer WHERE c_email = '{$_SESSION["c_email"]}'";
    $imgQ = $con->query($imgQ);
    $imgR = mysqli_fetch_assoc($imgQ);
    $img = $imgR["c_img"];

    if ($c_img == "") {
        $c_img = $img;
    }

    $s = "UPDATE `customer` SET `c_name`='$c_name',`c_ph`='$c_ph',`c_add`='$c_add',`c_img`='$c_img' WHERE `c_email` = '{$_SESSION["c_email"]}'";

    if (mysqli_query($con, $s) or die('Query Failed')) {

        move_uploaded_file($c_image_tmp, "customer/images/$c_img");

        echo "<script>alert('You Profile have been Update Sucessfully')</script>";
        echo "<script>window.open('my-account.php','_self')</script>";
    }
}

?>