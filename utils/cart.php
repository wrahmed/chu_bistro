<?php

class CartItem
{
  public $plate = null;
  public $quantity = 0;

  public function __construct(Plate $plate, $quantity)
  {
    $this->plate = $plate;
    $this->quantity = $quantity;
  }
}

class Cart
{
  public $cartItems = array();
  public $cartTotal = 0;
  public $cartTotalAfter = 0;
  private $shippingFee = 20;

  public $db = null;

  public function __construct($db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $shortName => $qte) {
        $plate = new Plate($this->db);
        $plate->fetchData($shortName);
        $this->cartTotal += $plate->price_large * $qte;
        $cartItem = new CartItem($plate, $qte);
        array_push($this->cartItems, $cartItem);
      }
    }
    $this->cartTotalAfter = $this->cartTotal + $this->shippingFee;
  }

  public function sendToDB()
  {
  }
}

// foreach ($_SESSION['cart'] as $shortName => $quantity) {
//   $db = new DBController();
//   $plate = new Plate($db);
//   $plate->fetchData($shortName);
//   $cartTotal += $plate->price_large * $quantity;
//   $cartTotalAfter = $cartTotal + 20;
//   $replace = array('{{itemImageUrl}}', '{{itemTitle}}', '{{itemDesc}}', '{{itemPrice}}', '{{itemQuantity}}');
//   $with = array($plate->imageUrl, $plate->name, $plate->description, $plate->price_large, $quantity);
//   $cardHtml = replaceTemplate($replace, $with, "card.html");
//   echo $cardHtml;
// }