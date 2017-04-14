<?php
namespace Shop\classes;

abstract class Product
{
  public $title;
  public $price;

  public function getPrice()
  {
    return $this->price;
  }
  
  public function __construct($title, $price)
  {
    $this->title = $title;
    $this->price = $price;
  }

  abstract public function getProduct();

  public function enableProduct()
  {
    $return = $this->getProduct() . ' <input type="number" name="' . $this->title . '" value="0"><br>';
    return $return;
  }
  
  public function toBasket()
  {
    $return = [$this->title, $this->price];
    return $return;
  }
}