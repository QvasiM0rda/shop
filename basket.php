<?php
namespace Shop;
error_reporting(E_ALL);
include 'functions/function.php';
use Shop\classes\Order\Order;

$order = new Order();
$order->toBasket($_SESSION);

if(isset($_POST['delete'])){
  foreach ($_POST as $key => $del){
    if($key !== 'delete'){
      $order->unsetProduct($del);
      header('Refresh');
    }
  }
}

if(isset($_POST['back'])){
  header('Location: index.php');
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
        foreach ($order->basket() as $product){
          echo $product;
        }
        echo $order->getTotalPrice() . '<br>';
      ?>
      <button type="submit" name="process">Оформить заказ</button>
      <button type="submit" name="delete">Удалить выбранные</button>
      <button type="submit" name="back">Вернуться к товарам</button>
    </fieldset>
  </form>
</body>
</html>