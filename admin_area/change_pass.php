<div class="box-header">
    <!-- box-header Begin -->

    <center>
        <!-- center Begin -->

        <h2> Change Password </h2>

    </center><!-- center Finish -->

    <div class="col-xs-8 col-xs-offset-2" style="margin-top: 40px;">
        <form action="" method="post">
            <!-- form Begin -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Old Password:</label>

                <input type="text" class="form-control" name="o_pass" required>

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>New Password:</label>

                <input type="text" class="form-control" name="n_pass" required>

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <label>Retype Password:</label>

                <input type="text" class="form-control" name="re_pass" required>

            </div><!-- form-group Finish -->

            <div class="form-group">
                <!-- form-group Begin -->

                <input type="submit" class="form-control btn btn-primary" name="update">

            </div><!-- form-group Finish -->

        </form><!-- form Finish -->
    </div>

</div><!-- box-header Finish -->

<?php
if (isset($_POST["update"])) {

    $o_pass = $_POST["o_pass"];

    $n_pass = $_POST["n_pass"];

    $re_pass = $_POST["re_pass"];

    $sql = "SELECT * FROM `admin` WHERE `a_email`= '{$_SESSION['admin_email']}'";

    if ($q = $con->query($sql)) {

        $r = mysqli_fetch_assoc($q);

        $a_pass = $r["a_pass"];
    }

    if ($re_pass == $n_pass) {
        if ($a_pass == $o_pass) {

            $query = $con->query("UPDATE `admin` SET a_pass='$n_pass' WHERE `a_email`= '{$_SESSION['admin_email']}'"); 

            if ($query) {
                echo "<script>alert('Password has been changed')</script>";
                echo "<script>window.open('index.php?dashboard', '_self')</script>";
            }
        } else {
            echo "<script>alert('Password does not match')</script>";
        }
    } else {
        echo "<script>alert('Password and Retype does not match')</script>";
    }
}

?>