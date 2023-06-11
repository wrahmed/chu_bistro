<?php
class console
{
  public static function log($string, $with_script_tags = true)
  {
    $js_code = 'console.log(' . json_encode($string, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
  }
}
