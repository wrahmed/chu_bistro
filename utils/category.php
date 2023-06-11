<?php
class Category
{
  public $categoryId = null;
  public $name = null;
  public $short_name = null;
  public $special_instructions = null;

  public $db = null;

  public function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

  public function fetchDataById($categoryId)
  {
    $result = $this->db->con->query("SELECT * FROM category WHERE categoryId = '$categoryId'");
    $item = mysqli_fetch_array($result, MYSQLI_ASSOC);
    foreach ($item as $key => $value) {
      $this->{$key} = $value;
    }
  }
}
