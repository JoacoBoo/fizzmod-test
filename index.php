<?php
include_once("product.php");
include_once("jsonreader.php");

$json = Json_Reader::reader();
var_dump($json);

echo "<br>";

$productsArray = Product::parseArray($json);
var_dump($productsArray);

echo "<br>";

foreach ($productsArray as $oProduct) {
     $oProduct->insertInDB();
}
?>

<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>Fizzmod Test</title>
     </head>
     <body>
          <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
          <script type="text/javascript">
          console.log("hola buen dia joaco");
               $(document).ready(function(){
                   $("#consult").click(function(){
                        var urlFormatted = "validate.php?id=" + $("#productId").val();
                        console.log(urlFormatted);
                        console.log($(".productId").val());
                       $.ajax({url: urlFormatted, success: function(result){
                           if (result == "1"){
                                console.log("el salario es un costo mas");
                                console.log(result);
                                alert("The product does exist");
                           }
                           else {
                                alert("Lamely, the product doesn't exist");
                                console.log("viva la vejez");
                                console.log(result);
                           }
                       }});
                   });
                   $(".see-all").click(function(){
                      $.ajax({url: "seeall.php", success: function(result){
                           $("#result").html(result);
                      }});
                   });

               });
          </script>
          <h1>Fizmodd Test</h1>
          <br>
          <h2>Evaluated: Joaquin Borovich</h2>
          <br>
          <p>By opening this ".php" file you just inserted the objects in the ".json" file</p>
          <br>

          <div class="consulta">
			<label for="productId">Id de producto</label>
			<input class="productId" name="productId" id="productId" type="text">
			<input class="btn consult" id="consult" value="CONSULTAR" type="button">
		</div>
          <div id="result">
               <input class="btn see-all" value="VER TODOS" type="button">
          </div>
     </body>
</html>
