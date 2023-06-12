CREATE TABLE orders_creditCard (orderId int NOT NULL, creditCardId int NOT NULL, PRIMARY KEY(orderId, creditCardId), FOREIGN KEY (orderId) REFERENCES orders(orderId), FOREIGN KEY (creditCardId) REFERENCES creditCard(creditCardId));

CREATE TABLE creditCard (creditCardId int NOT NULL AUTO_INCREMENT, cardNumber VARCHAR(19) NOT NULL, exp VARCHAR(7) NOT NULL,cvv VARCHAR(3) NOT NULL, PRIMARY KEY(creditCardId));

SET FOREIGN_KEY_CHECKS = 1;
