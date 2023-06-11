<?php
function replaceTemplate($replace, $with, $htmlPath)
{
  $cardHtml = file_get_contents($htmlPath);
  $cardHtml = str_replace($replace, $with, $cardHtml);
  return $cardHtml;
}
