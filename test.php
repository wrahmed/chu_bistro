<?php

$arr = array(
  'a' => 1,
  'b' => 2,
  'c' => 3,
  'd' => 4
);

class Test
{
  public $a = null;
  public $b = null;
  public $c = null;
  public $e;

  public function __construct($arr)
  {
    foreach ($arr as $key => $value) {
      if (!isset($this->{$key})) continue;
      $this->{$key} = $value;
    }
  }
}

$test = new Test($arr);
var_dump($test);
