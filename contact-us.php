<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
  <script src="js/ajax-utils.js"></script>
  <script src="js/script.js"></script>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LARA FOOD</title>
  <link href="https://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/test.css" />
</head>

<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="pull-left visible-md visible-lg">
            <div alt="Logo image">
              <img id="logo-img" src="images/logo2.png" alt="logo" />
            </div>
          </a>

          <div class="navbar-brand">
            <a href="index.php">
              <h1>LARA CHANG FOOD</h1>
            </a>
          </div>

          <button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
          <ul id="nav-list" class="nav navbar-nav navbar-right">
            <li id="navHomeButton" class="visible-xs active">
              <a href="index.php">
                <span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li id="navMenuButton">
              <a href="index.php" onclick="$dc.loadMenuCategories();">
                <span class="glyphicon glyphicon-cutlery"></span>
                <br class="hidden-xs" />
                Menu</a>
            </li>
            <li>
              <a href="webForm.php">
                <span class="glyphicon glyphicon glyphicon-user"></span><br class="hidden-xs" />
                Reservation
              </a>
            </li>
            <li>
              <a href="cart.php" type="submit">
                <span class="glyphicon glyphicon-shopping-cart"></span><br class="hidden-xs" />
                Cart
              </a>
            </li>
            <li>
              <a href="contact-us.php">
                <span class="glyphicon glyphicon-info-sign"></span><br class="hidden-xs" />
                Contact us
              </a>
            </li>
            <li id="phone" class="hidden-xs">
              <a href="tel:+(212)701 23 32 72">
                <span>+(212)701 23 32 72</span></a>
              <div>We Deliver</div>
            </li>
          </ul>
          <!-- #nav-list -->
        </div>
        <!-- .collapse .navbar-collapse -->
      </div>
      <!-- .container -->
    </nav>
    <!-- #header-nav -->
  </header>

  <div id="call-btn" class="visible-xs">
    <a class="btn" href="tel:+(212)701 23 32 72">
      <span class="glyphicon glyphicon-earphone"></span>
      +(212)701 23 32 72
    </a>
  </div>
  <div id="xs-deliver" class="text-center visible-xs">We Deliver</div>

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
          <button type="submit">Send</button>
        </p>
        </form>
      </div>
    </article>
    <div class="envelope front"></div>
    <div class="envelope back"></div>
  </div>
</body>

</html>