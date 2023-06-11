localStorage.setItem("cart", JSON.stringify({}));

function sendCart(cart) {
  request = $.ajax({
    url: "cart.php",
    type: "post",
    data: cart,
  });

  request.done((response, textStatus, jqXHR) =>
    console.log("Hooray, it worked!")
  );

  request.fail((jqXHR, textStatus, errorThrown) =>
    console.error("The following error occurred: " + textStatus, errorThrown)
  );
}

function addToCart(itemName) {
  var cart = JSON.parse(localStorage.getItem("cart"));
  if (cart == null) cart = {};
  if (cart[itemName] == null) cart[itemName] = 1;
  else cart[itemName] += 1;
  localStorage.setItem("cart", JSON.stringify(cart));
  sendCart(cart);
  console.log(`added ${itemName} to cart!`);
}

function removeFromCart(itemName) {
  var cart = JSON.parse(localStorage.getItem("cart"));
  if (cart == null) return;
  if (cart[itemName] == null) return;
  else {
    cart[itemName] -= 1;
    if (cart[itemName] === 0) delete cart[itemName];
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  sendCart(cart);
  console.log(`removed ${itemName} to cart!`);
}
// console.log("menu-items-title.js");
