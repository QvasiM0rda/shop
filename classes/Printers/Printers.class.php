<?php
namespace Shop\classes\Printers;
use Shop\classes\Product;

class Printers extends Product
{
  public $format;
  public $listPerMin;
  
  public function __construct($title, $price, $format, $listPerMin)
  {
    parent::__construct($title, $price);
    $this->format = $format;
    $this->listPerMin = $listPerMin;
  }
  
  public function getProduct()
  {
    $return = $this->title . ', ' . $this->format . ', ' . $this->listPerMin . ' страниц в минуту - ' . $this->price . 'руб.';
    return $return;
  }
}