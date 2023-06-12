<?php
include('category.php');
class MenuItem
{
  public $menuItemId = null;
  public $categoryId = null;
  public $category = null;
  public $catShortName = null;
  public $name = null;
  public $short_name = null;
  public $price_large = null;
  public $description = null;
  public $imageUrl = null;

  public $db = null;

  public function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

  private function getCategoryById()
  {
    $cat = new Category($this->db);
    $cat->fetchDataById($this->categoryId);
    $this->category = $cat;
  }

  public function fetchData($short_name)
  {
    $result = $this->db->con->query("SELECT * FROM menuItem WHERE short_name = '$short_name'");
    $item = mysqli_fetch_array($result, MYSQLI_ASSOC);
    foreach ($item as $key => $value) {
      $this->{$key} = $value;
    }
    $this->getCategoryById();
    $this->catShortName = $this->category->short_name;
    $this->imageUrl = "images/menu/$this->catShortName/$this->short_name.jpg";
  }
}
