<?php
include_once("product.php");

$file = "database_products.json";
$write = Product::fetchAllJson();

file_put_contents($file, $write);

?>
