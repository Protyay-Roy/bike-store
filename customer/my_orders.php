<style> 
    hr{
        height: 3px !important; 
    }
</style>
<center>
    <!--  center Begin  -->

    <h1> My Orders </h1>


    <div class="account-info-text mt-3">
        Welcome to your account. Here you can manage all of your personal information and orders.
    </div>

</center><!--  center Finish  -->

<hr class="mt-2 mb-5">

<div class="table-responsive">
    <!--  table-responsive Begin  -->
    <table class="table table-bordered table-hover">
        <!--  table table-bordered table-hover Begin  -->
        <thead>
            <!--  thead Begin  -->
            <tr>
                <!--  tr Begin  -->
                <th> ON: </th>
                <th> Total Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Order Date:</th>
                <th> Payment Status: </th>
            </tr><!--  tr Finish  -->
        </thead><!--  thead Finish  -->
        <tbody> <!--  tbody Begin  -->

            <?php

            $sql = "SELECT * FROM `customer_orders` WHERE `c_email` = '{$_SESSION["c_email"]}'";

            if ($query = $con->query($sql)) {
                $i = 0;
                while ($res = mysqli_fetch_assoc($query)) {
                    $i++;
            ?>
                    <tr>
                        <th> <?= $i; ?> </th>
                        <td> <?= $res["due_amount"]; ?> </td>
                        <td> <?= $res["invoice_no"]; ?> </td>
                        <td> <?= $res["qty"]; ?> </td>
                        <td> <?= $res["order_date"]; ?> </td>
                        <td>
                            <p class='text-success' style='font-weight:bold;'>
                                <?= $res["order_status"]; ?>
                            </p>
                        </td>

                    </tr>

            <?php }
            } ?>

        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->