<?php
namespace Shop\classes\Product;

class Sugar extends Product
{
  public $weight;

  //Используется родительский construct и устанавливаются индивидуальные свойства
  public function __construct($title, $price, $weight)
  {
    parent::__construct($title, $price);
    $this->weight = $weight;
  }

  //Вывод продукта с индивидуальными свойствами
  public function getProduct()
  {
    $return = $this->title . ', ' . $this->weight . ' кг. - ' . $this->price . 'руб.';
    return $return;
  }
}