<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['cart'] = $_POST;
}

print_r($_SESSION['cart']);

include("components/head.php");
include("components/navbar.php");
?>



<?php
include("components/footer.php");
?>