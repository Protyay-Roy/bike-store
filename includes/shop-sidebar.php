<?php

$aCat = array();
$aPcat = array();

// This is for categories Begin //

if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {

    foreach ($_REQUEST['cat'] as $sKey => $sVal) {

        if ((int)$sVal != 0) {

            $aCat[(int)$sVal] = (int)$sVal;
        }
    }
}

// This is for categories Finisih //

// This is for products_categories Begin //

if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

        if ((int)$sVal != 0) {

            $aPcat[(int)$sVal] = (int)$sVal;
        }
    }
}

// This is for products_categories Finisih //

?>
<!-- PRODUCT-LEFT-SIDEBAR START -->
<div class="product-left-sidebar">
    <!-- SINGLE SIDEBAR PRICE START -->
    <div class="product-single-sidebar">
        <div class="list-group">
            <span class="sidebar-title">Price</span>
            <li style="list-style-type: none;">
                <label><strong>Range:</strong></label>
                <input type="hidden" id="hidden_minimum_price" value="0" name="hidden_minimum_price" />
                <input type="hidden" id="hidden_maximum_price" value="9999999" name="hidden_maximum_price" />
            </li>

            <p id="price_show">৳0 - ৳9999999</p>
            <div id="price_range"></div>
        </div>
    </div>
    <!-- SINGLE SIDEBAR PRICE END -->

    <!-- SINGLE SIDEBAR CATEGORIES START -->
    <?php
    if (empty($category_id)) {
    ?>
        <div class="product-single-sidebar">
            <span class="sidebar-title">Categories</span>
            <ul>
                <?php

                $get_cat = "select * from categories";
                $run_cat = mysqli_query($con, $get_cat);

                while ($row_cat = mysqli_fetch_array($run_cat)) {

                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];

                    $proS = "SELECT * FROM product WHERE cat_id = '$cat_id'";
                    $proQ = $con->query($proS);
                    $proCount = mysqli_num_rows($proQ);
                    $aCat = [];

                    echo "
                    <li>
                    <label class='cheker'>
                        <input ";

                    if (isset($aCat[$cat_id])) {
                        echo "checked='checked'";
                    }

                    echo " value='" . $cat_id . "' type='checkbox' class='get_cat' id='cat' name='cat'>
                    
                <span";
                    //  class= '";if (isset($aCat[$cat_id])) { echo "checked"; } echo "'
                    echo "></span>

                    </label>

                    <a>" . $cat_title . " <span>(" . $proCount . ")</span></a>
                    ";
                }

                ?>
            </ul>
        </div>
    <?php } ?>
    <!-- SINGLE SIDEBAR CATEGORIES END -->

    <!-- SINGLE SIDEBAR CATEGORIES START -->
    <div class="product-single-sidebar">
        <span class="sidebar-title">Brands</span>
        <ul>
            <?php
            $proCatS = "SELECT * FROM pro_categories";
            // advance code
            if (!empty($category_id)) {
                $categoryProducts = "SELECT DISTINCT p_cat_id FROM product WHERE cat_id = $category_id";
                $categoryProductsQ = $con->query($categoryProducts);

                $pro_cat_ids = array();
                while ($categoryProductsR = mysqli_fetch_assoc($categoryProductsQ)) {
                    $ids = (int)$categoryProductsR['p_cat_id'];
                    $pro_cat_ids[] .= $ids;
                }
                if(!empty($pro_cat_ids)){
                    $test = implode(" , ", $pro_cat_ids);
                    $proCatS = "SELECT * FROM pro_categories WHERE p_cat_id IN ($test)";
                }
            }

            $proCatQ = $con->query($proCatS);
            while ($proCatR = mysqli_fetch_assoc($proCatQ)) {
                $proCatTitle = $proCatR["p_cat_title"];
                $proCatId = $proCatR["p_cat_id"];

                $proS = "SELECT * FROM product WHERE p_cat_id = '$proCatId'";
                if (!empty($category_id)) {
                    $proS = "SELECT * FROM product WHERE cat_id = $category_id AND p_cat_id = $proCatId";
                }
                $proQ = $con->query($proS);
                $proCount = mysqli_num_rows($proQ);
                $aCat = [];

                echo "
                    <li>
                    <label class='cheker'>
                        <input ";

                if (isset($aPcat[$proCatId])) {
                    echo "checked='checked'";
                }

                echo " value='" . $proCatId . "' type='checkbox' id='p_cat' class='get_p_cat' name='p_cat'>
                         <span  class='get_p_cat'></span>
                    </label>
                    <a href='#'>" . $proCatTitle . " <span>(" . $proCount . ")</span></a>
                    ";
            }

            ?>
        </ul>
    </div>
    <!-- SINGLE SIDEBAR CATEGORIES END -->

    <!-- SINGLE SIDEBAR AVAILABILITY START -->
    <div class="product-single-sidebar">
        <span class="sidebar-title">Availability</span>
        <ul>
            <?php
            $proS = "SELECT * FROM product";
            if (!empty($category_id)) {
                $proS = "SELECT * FROM product WHERE cat_id = $category_id";
            }
            $proQ = $con->query($proS);
            $proCount = mysqli_num_rows($proQ);
            ?>
            <li>
                <label class="cheker">
                    <input type="checkbox" name="availability" />
                    <!-- <span></span> -->
                </label>
                <a href="#">In stock<span> (<?= $proCount; ?>) Products</span></a>
            </li>
        </ul>
    </div>
    <!-- SINGLE SIDEBAR AVAILABILITY END -->


    <!-- SINGLE SIDEBAR SIZE END -->
</div>