<?php

  $testsList = scandir(__DIR__ . "/uploaded-tests");
  unset($testsList[0], $testsList[1]);
  $testId = $_GET["id"]+1;

//  echo "<pre>";
//  print_r($testsList);
//  echo "</pre>";

  if (isset($testsList[$testId]) and !is_dir($testsList[$testId])) {
      $test = $testsList[$testId];
      $data = file_get_contents(__DIR__ . "/uploaded-tests/$test");
      $jsonData = json_decode($data);
      $counter = 1;
      $countAnswer = 1;
      $points = 0;
  } else {
      echo "Что-то пошло не так. Наверно такого теста нет.";
  }

//echo "<pre>";
//var_dump($data);
//echo "</pre>";
//
//  echo "<pre>";
//  var_dump($jsonData);
//  echo "</pre>";

 ?>

 <!DOCTYPE html>
 <html lang="ru">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <link rel="stylesheet" href="style.css">
   <title>Document</title>
 </head>
 <body>
 <div class="wrapper">
     <h2><?php echo $jsonData[0]->title; ?></h2>
     <form action="" method="post">
       <?php foreach($jsonData as $questions):
         if(is_array($questions)): ?>
           <?php foreach($questions as $question): $xxx =(array) $question->answers?>
                 <fieldset>
                     <legend><?= $question->question ?></legend>
                   <?php foreach($xxx as $answers): ?>
                       <p>
                           <input type="radio" id="first" name="q<?= $counter ?>" value="<?= $xxx["answer_{$countAnswer}"] ?>">
                           <label for="first"><?= $xxx["answer_{$countAnswer}"] ?></label>
                       </p>
                     <?php $countAnswer++; endforeach ?>
                 </fieldset>
             <?php if(!empty($_POST["q$counter"])):
               if($_POST["q$counter"] == $question->right):
                 $points++;
               endif;
             endif;
             $counter++; $countAnswer = 1;
           endforeach ?>
         <?php endif ?>
       <?php endforeach ?>
       <input class="submit-test" type="submit" name="submit" value="Завершить тест">
     </form>
   <?php
   if (isset($_POST["submit"])) : ?>
   <p class="onetest-p"><?= "Вопросов в этом тесте: " . count($questions) . "<br>" . "Вы ответили правильно на " . $points . " из них. <br>"; ?></p>
   <?php endif; ?>
   <a class="onetest" href="list.php">Посмотреть все тесты</a>
   <a class="onetest" href="admin.php">Загрузить свой тест</a>
 </div>
 </body>
 </html>