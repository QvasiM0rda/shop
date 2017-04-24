<?php
namespace Shop\classes\Basket;

class Order extends Basket
{
  public function getOrder()
  {
    echo 'Заказ № ' . mt_rand(100000, 999999) . '<br>';
    foreach ($this->product as $product) {
      $price = $product['price'] * $product['amount'];
      echo $product['title'] . ', ' . $product['amount'] . ' шт, - ' . $price . ' руб.<br>';
    }
    echo 'К оплате - ' . $this->getTotalPrice() . ' руб.<br>';
  }
}