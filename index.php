<?php
  namespace Shop;
  error_reporting(E_ALL);
  include 'functions/function.php';
  use Shop\classes\Product\Keyboard;
  use Shop\classes\Product\Printers;
  use Shop\classes\Product\Sugar;

  //Создание товаров
  $keyboard = new Keyboard('keyboard', 500, 'USB', 'мембрана');
  $printer = new Printers('printer', 35000, 'A3/A4', '10');
  $sugar = new Sugar('sugar', 500, '10');

  //Функция для проверки, установлена цена на товар или нет
  function checkPrice($price) {
    if ($price === '') {
     throw new \Exception('Не задана цена на товар!');
    }
    return $price;
  }
  //Проверка цены
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

    //В сессию добавляется количество товара и результат метода - название и цена
    if ($_POST['keyboard'] != '0') {
      $_SESSION['keyboard'] = ["amount" => $_POST['keyboard'], "title" => $keyboard->getTitle(), "price" => $keyboard->getPrice()];
    }

    if ($_POST['printer'] != '0') {
      $_SESSION['printer'] = ["amount" => $_POST['printer'], "title" => $printer->getTitle(), "price" => $printer->getPrice()];
    }

    if ($_POST['sugar'] != '0') {
      $_SESSION['sugar'] = ["amount" => $_POST['sugar'], "title" => $sugar->getTitle(), "price" => $sugar->getPrice()];
    }
    //Переход на страницу корзины
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
        echo $keyboard->productOutput();
        echo $printer->productOutput();
        echo $sugar->productOutput();
      ?>
      <button type="submit" name="to-basket" value="1">Добавить в корзину</button>
    </fieldset>
  </form>
</body>
</html>
