<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once('utils/db_controller.php');
  require_once('utils/cart.php');
  require_once('utils/order.php');

  $db = new DBController();
  $cart = new Cart($db); # uses session automatically
  $order = new Order($db, $cart);
  $order->setData($_POST);
  $order->sendOrder();
  $cart->clearCart();
  header("Location: index.php");
}
