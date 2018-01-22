<?php
//validate api
include_once("product.php");
include_once("jsonreader.php");

$id = $_GET["id"];

if(Product::idExists($id)>=1){
     echo "1";
}
else {
     echo "0";
}
?>
