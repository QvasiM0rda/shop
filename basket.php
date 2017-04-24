<?php
namespace Shop;
use Shop\classes\Basket\Basket;
use Shop\classes\Basket\Order;

error_reporting(E_ALL);
include 'functions/function.php';

$basket = new  Basket();
$basket->setProduct($_SESSION);

if (!empty($_GET['del'])) {
  $basket->unsetProduct($_GET['del']);
  header('Location: basket.php');
}

if (isset($_POST['back'])) {
  header('Location: index.php');
  die;
}

if (isset($_POST['process'])) {
  $order = new Order();
  $order->setProduct($_SESSION);
  $order->getOrder();
  die;
}

?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Корзина</title>
</head>
<body>
  <form method="post">
    <fieldset>
      <legend>Корзина</legend>
      <?php
        $basket->getProduct();
        echo 'Общая цена - ' . $basket->getTotalPrice() . ' руб.<br>';
      ?>
      <button type="submit" name="process">Оформить заказ</button>
      <button type="submit" name="back">Вернуться к товарам</button>
    </fieldset>
  </form>
</body>
</html>