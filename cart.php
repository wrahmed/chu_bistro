<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['cart'] = $_POST;
}

// print_r($_SESSION['cart']);

?>
<html>

<body>

  <?php
  // include("components/head.php");
  // include("components/navbar.php");
  ?>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
  <section class="h-100 h-custom" style="background-color: #61122f">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-7">
                  <h5 class="mb-3">
                    <a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue
                      shopping</a>
                  </h5>
                  <hr />

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1">Shopping cart</p>
                      <?php
                      if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
                        echo "<p class='mb-0'>Your cart is empty</p>";
                      } else {
                        $len = count($_SESSION['cart']);
                        echo "<p class='mb-0'>You have $len items in your cart</p>";
                      }
                      ?>
                    </div>
                    <div>
                      <p class="mb-0">
                        <span class="text-muted">Sort by:</span>
                        <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a>
                      </p>
                    </div>
                  </div>
                  <!-- Shopping cards here -->
                  <?php
                  include("utils/db_controller.php");
                  include("utils/plate.php");
                  include("utils/html_template.php");
                  include("utils/cart.php");
                  $db = new DBController();
                  $cart = new Cart($db);
                  $replace = array('{{itemImageUrl}}', '{{itemTitle}}', '{{itemDesc}}', '{{itemPrice}}', '{{itemQuantity}}');
                  foreach ($cart->cartItems as $cartItem) {
                    $plate = $cartItem->plate;
                    $quantity = $cartItem->quantity;
                    $with = array($plate->imageUrl, $plate->name, $plate->description, $plate->price_large, $quantity);
                    $cardHtml = replaceTemplate($replace, $with, "card.html");
                    echo $cardHtml;
                  }
                  $db->closeConnection();
                  ?>
                </div>
                <div class="col-lg-5">
                  <div class="card bg-primary text-white rounded-3">
                    <form id="form" action="order.php" method="POST" class="mt-4">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="mb-0">Card details</h5>
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" class="img-fluid rounded-3" style="width: 45px" alt="Avatar" />
                        </div>

                        <!-- <p class="small mb-2">Card type</p>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a> -->

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" name="fname" id="typeFName" class="form-control form-control-lg" placeholder="First Name" size="30" />
                              <label class="form-label" for="typeFName">First Name</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" name="lname" id="typeLName" class="form-control form-control-lg" placeholder="Last Name" size="30" />
                              <label class="form-label" for="typeLName">Last Name</label>
                            </div>
                          </div>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="text" name="email" id="typeEmail" class="form-control form-control-lg" size="50" placeholder="email@email.com" />
                          <label class="form-label" for="typeEmail">Email</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="text" name="address" id="typeAddress" class="form-control form-control-lg" size="100" placeholder="Address" />
                          <label class="form-label" for="typeAddress">Delivery Address</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="text" name="phone" id="typePhone" class="form-control form-control-lg" size="10" minlength="10" maxlength="10" placeholder="0611223344" />
                          <label class="form-label" for="typePhone">Phone Number</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="text" name="cardNumber" id="typeCardNumber" class="form-control form-control-lg" size="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                          <label class="form-label" for="typeCardNumber">Card Number</label>
                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" name="exp" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" name=" id=" exp" minlength="7" maxlength="7" />
                              <label class="form-label" for="typeExp">Expiration</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="password" name="cvv" id="typeCVV" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                              <label class="form-label" for="typeCVV">Cvv</label>
                            </div>
                          </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal</p>
                          <?php echo "<p class='mb-2'>$cart->cartTotal Dh</p>" ?>
                        </div>

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Shipping</p>
                          <p class="mb-2">20 Dh</p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total(Incl. taxes)</p>
                          <?php echo "<p class='mb-2'>$cart->cartTotalAfter Dh</p>" ?>

                        </div>

                        <button type="submit" class="btn btn-info btn-block btn-lg">
                          <div class="d-flex justify-content-between">

                            <span>Checkout
                              <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                          </div>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>