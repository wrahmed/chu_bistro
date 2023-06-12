<?php
class CreditCard
{
  public $cardNumber = null;
  public $exp = null;
  public $cvv = null;

  public $db = null;
  public $creditCardId = null;

  public function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

  public function setData($POST)
  {
    foreach ($POST as $key => $value) {
      $this->{$key} = $value;
    }
  }

  public function insertCreditCard()
  {
    $this->db->con->query("INSERT INTO creditCard (cardNumber, exp, cvv)
    VALUES ('$this->cardNumber', '$this->exp', '$this->cvv')");
    $this->creditCardId = $this->db->con->insert_id;
    return $this->creditCardId;
  }
}
