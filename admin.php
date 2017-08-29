<?php

  if (isset($_FILES["userfile"]["name"]) and !empty($_FILES["userfile"]["name"])) {
    if ($_FILES["userfile"]["error"] == UPLOAD_ERR_OK and move_uploaded_file($_FILES["userfile"]["tmp_name"], "./uploaded-tests/" . $_FILES["userfile"]["name"])) {
      echo "Ваш тест загружен!";
    } else {
      echo "Ваш тест не загружен!";
    }
  }
  
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Админка</title>
</head>
<body>
  <div class="wrapper">
    <h1 class="test-upload-header">Загрузи свой тест!</h1>
    <form class="test-upload-form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="500000">
      <label for="testUpload">Выберите тест для загрузки:</label><br>
      <input id="test-upload" type="file" name="userfile" value="Выбрать тест"><br>
      <span class="file-size-notice">Размер вашего теста не должен превышать 500 кб</span><br>
      <button class="add-test" type="submit">Загрузить тест</button>
    </form>
    <a class="all-tests-list" href="list.php">Посмотреть все тесты</a>
  </div>
</body>
</html>