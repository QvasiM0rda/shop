<?php
namespace Shop\classes\Basket;

class Order extends Basket
{
  protected $orderNumber;

  //Метод возвращает случайный номер заказа
  public function setOrderNumber(){
    $this->orderNumber = mt_rand(100000, 999999);
    return $this->orderNumber;
  }

  public function processOrder () {
    $return = [];
    for ($i=0; $i<=count($this->title) - 1; $i++) {
      $return[] = $this->title[$i] . ', ' . $this->amount[$i] . ' шт. - ' . $this->price[$i] . ' руб.';
    }
    return $return;
  }
}