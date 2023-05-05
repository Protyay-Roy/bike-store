<?php
$con = mysqli_connect("localhost", "root", "", "bike-store");

if ($con) {
} else {
    echo "Your database connection is not successful";
}

// user ip
function getRealUserIp()
{

    switch (true) {

        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

// totalPrice start
function totalPrice()
{

    global $con;

    $total = 0;

    $ip = getRealUserIp();

    $ipSql = "SELECT * FROM `cart` WHERE `c_ip` = '$ip'";

    $ipQue = mysqli_query($con, $ipSql) or die('Query Failed Ip Price');

    while ($row = mysqli_fetch_array($ipQue)) {

        $p_id = $row["p_id"];

        $p_qty = $row["qty"];

        $s = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";

        $q = mysqli_query($con, $s) or die('Query Failed 2');

        while ($r = mysqli_fetch_array($q)) {

            $sub_total = $r["p_price"] * $p_qty;

            $total += $sub_total;
        }
    }

    echo "৳ " . $total;
}   // totalPrice end


// cartItem start
function cartItem()
{

    global $con;

    $ip = getRealUserIp();

    $sql = "SELECT * FROM `cart` WHERE `c_ip` = '$ip'";

    $que = mysqli_query($con, $sql) or die('Ip Query Failed');

    $row = mysqli_num_rows($que);

    echo $row;
}   // cartItem end


// addCart start
function addCart()
{

    global $con;

    if (isset($_GET["addCart"])) {

        $proId = $_GET["addCart"];
        $ip = getRealUserIp();

        $proQty = $_POST["qtybutton"];

        $cartSql = "SELECT * FROM cart WHERE c_ip = '$ip' && p_id = '$proId'";
        $cartQuery = $con->query($cartSql) or die("Ip Query Failed");

        while ($cartRow = $cartQuery->fetch_assoc()) {
            $cartqty = $cartRow["qty"];
            $cartProId = $cartRow["p_id"];
            $cartId = $cartRow["cart_id"];
            $proQty += $cartqty;
        }
        if ($cartProId == $proId) {
            $updateS = "UPDATE cart SET qty = '$proQty' WHERE cart_id = '$cartId'";
            $updateQ = $con->query($updateS);

            echo "<script>window.open('cart.php', '_self')</script>";
        } else {
            $insertS = "INSERT INTO `cart`(`p_id`,`qty`,`c_ip`) VALUES ('$proId','$proQty','$ip')";
            $insertQ = $con->query($insertS)  or die("Insert Query Failed");
            if ($insertQ) {
                echo "<script>alert('This item added successfully in your cart')</script>";
                echo "<script>window.open('single-product.php?proID=$proId', '_self')</script>";
            }
        }
    }
}   // addcart end


// get product start
function get_pro()
{

    global $con;

    $s = "SELECT * FROM `product` ORDER BY RAND()";

    $q = mysqli_query($con, $s) or die("Query Failed");

    while ($row_products = mysqli_fetch_array($q)) {

        $pro_id = $row_products['p_id'];
        $pro_title = $row_products['p_title'];
        $pro_price = $row_products['p_price'];
        $pro_price = $pro_price;
        $pro_img1 = $row_products['p_img1'];
        $p_type = $row_products['p_type'];

        echo
        '<div class="single-product-item">
            <div class="product-image">
                <a href="single-product.php?proID=' . $pro_id . '"><img src="admin_area/product_images/' . $pro_img1 . '" alt="' . $pro_img1 . '" style="min-height:209px;max-height:209px;" /></a>
                <a href="#" class="new-mark-box">' . $p_type . '</a>
                <div class="overlay-content">
                    <ul>
                        <li>
                            <a href="single-product.php?proID=' . $pro_id . '" title="Quick view"><i class="fa fa-search"></i></a>
                        </li>
                        <li>
                            <a href="single-product.php?proID=' . $pro_id . '" title="' . $pro_title . '"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a>
                        </li>
                        <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-info mt-2">
                <a href="single-product.php?proID=' . $pro_id . '">' . ucwords($pro_title) . '</a>
                <div class="price-box">
                    <span class="price">৳' . $pro_price . '</span>
                </div>
            </div>
        </div>';
    }
}    // get product end

/// Begin getProducts(); functions ///

function getProducts()
{
    global $con;

    $per_page = 32;

    if (isset($_GET['page'])) {

        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page;

    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

    $get_products = "select * from product " . $sLimit;

    if (isset($_GET['category_id'])) {
        $get_products = "select * from product WHERE cat_id = " . $_GET['category_id'] . "" . $sLimit;
    }

    $query = $con->query($get_products);

    $min_price = $_POST["minimum_price"] ?? "";
    $max_price = $_POST["maximum_price"] ?? "";

    if ($min_price != "" && $max_price != "") {

        $aWhere = array();
        $bWhere = array();


        // Begin for Product Categories /// 

        if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

            foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

                if ((int)$sVal != 0) {

                    $bWhere[] = 'p_cat_id=' . (int)$sVal;
                    // var_dump($bWhere);

                }
            }
        }

        // Finish for Product Categories /// 

        // Begin for Categories /// 

        if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {

            foreach ($_REQUEST['cat'] as $sKey => $sVal) {

                if ((int)$sVal != 0) {

                    $aWhere[] = 'cat_id=' . (int)$sVal;
                }
            }
        }

        // Finish for Categories /// 

        $sWhere = " ";

        if (count($aWhere) > 0 && count($bWhere) == 0) {

            $sWhere .=  implode(" or ", $aWhere);
        } elseif (count($aWhere) == 0 && count($bWhere) > 0) {

            $sWhere .=  implode(" or ", $bWhere);
        } elseif (count($aWhere) > 0 && count($bWhere) > 0) {

            $sWhere .=  " (" . implode(" or ", $bWhere) . ") AND (" . implode(" or ", $aWhere) . ")";
        }

        $q = "SELECT * FROM product WHERE p_price BETWEEN '$min_price' AND '$max_price'";

        if ($_POST["category_id"] != '') {
            // $get_products = "select * from product WHERE cat_id = ".$_GET['category_id']."" . $sLimit;
            $f_cat_id = $_POST["category_id"];
            $q = "SELECT * FROM product WHERE cat_id = '$f_cat_id' and p_price BETWEEN '$min_price' AND '$max_price'";
            // echo "ace";
        }

        var_dump($q);
        if ($sWhere != " ") {
            $q .= " and ($sWhere)";
        }

        $q .= $sLimit;

        // var_dump($q);

        $query = $con->query($q);
    }
    // var_dump($get_products);

    $total_row = mysqli_num_rows($query);

    if ($total_row > 0) {
        while ($r = $query->fetch_assoc()) {
            $img = $r["p_img1"];
            $p_id = $r["p_id"];
            $p_price = $r["p_price"];
            $p_title = $r["p_title"];
            $p_type = $r["p_type"];


            echo '
            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                <div class="gategory-product-list">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.php?proID=' . $p_id . '"><img src="admin_area/product_images/' . $img . '" alt="' . $img . '" style="min-height:250px;max-height:250px;" /></a>
                            <a href="single-product.phpproID=' . $p_id . '" class="new-mark-box">' . $p_type . '</a>
                            <div class="overlay-content">
                                <ul>
                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a>
                                    </li>
                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a>
                                    </li>
                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="customar-comments-box">
                                
                            </div>
                            <a href="single-product.php?proID=' . $p_id . '">' . $p_title . '</a>
                            <div class="price-box">
                                <span class="price">৳' . $p_price . '</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> ';
        }
    } else {
        echo "<h2 class='text-warning'> No Product Found </h2>";
    }
}

function get_category()
{
    global $con;
    $get_cat = "select * from categories";
    $run_cat = mysqli_query($con, $get_cat);

    while ($row_cat = mysqli_fetch_array($run_cat)) {

        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        $active = null;
        // var_dump($cat_id);

        echo
        '<li id="cat_active'.$cat_id.'"><a href="shop-gird.php?category_id=' . $cat_id . '">' . $cat_title . '</a></li>';
    }
}
