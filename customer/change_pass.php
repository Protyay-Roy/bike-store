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

<center>
    <!-- center Begin -->

    <h2> Change Your Password </h2>

</center><!-- center Finish -->

<hr class="mt-2 mb-5">

<div class="col-md-10 offset-1">
    <div class="box-header">
        <!-- box-header Begin -->


        <form action="" method="post">
            <!-- form Begin -->
            <div class="form-group">
                <!-- form-group Begin -->
                <label>Your Old Password</label>
                <input type="password" class="form-control" name="old_pass" required>
            </div><!-- form-group Finish -->
            <div class="form-group">
                <!-- form-group Begin -->
                <label>Your New Password</label>
                <input type="password" class="form-control" name="new_pass" required>
            </div><!-- form-group Finish -->
            <div class="form-group">
                <!-- form-group Begin -->
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confrom_pass" required>
            </div><!-- form-group Finish -->
            <div class="text-center">
                <!-- text-center Begin -->
                <button type="submit" name="change_pass" class="btn btn-primary">
                    <i class="fa fa-user-md"></i> Change Password

                </button>
            </div><!-- text-center Finish -->
        </form><!-- form Finish -->
    </div><!-- box-header Finish -->
</div>

<?php

if (isset($_POST["change_pass"])) {

    $op = $_POST["old_pass"];
    $np = $_POST["new_pass"];
    $c_np = $_POST["confrom_pass"];

    $s = "SELECT c_pass FROM customer WHERE c_email = '{$_SESSION["c_email"]}' && c_pass = '$op'";
    $q = $con->query($s);

    if ($q->num_rows === 1) {

        if ($np === $c_np) {

            $s2 = "UPDATE customer SET c_pass = '$np' WHERE c_email = '{$_SESSION["c_email"]}'";

            if ($con->query($s2) or die('QUERY Failed s2')) {

                echo "<script>alert('Your Password Has Been Changed')</script>";
                echo "<script>window.open('my-account.php', '_self')</script>";
            }
        } else {

            echo "<script>alert('Confirm Password Does Not Match')</script>";
            echo "<script>window.open('my-account.php', '_self')</script>";
        }
    } else {

        echo "<script>alert('Your Password Does Not Match')</script>";
        echo "<script>window.open('my-account.php', '_self')</script>";
    }
}

?>