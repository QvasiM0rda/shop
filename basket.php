<?php
namespace Shop;
error_reporting(E_ALL);
include 'functions/function.php';
use Shop\classes\Basket\Basket;
use Shop\classes\Basket\Order;

//Создание объекта заказа
$order = new Order();

//Товары из сессии передаются в объект
$order->toBasket($_SESSION);

//Если продукт отмечен для удаления, вызывается метод unsetProduct - товар удаляется из корзины
if(isset($_POST['delete'])){
  foreach ($_POST as $key => $del){
    if($key !== 'delete'){
      $order->unsetProduct($del);
      header('Refresh');
    }
  }
}

//Возврат на страницу выбора товаров
if(isset($_POST['back'])){
  header('Location: index.php');
  die;
}

//Вывод окончательного заказа на экран
if (isset($_POST['process'])) {
  echo 'Ваш заказ: №';
  echo $order->setOrderNumber() . '<br>';
  foreach ($order->processOrder() as $product) {
    echo $product . '<br>';
  }
  echo $order->getTotalPrice() . '<br>';
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
      <p>Для удаления товара из корзины пометтье галочкой нужный товар и нажмите кнопку "Удалить выбранные".</p>
      <p>Вернуться к выбору товаров можно, нажав кнопку "Вернуться к товарам".</p>
      <p>Для оформления заказа нажмите кнопку "Оформить заказ".</p>
      <?php
        //Вывод содержимого корзины
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