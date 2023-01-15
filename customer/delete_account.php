<style>
    
    hr{
        height: 3px !important;
        
    }
</style>
<center>
    <!--  center Begin  -->

    <h1> Delete Account </h1>

</center><!--  center Finish  -->

<hr class="mt-2 mb-5">

<center>
    <!--  center Begin  -->

    <p class="lead"> Are you sure ! You want to delete this account parmanently ?</p>

    <p class="text-muted  mb-5">

        If you have any questions, feel free to <a href="contact-us.php" class="text-warning">Contact Us</a>. Our Customer Service work <strong>24/7</strong>

    </p>

    <form action="" method="post">
        <h1>
            <button class="btn btn-danger" style="font-size: 30px;" name="delete">  
                Delete Account
            </button>
        </h1>
    </form>

</center><!--  center Finish  -->

<?php

    if (isset($_POST["delete"])) {

        $cEmail = $_SESSION["c_email"];
        $sql = "DELETE FROM `customer` WHERE `c_email` = '$cEmail'";
        if ($con->query($sql)) {

            unset($cEmail);
            session_destroy();
            echo "<script>alert('Your Account Deleted Successfully')</script>";
            echo "<script>window.open('registration.php', '_self')</script>";

        }
    }

?>
