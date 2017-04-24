<?php
namespace Shop\classes\Basket;

class Basket
{
  protected $product = [];

  public function setProduct($array)
  {
    $this->product = $array;
  }

  public function getProduct()
  {
    foreach ($this->product as $product) {
      $price = $product['price'] * $product['amount'];
      echo $product['title'] . ', ' . $product['amount'] . ' шт, - ' . $price . ' руб.' .
        '<a href="?del=' . $product['title'] .'">Удалить</a><br>';
    }
  }

  public function unsetProduct($product)
  {
    unset ($this->product[$product]);
    unset ($_SESSION[$product]);
  }

  public function getTotalPrice()
  {
    $totalPrice = 0;
    foreach ($this->product as $product) {
      $totalPrice = $totalPrice + ($product['price'] * $product['amount']);
    }
    return $totalPrice;
  }
}