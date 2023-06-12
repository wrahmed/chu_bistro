<?php

class Order
{
  public $fname = null;
  public $lname = null;
  public $email = null;
  public $address = null;
  public $phone = null;
  public $cardNumber = null;
  public $exp = null;
  public $cvv = null;

  public $cart = null;
  public $db = null;

  public function __construct(DBController $db, Cart $cart)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
    $this->cart = $cart;
  }
  public function setData($POST)
  {
    foreach ($POST as $key => $value) {
      $this->{$key} = $value;
    }
  }

  private function getClientId($email)
  {
    $result = $this->db->con->query("SELECT clientId FROM client WHERE email = '$email'"); # unique email
    # fetch just one
    $item = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($item) {
      return $item['clientId'];
    } else {
      return null;
    }
  }

  private function insertNewClient()
  {
    $this->db->con->query("INSERT INTO client (fname, lname, email, addr, phone)
    VALUES ('$this->fname', '$this->lname', '$this->email', '$this->address', '$this->phone')");
    return $this->db->con->insert_id;
  }

  public function sendOrder()
  {
    $clientId = $this->getClientId($this->email);
    if (!$clientId) $clientId = $this->insertNewClient();
    $total = $this->cart->cartTotalAfter;
    $this->db->con->query("INSERT INTO orders (clientId, total ,cardNumber, exp, cvv)
    VALUES ($clientId, $total,'$this->cardNumber', '$this->exp', '$this->cvv')");
    $orderId = $this->db->con->insert_id;

    // $orderId = $this->db->con->insert_id;
    foreach ($this->cart->cartItems as $cartItem) {
      $plateId = $cartItem->plate->plateId;
      $quantity = $cartItem->quantity;
      $this->db->con->query("INSERT INTO orders_plate (orderId, plateId, quantity) VALUES ($orderId, $plateId, $quantity)");
    }
  }
}
