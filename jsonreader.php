<?php

class Json_Reader{
     static public $jsonFile;
     static public $decodedProductsArray;

     public static function reader(){
          $jsonFile = file_get_contents("products.json");
          $decodedProductsArray = json_decode($jsonFile, true);
          return $decodedProductsArray;
     }
}


?>
