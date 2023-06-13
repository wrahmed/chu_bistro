<?php

class Client
{
  public $fname = null;
  public $lname = null;
  public $email = null;
  public $phone = null;

  public $db = null;
  public $clientId = null;

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

  public function getClientId()
  {
    $result = $this->db->con->query("SELECT clientId FROM client WHERE email = '$this->email'"); # unique email
    # fetch just one
    $item = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($item) {
      return $item['clientId'];
    } else {
      return null;
    }
  }

  public function insertClient()
  {
    $this->db->con->query("INSERT INTO client (fname, lname, email, phone)
    VALUES ('$this->fname', '$this->lname', '$this->email', '$this->phone')");
    $this->clientId = $this->db->con->insert_id;
    return $this->clientId;
  }
}
