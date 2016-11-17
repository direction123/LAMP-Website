/*
https://github.com/elliottsj/codeigniter-dokku

https://devcenter.heroku.com/articles/cleardb#using-cleardb-with-php
http://blog.fossasia.org/deploying-php-and-mysql-app-on-heroku/
$heroku config | grep CLEARDB_DATABASE_URL
CLEARDB_DATABASE_URL: mysql://b884771106696d:96ca3bd0@us-cdbr-iron-east-04.cleardb.net/heroku_115d521be016c78?reconnect=true
$mysql -u b884771106696d -h us-cdbr-iron-east-04.cleardb.net -p heroku_115d521be016c78
(key: 96ca3bd0)
mysql> source [path to engelsystem]/engelsystem/db/install.sql;
mysql> source [path to engelsystem]/engelsystem/db/update.sql;
mysql> exit;
*/

SET FOREIGN_KEY_CHECKS = 0;
drop table if exists Employees;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE Employees (
	employeeID INT NOT NULL AUTO_INCREMENT,
    employeeFirstname varchar(255) NOT NULL,
    employeeLastname varchar(255) NOT NULL,	
	employeeSalary double NOT NULL,
	employeeAge INT NOT NULL,
	employeeAddress varchar(255) NOT NULL,
    PRIMARY KEY (employeeID)
)ENGINE=INNODB;
INSERT INTO Employees (employeeID, employeeFirstname,employeeLastname,employeeSalary,employeeAge,employeeAddress)
VALUES (1, 'JAMES','SMITH',3000,40,'EEB 500,3740 McClintock Ave. Los Angeles, CA 90089-2565');
INSERT INTO Employees (employeeID, employeeFirstname,employeeLastname,employeeSalary,employeeAge,employeeAddress)
VALUES (2, 'JOHN','JOHNSON',4000,30,'100 Universal City Plaza, Universal City, CA 91608');
INSERT INTO Employees (employeeID, employeeFirstname,employeeLastname,employeeSalary,employeeAge,employeeAddress)
VALUES (3, 'ROBERT','WILLIAMS',5000,25,'10250 Santa Monica Blvd, Los Angeles, CA 90067');


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists Users;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE Users (
    userIndex INT NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255),
    usertype varchar(255) NOT NULL,
	employeeID INT NOT NULL ,
    PRIMARY KEY (userindex),
	INDEX (employeeID),
	FOREIGN KEY (employeeID)
      REFERENCES Employees(employeeID)
      ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;
