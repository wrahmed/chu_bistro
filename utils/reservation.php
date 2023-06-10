<?php
class Reservation
{
  public $db = null;

  protected $fname = null;
  protected $lname = null;
  protected $email = null;
  protected $phone = null;
  protected $dt = null;
  protected $nbAdults = null;
  protected $nbChildren = null;

  public function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
    // TODO handle error

  }

  public function setData($POST)
  {
    foreach ($POST as $key => $value) {
      $this->{$key} = $value;
    }
  }

  public function insertReservation()
  {
    if ($this->db->con != null) {
      $stmt = $this->db->con->prepare("INSERT INTO reservation (fname, lname, email, phone, dt, nbAdults, nbChildren) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssii", $this->fname, $this->lname, $this->email, $this->phone, $this->dt, $this->nbAdults, $this->nbChildren);
      $stmt->execute();
      $stmt->close();
    }
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
