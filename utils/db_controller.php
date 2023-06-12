<?php
class DBController
{
  // LOCAL DATABASE
  // private $host = "localhost";
  // private $username = "root";
  // private $password = "";
  // private $database = "SI";

  // clever-cloud.com DATABASE
  private $host = "bcjbhbivptnsxz8jlkn3-mysql.services.clever-cloud.com";
  private $username = "uoofmc1b9g3ikf1l";
  private $password = "dNapk2OgANrQJPHxyxfL";
  private $database = "bcjbhbivptnsxz8jlkn3";

  public $con = null;

  public function __construct()
  {
    $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
    if ($this->con->connect_error) {
      echo "Fail " . $this->con->connect_error;
    }
  }

  public function closeConnection()
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
