<?php
require_once('menuItem.php');
class CartItem
{
  public $menuItem = null;
  public $quantity = 0;

  public function __construct(MenuItem $menuItem, $quantity)
  {
    $this->menuItem = $menuItem;
    $this->quantity = $quantity;
  }
}

class Cart
{
  public $cartItems = array();
  // public $clientEmail = "";
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
        $menuItem = new MenuItem($this->db);
        $menuItem->fetchData($shortName);
        $this->cartTotal += $menuItem->price_large * $qte;
        $cartItem = new CartItem($menuItem, $qte);
        array_push($this->cartItems, $cartItem);
      }
    }
    $this->cartTotalAfter = $this->cartTotal + $this->shippingFee;
  }

  public function clearCart()
  {
    unset($_SESSION['cart']);
    $this->cartItems = array();
    $this->cartTotal = 0;
    $this->cartTotalAfter = 0;
  }
}
