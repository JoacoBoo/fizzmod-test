<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title></title>
     </head>
     <body>
          <h1>Json Array</h1>
          <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

          <script type="text/javascript">
          $.ajax({url: "seeall_api.php", success: function(result){
               console.log("json written in the file");
          }});

          $.getJSON("database_products.json", function(data){
               console.log(data);
               var productData;
               $.each(data, function(key, value){
                    productData += '<tr id="' + value.id + '">';
                    productData += "<td>" + value.id + "</td>";
                    productData += "<td>" + value.name + "</td>";
                    productData += "<td>" + value.price + "</td>";
                    productData += "<td>" + value.date_created + "</td>";
                    productData += '<td><button onclick="deleteByID(' + value.id + ')">ELIMINAR</button> </td>';
                    productData += "</tr>";
               });

               $("#productsTable").append(productData);
          });
          /*
          $(document).ready(function(){
          });
          */
          </script>

          <script type="text/javascript">
          function deleteByID(id){
               var urlFormatted = "delete_by_id_api.php?id=" + id;
               console.log(urlFormatted);

               $.ajax({url: urlFormatted, success: function(result){
                    console.log("row deleted successfully");
               }});
               //document.getElementById("productsTable").deleteRow(id);
               $('table#productsTable tr#' + id).remove();
               alert("done");

               $.ajax({url: "seeall_api.php", success: function(result){
                    console.log("json written in the file");
               }});
          }

          </script>

          <table id="productsTable">
               <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>dateCreated</th>
                    <th>Action</th>
               </thead>
          </table>
     </body>
</html>
