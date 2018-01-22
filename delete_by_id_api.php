<?php
include_once("product.php");

$id = $_GET["id"];
Product::deleteByID($id);

?>
