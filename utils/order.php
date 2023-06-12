<?php
require_once('client.php');
require_once('creditCard.php');
class Order
{
  public $addr = null;

  public $cart = null;
  public $db = null;
  public $client = null;
  public $creditCard = null;

  public function __construct(DBController $db, Cart $cart)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
    $this->cart = $cart;
  }
  public function setData($POST)
  {
    $this->client = new Client($this->db);
    $this->client->setData($POST);
    $this->creditCard = new CreditCard($this->db);
    $this->creditCard->setData($POST);
    $this->addr = $POST['addr'];
  }

  public function sendOrder()
  {
    $clientId = $this->client->getClientId();
    if (!$clientId) $clientId = $this->client->insertClient();
    $total = $this->cart->cartTotalAfter;
    $creditCardId = $this->creditCard->insertCreditCard();

    $this->db->con->query("INSERT INTO orders (clientId, creditCardId, total, addr)
    VALUES ($clientId, $creditCardId, $total, '$this->addr')");
    $orderId = $this->db->con->insert_id;

    foreach ($this->cart->cartItems as $cartItem) {
      $plateId = $cartItem->plate->plateId;
      $quantity = $cartItem->quantity;
      $this->db->con->query("INSERT INTO orders_plate (orderId, plateId, quantity) VALUES ($orderId, $plateId, $quantity)");
    }
  }
}
