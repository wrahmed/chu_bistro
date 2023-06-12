CREATE TABLE menuItem (menuItemId int NOT NULL AUTO_INCREMENT, categoryId int NOT NULL, name VARCHAR(100) NOT NULL, short_name VARCHAR(5) NOT NULL, price_large float NOT NULL,description VARCHAR(255) NOT NULL DEFAULT '',PRIMARY KEY(menuItemId), FOREIGN KEY (categoryId) REFERENCES category(categoryId));

CREATE TABLE orders_menuItem (orderId int NOT NULL, menuItemId int NOT NULL, quantity int NOT NULL, PRIMARY KEY(orderId, menuItemId), FOREIGN KEY (orderId) REFERENCES orders(orderId), FOREIGN KEY (menuItemId) REFERENCES menuItem(menuItemId));

CREATE TABLE orders_creditCard (orderId int NOT NULL, creditCardId int NOT NULL, PRIMARY KEY(orderId, creditCardId), FOREIGN KEY (orderId) REFERENCES orders(orderId), FOREIGN KEY (creditCardId) REFERENCES creditCard(creditCardId));

CREATE TABLE creditCard (creditCardId int NOT NULL AUTO_INCREMENT, cardNumber VARCHAR(19) NOT NULL, exp VARCHAR(7) NOT NULL,cvv VARCHAR(3) NOT NULL, PRIMARY KEY(creditCardId));

SET FOREIGN_KEY_CHECKS = 1;
