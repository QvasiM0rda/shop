<?php
namespace Shop\classes\Product;

class Sugar extends Product
{
  public $weight;
  
  public function __construct($title, $price, $weight)
  {
    parent::__construct($title, $price);
    $this->weight = $weight;
  }
  
  public function getProduct()
  {
    $return = $this->title . ', ' . $this->weight . ' кг. - ' . $this->price . 'руб.';
    return $return;
  }
}