<?php
//validate api
include_once("product.php");
include_once("jsonreader.php");

$id = $_GET["id"];
if (is_numeric($id)) {
     if(Product::idExists($id)>=1){
          echo "1";
     } else {
          echo "0";
     }
} elseif (empty($id)) {
     echo "3";
}
else {
     echo "2";
}

?>
