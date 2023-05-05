<?php 

$con =  mysqli_connect("localhost", "root", "", "bike-store");
include("functions/function.php");

switch($_REQUEST['sAction']){

    default :

    getProducts();

    break;

}

?> 