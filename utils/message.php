<?php
require_once('client.php');
class Message
{
  // public $name = null;
  // public $email = null;
  public $message = null;

  public $db = null;
  public $client = null;

  public function __construct($db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

  public function setData($POST)
  {
    $this->client = new Client($this->db);
    foreach ($POST as $key => $value) {
      $this->client->{$key} = $value;
    }
    $this->message = $POST['message'];
  }

  public function insertMessage()
  {
    $clientId = $this->client->getClientId();
    if (!$clientId) $clientId = $this->client->insertClient();
    $this->db->con->query("INSERT INTO message (clientId, content) VALUES ($clientId,'$this->message')");
  }
}
