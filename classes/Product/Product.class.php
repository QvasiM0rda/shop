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

  //Возвращается название товара
  public function getTitle(){
    return $this->title;
  }

  //Метод устанавливет название и цену товара
  public function __construct($title, $price)
  {
    if (empty($price)) {
      throw new \Exception('Не задана цена на товар!');
    } else {
      $this->title = $title;
      $this->price = $price;
    }
  }

  abstract public function getProduct();

  //Возвращает товар для вывода
  public function productOutput()
  {
    $return = $this->getProduct() . ' <input type="number" name="' . $this->title . '" value="0"><br>';
    return $return;
  }
}