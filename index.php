<?php
function calc($x, $y)
{
  try {
    if ($y == 0) {
      throw new Exception('/ by zero');
    }
    $result = [
      'Tổng' => $x + $y,
      'Hiệu' => $x - $y,
      'Tích' => $x * $y,
      'Thương' => $x / $y
    ];
    return $result;
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $x = (float)$_POST['x'];
  $y = (float)$_POST['y'];
  $results = calc($x, $y);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>[Bài tập] Hiển thị thông báo nếu người dùng nhập số bất hợp lệ</title>
</head>

<body>
  <h3>[Bài tập] Hiển thị thông báo nếu người dùng nhập số bất hợp lệ</h3>
  <form action="" method="POST">
    <input type="number" name="x" required>
    <input type="number" name="y" required>
    <input type="submit" value="Submit">
  </form>

  <?php if (isset($results)) : ?>
    <ul>
      <?php if (is_array($results)) : ?>
        <?php foreach ($results as $key => $value) : ?>
          <li><?= ucfirst($key) . ': ' . $value ?></li>
        <?php endforeach; ?>
      <?php else : ?>
        <li><?= $results ?></li>
      <?php endif; ?>
    </ul>
  <?php endif; ?>
</body>

</html>
