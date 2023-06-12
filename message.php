<?php
require_once('utils/db_controller.php');
require_once('utils/message.php');

$db = new DBController();
$message = new Message($db);
$message->setData($_POST);
$message->insertMessage();
header('Location: index.php');
exit;