INSERT INTO Users (userIndex, username,password,usertype,employeeID)
VALUES (1, 'CS101','Code101','Sales',1);
INSERT INTO Users (userIndex, username,password,usertype,employeeID)
VALUES (2, 'CS102','Code102','Administrators',1);
INSERT INTO Users (userIndex, username,password,usertype,employeeID)
VALUES (3, 'CS103','Code103','Managers',2);
INSERT INTO Users (userIndex, username,password,usertype,employeeID)
VALUES (4, 'CS104','Code104','Administrators',3);


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists ProductCategory;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE ProductCategory (
    productCategoryID INT NOT NULL AUTO_INCREMENT,
	productCategoryName varchar(255) NOT NULL,
	productCategoryDescription varchar(255) NOT NULL,
    PRIMARY KEY (productCategoryID)
)ENGINE=INNODB;
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (1, 'Boots ','Boots ');
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (2, 'Sandals ','Sandals ');
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (3, 'Athletic','Athletic');
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (4, 'Pumps','Pumps');


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists Product;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE Product (
	productID INT NOT NULL AUTO_INCREMENT,
    productName varchar(255) NOT NULL,
    productDescription varchar(255) NOT NULL,
	productImage text NOT NULL,
	productPrice double NOT NULL,
    PRIMARY KEY (productID)
)ENGINE=INNODB;
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (1, 'VOLATILE','Brogan', 'http://a1.zassets.com/images/z/3/5/7/3/6/7/3573679-p-LARGE_SEARCH.jpg', 75);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (2, 'Ryka','Aurora', 'http://a2.zassets.com/images/z/3/6/1/8/0/6/3618067-p-LARGE_SEARCH.jpg', 69.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (3, 'Bearpaw','Emma Short', 'http://a2.zassets.com/images/z/3/7/0/3/2/7/3703271-p-LARGE_SEARCH.jpg', 79.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (4, 'Bearpaw','Boshie', 'http://a2.zassets.com/images/z/3/7/1/4/6/0/3714603-p-LARGE_SEARCH.jpg', 89.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (5, 'Rocket Dog','Halifax', 'http://a1.zassets.com/images/z/3/7/3/0/7/0/3730701-p-LARGE_SEARCH.jpg', 64.95);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (6, 'G by GUESS','Hurdle Wide Calf', 'http://a2.zassets.com/images/z/3/8/2/1/8/4/3821842-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (7, 'COACH','Sullivan', 'http://a3.zassets.com/images/z/3/9/1/4/1/2/3914121-p-LARGE_SEARCH.jpg', 395.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (8, 'GUESS','Gabriele', 'http://a2.zassets.com/images/z/3/9/2/7/9/4/3927946-p-LARGE_SEARCH.jpg', 110.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (9, 'Fergalicious','Candace', 'http://a1.zassets.com/images/z/3/8/6/7/7/1/3867715-p-LARGE_SEARCH.jpg', 44.95);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (10, 'Fergalicious','Candace', 'http://a1.zassets.com/images/z/3/8/6/7/7/1/3867716-p-LARGE_SEARCH.jpg', 44.95);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (11, 'MICHAEL Michael Kors','MK Plate Jelly', 'http://a3.zassets.com/images/z/3/9/0/5/5/4/3905544-p-LARGE_SEARCH.jpg', 49.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (12, 'J. Renee','Hillrise', 'http://a2.zassets.com/images/z/3/6/7/9/6/2/3679623-p-LARGE_SEARCH.jpg', 99.95);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (13, 'J. Renee','Hillrise', 'http://a3.zassets.com/images/z/3/8/8/3/6/1/3883619-p-LARGE_SEARCH.jpg', 99.95);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (14, 'Tommy Hilfiger','Chuck', 'http://a3.zassets.com/images/z/3/8/4/8/8/7/3848875-p-LARGE_SEARCH.jpg', 29.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (15, 'Kate Spade New York','Nova', 'http://a3.zassets.com/images/z/3/9/0/9/8/1/3909815-p-LARGE_SEARCH.jpg', 48.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (16, 'Sam Edelman','Monica', 'http://a3.zassets.com/images/z/3/9/2/2/2/4/3922240-p-LARGE_SEARCH.jpg', 24.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (17, 'SKECHERS','OG 90', 'http://a2.zassets.com/images/z/3/7/2/5/4/9/3725494-p-LARGE_SEARCH.jpg', 65.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (18, 'SKECHERS','OG 90', 'http://a3.zassets.com/images/z/3/7/2/5/4/9/3725496-p-LARGE_SEARCH.jpg', 69.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (19, 'SKECHERS','Microburst - One-Up', 'http://a2.zassets.com/images/z/3/7/2/5/5/5/3725552-p-LARGE_SEARCH.jpg', 55.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (20, 'SKECHERS','EZ Flex 3.0 - Serene Scene', 'http://a3.zassets.com/images/z/3/7/2/5/5/8/3725584-p-LARGE_SEARCH.jpg', 55.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (21, 'SKECHERS','Microburst - All-Mine', 'http://a2.zassets.com/images/z/3/7/2/5/5/9/3725592-p-LARGE_SEARCH.jpg', 55.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (22, 'SKECHERS','Microburst - All-Mine', 'http://a2.zassets.com/images/z/3/7/2/5/5/9/3725593-p-LARGE_SEARCH.jpg', 55.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (23, 'SKECHERS','Microburst - All-Mine', 'http://a1.zassets.com/images/z/3/7/2/5/5/9/3725594-p-LARGE_SEARCH.jpg', 55.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (24, 'SKECHERS','Flex Appeal 2.0 - Bright Side', 'http://a2.zassets.com/images/z/3/8/4/0/5/6/3840568-p-LARGE_SEARCH.jpg', 65.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (25, 'Nine West','Emergencee', 'http://a3.zassets.com/images/z/3/9/0/7/5/8/3907584-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (26, 'Nine West','Emergencee', 'http://a2.zassets.com/images/z/3/9/0/7/5/8/3907585-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (27, 'Nine West','Fabrice', 'http://a3.zassets.com/images/z/3/9/0/7/5/8/3907587-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (28, 'Nine West','Kelda', 'http://a1.zassets.com/images/z/3/9/0/7/5/9/3907590-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (29, 'Nine West','Xrazy', 'http://a1.zassets.com/images/z/3/9/0/7/6/1/3907610-p-LARGE_SEARCH.jpg', 79.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (30, 'Nine West','Eastlyn', 'http://a3.zassets.com/images/z/3/9/0/8/6/5/3908653-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (31, 'GUESS','Leonie', 'http://a1.zassets.com/images/z/3/9/1/7/9/3/3917939-p-LARGE_SEARCH.jpg', 89.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (32, 'GUESS','Leonie', 'http://a3.zassets.com/images/z/3/9/1/7/9/4/3917940-p-LARGE_SEARCH.jpg', 89.00);


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists ProductCategoryProduct;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE ProductCategoryProduct (
    ID INT NOT NULL AUTO_INCREMENT,
	productID INT NOT NULL,
	productCategoryID INT NOT NULL,
	PRIMARY KEY (ID),
	INDEX (productCategoryID),
	INDEX (productID),
  	FOREIGN KEY (productCategoryID)
      REFERENCES ProductCategory(productCategoryID)
      ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (productID)
      REFERENCES Product(productID)
      ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (1,1,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (2,2,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (3,3,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (4,4,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (5,5,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (6,6,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (7,7,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (8,8,1);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (9,9,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (10,10,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (11,11,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (12,12,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (13,13,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (14,14,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (15,15,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (16,16,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (17,8,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (18,1,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (19,2,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (20,3,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (21,4,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (22,5,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (23,6,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (24,7,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (25,8,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (26,9,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (27,10,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (28,11,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (29,12,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (30,13,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (31,14,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (32,15,4);


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists SpecialSales;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE SpecialSales (
    spacialSalesID INT NOT NULL AUTO_INCREMENT,
	productID INT NOT NULL,
	startDate DATE NOT NULL,
    endDate DATE NOT NULL,
	salesPrice double NOT NULL,
    PRIMARY KEY (spacialSalesID),
	INDEX (productID),
	FOREIGN KEY (productID)
      REFERENCES Product(productID)
      ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;
INSERT INTO SpecialSales
(spacialSalesID, productID,	startDate, endDate, salesPrice)
VALUES (1,9,'2015-07-07', '2016-12-31', 38.00);
INSERT INTO SpecialSales
(spacialSalesID, productID,	startDate, endDate, salesPrice)
VALUES (2,6,'2015-06-03', '2017-12-31', 50.00);


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists Customer;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE Customer (
	customerID INT NOT NULL AUTO_INCREMENT,	
    customerFirstname varchar(255) NOT NULL,
    customerLastname varchar(255) NOT NULL,	
	customerAddress varchar(255) NOT NULL,
	customerCreditcard varchar(255) NOT NULL,
	customerSecuritycode varchar(255) NOT NULL,
	customerexpirationDate DATE NOT NULL,
	customerBillingAddress varchar(255) NOT NULL,
	customerUsername varchar(255) NOT NULL,
    customerPassword varchar(255) NOT NULL,	
    PRIMARY KEY (customerID)
)ENGINE=INNODB;


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists ShoppingCart;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE ShoppingCart (
	cartID INT NOT NULL AUTO_INCREMENT,	
    productID INT NOT NULL,
    quantity INT NOT NULL,	
	productPrice double NOT NULL,
	productSalesPrice double,
	productSalesOrNot varchar(255) NOT NULL,
	customerID INT NOT NULL,
    PRIMARY KEY (cartID),
   INDEX (customerID),
  FOREIGN KEY (customerID)
      REFERENCES Customer(customerID)
      ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists Orders;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE Orders (
    orderID INT NOT NULL AUTO_INCREMENT,		
	orderDate DATE NOT NULL,
	customerID INT NOT NULL,
	customerFirstname varchar(255) NOT NULL,
    customerLastname varchar(255) NOT NULL,
	customerAddress varchar(255) NOT NULL,
	customerCreditcard varchar(255) NOT NULL,
	customerSecuritycode varchar(255) NOT NULL,
	customerexpirationDate DATE NOT NULL,
	customerBillingAddress varchar(255) NOT NULL,
    PRIMARY KEY (orderID),
	INDEX (customerID),
	FOREIGN KEY (customerID)
      REFERENCES Customer(customerID)
      ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;


SET FOREIGN_KEY_CHECKS = 0;
drop table if exists OrderItems;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE OrderItems (
	ID INT NOT NULL AUTO_INCREMENT,	
    orderID INT NOT NULL,
	productID INT NOT NULL,
	quantity INT NOT NULL,	
	productPrice double NOT NULL,
	productSalesPrice double,
	productSalesOrNot INT NOT NULL,
    PRIMARY KEY (ID),
	INDEX (orderID),
	FOREIGN KEY (orderID)
      REFERENCES Orders(orderID)
      ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;


-- SET FOREIGN_KEY_CHECKS = 0;
-- drop table if exists ci_sessions;
-- SET FOREIGN_KEY_CHECKS = 1;
-- CREATE TABLE IF NOT EXISTS  `ci_sessions` (
--     id varchar(40) DEFAULT '0' NOT NULL,
--     ip_address varchar(45) DEFAULT '0' NOT NULL,
--     user_agent varchar(120) NOT NULL,
--     last_activity int(10) unsigned DEFAULT 0 NOT NULL,
--     timestamp TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6),
--     data text NOT NULL,
--     PRIMARY KEY (id),
--     KEY `last_activity_idx` (`last_activity`)
-- );
