<?php
class Product{

     protected $id;
     protected $name;
     protected $price;
     protected $dateCreated;
     protected $status;


     function __construct($id, $name, $price, $status){
          $this->id = $id;
          $this->name = $name;
          $this->price = $price;
          //$this->dateCreated = $dateCreated;
          $this->status = $status;
     }
     function insertInDB(){
          try {
               $servername = "127.0.0.1";
               $username = "root";
               $password = "root";
               $dbname = "db_fbg6lI9ggNuXRWvs";

               $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "INSERT INTO products (id, name, price) VALUES (".$this->id.", '".$this->name."', ".$this->price.")";

               $conn->exec($sql);
               }
               catch(PDOException $e)
               {
                  echo $sql . "<br>" . $e->getMessage();
             }
     }

     public static function idExists($id){
          $servername = "127.0.0.1";
          $username = "root";
          $password = "root";
          $dbname = "db_fbg6lI9ggNuXRWvs";

          try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT name FROM products WHERE id = " . $id . ";");
              $stmt->execute();

              // set the resulting array to associative
              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $array = $stmt->fetchAll();
              if (count($array[0])) {
                   return 1;
              }
              else {
                   return 0;
              }
          }
          catch(PDOException $e) {
              return 0;
          }
          $conn = null;

     }

     public static function fetchAllJson(){
          $servername = "127.0.0.1";
          $username = "root";
          $password = "root";
          $dbname = "db_fbg6lI9ggNuXRWvs";

          try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM products;");
              $stmt->execute();

              // set the resulting array to associative
              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $array = $stmt->fetchAll();
              $jsonArray = json_encode($array);
              return $jsonArray;
          }
          catch(PDOException $e) {
              return $sql . "<br>" . $e->getMessage();
          }
     }

     function updateColumn($columnName, $value, $id){
          try {
               $servername = "localhost";
               $username = "username";
               $password = "password";
               $dbname = "myDBPDO";

               $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "UPDATE products SET $columnName = $value WHERE id = $id";

               $stmt = $conn->prepare($sql);
               $stmt->execute();

               echo $stmt->rowCount() . " records UPDATED successfully";
          }
          catch(PDOException $e){
               echo $sql . "<br>" . $e->getMessage();
          }
     }

     function __set($name, $value){
          switch ($name) {
               case "id":
                    $this->id = $id;

                    break;
               case "name":
                    $this->name = $value;

                    break;
               case "price":
                    $this->price = $value;

                    break;
               case "dateCreated":
                    $this->dateCreated = $value;

                    break;
               case "status":
                    $this->status = $value;

                    break;
               default:
                    echo $name . "Atribute not found";
                    break;
          }
     }

     public static function parseArray($objectsArray){
          /*
          this method parses the json array objects into products objects and then it is added to a products array
          */
          $productsArray = array();
          foreach($objectsArray as $aProduct)
          {
               $id = $aProduct["id"];
               $name = $aProduct["name"];
               $price = $aProduct["price"];
               $status = 1;

               $oProduct = new product($id, $name, $price, $status);
               array_push($productsArray, $oProduct);
          }
          return $productsArray;
     }

}

?>
