<?php
namespace Shop\classes\Product;

class Keyboard extends Product
{
  public $connectType;
  public $keyType;

  //Используется родительский construct и устанавливаются индивидуальные свойства
  public function __construct($title, $price, $connectType, $keyType)
  {
    parent::__construct($title, $price);
    $this->connectType = $connectType;
    $this->keyType = $keyType;
  }

  //Вывод продукта с индивидуальными свойствами
  public function getProduct()
  {
    $return = $this->title . ', ' . $this->connectType . ', ' . $this->keyType . ' - ' . $this->price . 'руб.';
    return $return;
  }
}