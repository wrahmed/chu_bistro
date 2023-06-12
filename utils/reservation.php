<?php
require_once('client.php');

class Reservation
{
  public $db = null;

  // protected $fname = null;
  // protected $lname = null;
  // protected $email = null;
  // protected $phone = null;

  protected $dt = null;
  protected $nbAdults = null;
  protected $nbChildren = null;

  protected $client = null;

  public function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

  public function setData($POST)
  {
    $this->client = new Client($this->db);
    $this->client->setData($POST);
    foreach ($POST as $key => $value) {
      $this->{$key} = $value;
    }
  }

  public function insertReservation()
  {
    $clientId = $this->client->getClientId();
    if (!$clientId) $clientId = $this->client->insertClient();
    $this->db->con->query("INSERT INTO reservation (clientId, dt, nbAdults, nbChildren)
    VALUES ($clientId, '$this->dt', $this->nbAdults, $this->nbChildren)");
  }

  public function fetchReservation($email)
  {
    $result = $this->db->con->query("SELECT * FROM reservation WHERE email = '$email'");
    $retArray = array();
    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $resultArray[] = $item;
    }
    return $retArray;
  }
}
