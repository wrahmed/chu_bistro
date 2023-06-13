<!DOCTYPE html>
<html lang="en">

<?php include('components/head.php'); ?>
<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" href="css/test.css" />

<body>
  <?php include('components/navbar.php'); ?>

  <div class="wrapper centered">
    <form method="post" action="message.php" id="form">
      <article class="letter">
        <div class="side">
          <h1>Contact Us</h1><br>
          <p>
            <textarea placeholder="Your message" name="message" id="message"></textarea>
          </p>
        </div>
        <div class="side">
          <p>
            <input type="text" name="name" id="name" placeholder="Your name" required>
          </p>
          <p>
            <input type="email" name="email" id="email" placeholder="Your email" required>
          </p>
          <p>
            <button type="submit">Send</button>
          </p>
        </div>
      </article>
    </form>
    <!-- <div class="envelope front"></div> -->
    <!-- <div class="envelope back"></div> -->
  </div>

</body>

</html>