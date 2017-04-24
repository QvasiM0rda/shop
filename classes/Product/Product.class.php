<?php
namespace Shop\classes\Product;

abstract class Product
{
  public $title;
  public $price;

  //Возвращается цена
  public function getPrice()
  {
    return $this->price;
  }

  //Метод устанавливет название и цену товара
  public function __construct($title, $price)
  {
    $this->title = $title;
    $this->price = $price;
  }

  abstract public function getProduct();

  //Возвращает товар для вывода
  public function enableProduct()
  {
    $return = $this->getProduct() . ' <input type="number" name="' . $this->title . '" value="0"><br>';
    return $return;
  }

  //Передает название и цену для занесения в корзину
  public function toBasket()
  {
    $return = [$this->title, $this->price];
    return $return;
  }
}