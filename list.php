<?php 

$testsDir = __DIR__ . "/uploaded-tests";
$testsList = scandir($testsDir);
unset($testsList[0], $testsList[1]);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <link rel="stylesheet" href="">
  <title>Список тестов</title>
</head>
<body>

  <table>
    <tr>
      <td>№ теста</td>
      <td>Название теста</td>
    </tr>
    <?php foreach ($testsList as $key => $test) : 
    $cuttedTestName = mb_substr($test, 0, -5);
    $uc = ucfirst($cuttedTestName); ?>
    <tr>
      <td><?php echo $key - 1; ?></td>
      <td><?php echo "<a href=\"test.php\">" . $uc . "</a>"; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
  <a href="admin.php">Вернуться в админку</a>

</body>
</html>