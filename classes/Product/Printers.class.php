<?php
namespace Shop\classes\Product;

class Printers extends Product
{
  public $format;
  public $listPerMin;

  //Используется родительский construct и устанавливаются индивидуальные свойства
  public function __construct($title, $price, $format, $listPerMin)
  {
    parent::__construct($title, $price);
    $this->format = $format;
    $this->listPerMin = $listPerMin;
  }

  //Вывод продукта с индивидуальными свойствами
  public function getProduct()
  {
    $return = $this->title . ', ' . $this->format . ', ' . $this->listPerMin . ' страниц в минуту - ' . $this->price . 'руб.';
    return $return;
  }
}