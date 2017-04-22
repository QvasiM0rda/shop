<?php
  namespace Shop;
  error_reporting(E_ALL);
  include 'functions/function.php';
  use Shop\classes\Product\Keyboard;
  use Shop\classes\Product\Printers;
  use Shop\classes\Product\Sugar;

  $keyboard = new Keyboard('keyboard', 500, 'USB', 'мембрана');
  $printer = new Printers('printer', 35000, 'A3/A4', '10');
  $sugar = new Sugar('sugar', 500, '10');

  function checkPrice($price) {
    if ($price === '') {
     throw new \Exception('Не задана цена на товар!');
    }
    return $price;
  }

  if(!empty($_POST)) {
    try {
      echo checkPrice($keyboard->getPrice());
      echo checkPrice($printer->getPrice());
      echo checkPrice($sugar->getPrice());
    }
    catch (\Exception $e) {
      echo 'Выброшено исключение: ' . $e->getMessage() . "\n";
      die;
    }
    
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
      <p>Для добавления товара в корзину выберите нужно количество товаров и нажмите кнопку "Добавить в корзину".</p>
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
