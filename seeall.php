<h1>Json Array</h1>
<?php
include_once("product.php");

echo Product::fetchAllJson();
?>
<br><br>

<script type="text/javascript">
     var json = '[{"id":"1","name":"TV Samsung 40","price":"5000.99","date_created":"2018-01-21 23:57:34","status":"1"},{"id":"2","name":"TV Samsung 32","price":"3400.99","date_created":"2018-01-21 23:57:34","status":"1"},{"id":"3","name":"Notebook Dell","price":"7000.00","date_created":"2018-01-21 23:57:34","status":"1"},{"id":"4","name":"Hamburguesas Caseras","price":"45.00","date_created":"2018-01-21 23:57:34","status":"1"},{"id":"5","name":"Monitor LG","price":"2799.99","date_created":"2018-01-21 23:57:34","status":"1"}]';
     var jsonArray;

     jsonArray = JSON.parse(json);
     console.log(jsonArray);
     console.log(json);

     $.getJSON(json, function(data){
          var productData;
          $.each(data, function(key, value){
               https://www.youtube.com/watch?v=AOfSuajwY-I
          });
     });
</script>


<table>
     <thead>
          <th>id</th>
          <th>name</th>
          <th>price</th>
          <th>dateCreated</th>
          <th>status</th>
          <th>Action</th>
     </thead>
     <tbody>
          <td>adsda</td>
          <td>adsda</td>
          <td></td>
          <td></td>
          <td>adsw</td>
     </tbody>
</table>
