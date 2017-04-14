<?php
  namespace Shop;
  error_reporting(E_ALL);
  include 'functions/function.php';
  use Shop\classes\Keyboard\Keyboard;
  use Shop\classes\Printers\Printers;
  use Shop\classes\Sugar\Sugar;
  use Shop\classes\Exception\ShopException;
  
  $keyboard = new Keyboard('keyboard', 500, 'USB', 'мембрана');
  $printer = new Printers('printer', 35000, 'A3/A4', '10');
  $sugar = new Sugar('sugar', 500, '10');

  function throwException()
  {
    throw new ShopException('Сработало исключение');
  }

  try {
    if (empty($keyboard->getPrice())) {
      throwException();
    }
  } catch(ShopException $e) {
    echo 'Цена на клавиатуру не задана';
    die;
  }

  if(!empty($_POST)) {
    $_SESSION['keyboard'] = [$_POST['keyboard'], $keyboard->toBasket()];
    $_SESSION['printer'] = [$_POST['printer'],  $printer->toBasket()];
    $_SESSION['sugar'] = [$_POST['sugar'], $sugar->toBasket()];
    header('Location: basket.php');
    die;
  }
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Интернет-магазин</title>
</head>
<body>
  <form method="post">
    <fieldset>
      <legend>Доступные товары</legend>
      <?php
        echo $keyboard->enableProduct();
        echo $printer->enableProduct();
        echo $sugar->enableProduct();
      ?>
      <button type="submit" name="to-basket" value="1">Добавить в корзину</button>
    </fieldset>
  </form>
</body>
</html>
