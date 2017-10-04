<?php 

$testsList = scandir(__DIR__ . "/uploaded-tests");
unset($testsList[0], $testsList[1]);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <link rel="stylesheet" href="style.css">
  <title>Список тестов</title>
</head>
<body>
  <div class="wrapper">
      <table>
        <tr>
          <td>№ теста</td>
          <td>Название теста</td>
        </tr>
        <?php foreach ($testsList as $id => $test) :
            $cuttedTestName = mb_substr($test, 0, -5);
            $uc = ucfirst($cuttedTestName);
            $testId = $id - 1;
            ?>
            <tr>
              <td><?= $id - 1; ?></td>
              <td><a href="test.php?id=<?= $testId ?>"><?= $uc ?></a></td>
            </tr>
        <?php endforeach; ?>
      </table>
      <a href="admin.php">Вернуться в админку</a>
  </div>
</body>
</html>