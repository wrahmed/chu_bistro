<header>
  <nav id="header-nav" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <!-- <img id="logo-img" src="restaurant-logo.png" alt="logo" /> -->
        <a href="index.php" class="pull-left visible-md visible-lg">
          <img id="logo-img" src="restaurant-logo.png" alt="logo" />
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
              <span class="glyphicon glyphicon-shopping-cart"></span> Home
            </a>
          </li>
          <li id="navMenuButton">
            <a href="index.php#" onclick="$dc.loadMenuCategories();">
              <span class="glyphicon glyphicon-cutlery"></span>
              <br class="hidden-xs" />
              Menu
            </a>
          </li>
          <li>
            <a href="webForm.php">
              <span class="glyphicon glyphicon-user"></span><br class="hidden-xs" />
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
            <a href="#">
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
</header>
<div id="call-btn" class="visible-xs">
  <a class="btn" href="tel:+(212)701 23 32 72">
    <span class="glyphicon glyphicon-earphone"></span>
    +(212)701 23 32 72
  </a>
</div>
<div id="xs-deliver" class="text-center visible-xs">We Deliver</div>