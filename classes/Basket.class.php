<?php
namespace Shop\classes;

abstract class Basket
{
  abstract public function toBasket($array);
  abstract public function basket();
  abstract public function getTotalPrice();
  abstract public function unsetProduct($product);
}