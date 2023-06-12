<!DOCTYPE html>
<html lang="en">
  <head>
<?php include('components/head.php'); ?>
</head>
<body>
  <?php include('components/navbar.php'); ?>
  <link rel="stylesheet" href="css/test.css" />
  <div class="wrapper centered">
    <article class="letter">
      <div class="side">
        <h1>Contact us</h1><br>
        <form id="form">
          <p>
            <textarea placeholder="Your message" id="message"></textarea>
          </p>
      </div>
      <div class="side">
        <p>
          <input type="text" id="name" placeholder="Your name" required>
        </p>
        <p>
          <input type="email" id="mail" placeholder="Your email" required>
        </p>
        <p>
          <button name="btnSubmit" onclick="SwAlert()" type="submit">Send</button>
        </p>
        </form>
      </div>
    </article>
    <div class="envelope front"></div>
    <div class="envelope back"></div>
    <p class="result-message centered">Thank you !</p>
  </div>

</body>


</html>