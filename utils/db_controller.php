<?php
class DBController
{
  // LOCAL DATABASE
  // private $host = "localhost";
  // private $username = "root";
  // private $password = "";
  // private $database = "SI";

  // railway.app DATABASE
  private $host = "containers-us-west-179.railway.app";
  private $port = "7529";
  private $username = "root";
  private $password = "PASSWORD";
  private $database = "railway";

  public $con = null;

  public function __construct()
  {
    $this->con = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
    if ($this->con->connect_error) {
      echo "Fail " . $this->con->connect_error;
    }
  }

  private function closeConnection()
  {
    if ($this->con != null) {
      $this->con->close();
      $this->con = null;
    }
  }

  public function __destruct()
  {
    $this->closeConnection();
  }
}
