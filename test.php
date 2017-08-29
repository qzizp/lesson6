<?php 
  $jsonData = file_get_contents("tests/dota2.json");
  $data = json_decode($jsonData, true);

  echo "<pre>";
  print_r($data);
  echo "</pre>";

 ?>

 <!DOCTYPE html>
 <html lang="ru">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <link rel="stylesheet" href="">
   <title>Document</title>
 </head>
 <body>
   <a href="list.php">Вернуться к списку тестов</a> <br>
   <a href="admin.php">Добавить свой тест</a>
 </body>
 </html>