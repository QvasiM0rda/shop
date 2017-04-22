<?php
namespace Shop\classes\Product;

class Keyboard extends Product
{
  public $connectType;
  public $keyType;
  
  public function __construct($title, $price, $connectType, $keyType)
  {
    parent::__construct($title, $price);
    $this->connectType = $connectType;
    $this->keyType = $keyType;
  }
  
  public function getProduct()
  {
    $return = $this->title . ', ' . $this->connectType . ', ' . $this->keyType . ' - ' . $this->price . 'руб.';
    return $return;
  }
}