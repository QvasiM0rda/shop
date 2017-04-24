<?php
namespace Shop\classes\Basket;

class Basket
{
  protected $title = [];
  protected $price = [];
  protected $amount = [];
  protected $totalPrice = 0;

  //Данные из массива заносятся в свойства объекта, если выбрано количество
  public function toBasket($array)
  {
    foreach ($array as $product) {
      $this->amount[] = $product[0];
      if ($product[0] !== '0') {
        $this->title[] = $product[1][0];
        $this->price[] = (int)$product[1][1];
        $this->totalPrice = $this->totalPrice + ((int)$product[1][1] * (int)$product[0]);
      }
    }
  }

  //Метод выводит содержимое корзины
  public function basket()
  {
    $return = [];
    for ($i=0; $i<=count($this->title) - 1; $i++){
      $return[] = $this->title[$i] . ' - ' . $this->amount[$i] .
        'шт. <input type="checkbox" name="' . $i .'" value="' . $this->title[$i] . '"><br>';
    }
    return $return;
  }

  //Метод выводит общую цену на все товары
  public function getTotalPrice(){
    return 'К оплате - ' . $this->totalPrice . 'руб.';
  }

  //Метод удаляет продукт, если он был помечен для удаления
  public function unsetProduct($product)
  {
    for ($i=0; $i<=count($this->title) - 1; $i++){
      if ($this->title[$i] === $product){
        $this->totalPrice = $this->totalPrice - $this->price[$i];
        unset($this->title[$i]);
        sort($this->title);
        unset($this->price[$i]);
        sort($this->price);
        unset($this->amount[$i]);
        sort($this->amount);
        unset($_SESSION[$product]);
      }
    }
  }
}