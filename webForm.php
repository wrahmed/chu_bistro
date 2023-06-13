<?php
// include('components/header.php');
// include('components/navbar.php');

include("utils/db_controller.php");
include("utils/reservation.php");
include("utils/logging.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = new DBController();
  $reservation = new Reservation($db);
  $reservation->setData($_POST);
  $reservation->insertReservation();
  console::log("sending data $_POST");
  // Redirection après l'insertion des données
  header("Location: index.php");
  exit(); // Terminer le script après la redirection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lara CHANG FOOD : Book a table </title>
  <?php include('components/head.php'); ?>
  <?php include('components/head.php'); ?>
  <!-- Meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex">
  <meta name="keywords" content="Table Booking Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link href="webStyle.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/styles.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>


  <?php include('components/navbar.php'); ?>
  <div class="pull-right toggle-right-sidebar">
    <span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span>
  </div>
  <h1 class="header-w3ls">
    Table Booking Form
  </h1>
  <!---728x90--->
  <div class="appointment-w3">
    <form id="form" method="post">
      <div class="personal">
        <div class="main">
          <div class="form-left-w3l">
            <input type="text" class="top-up" name="fname" placeholder="Fist Name" required="">
          </div>
          <div class="form-left-w3l">
            <input type="text" class="top-up" name="lname" placeholder="Last Name" required="">
          </div>
          <div class="form-left-w3l">
            <input type="email" name="email" placeholder="Email" required="">
          </div>
          <div class="form-right-w3ls ">
            <input class="buttom" type="text" name="phone" placeholder="Phone Number" required="">
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="information">
        <div class="main">
          <div class="form-left-w3l">
            <!-- <input id="datepicker" name="date" type="date" placeholder="Booking Date &" required="" style="margin:5px auto ">
            <input type="time" id="timepicker" name="time" class="timepicker form-control hasWickedpicker" placeholder="Time"> -->

            <input type="datetime-local" id="dt" name="dt">
            <div class="clear"></div>
          </div>
        </div>
        <div class="main">
          <div class="form-left-w3l">
            <select class="form-control" name="nbAdults">
              <option value="">Number of Adults</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="form-right-w3ls">
            <select class="form-control" name="nbChildren">
              <option value="">Number of Children</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
      </div>
      <div class="btnn">
        <input type="submit" value="Reserve a Table" name="btnSubmit" onclick="SwAlert()">
      </div>
    </form>
  </div>
  <div class="copy">
    <p>&copy; Copyright LARA FOOD 2023 | All Rights Reserved |</p>
  </div>

</body>
<!-- <script src="js/jquery-3.7.0.js"></script> -->
<script ref="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
  document.getElementById("form").addEventListener("click", (event) => event.preventDefault());

  function SwAlert() {
    swal({
      icon: 'success',
      title: 'Table Booked !',
      texte: 'Welcome',
    }).then((value) => {
      console.log("notif");
      document.getElementById("form").submit();
    });
  }
</script>


</html>