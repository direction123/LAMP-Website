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
VALUES (1, 'Games','Games');
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (2, 'Health','Health');
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (3, 'Music','Music');
INSERT INTO ProductCategory
(productCategoryID, productCategoryName, productCategoryDescription)
VALUES (4, 'News','News');


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
VALUES (1, 'Frogger','Frogger', 'https://upload.wikimedia.org/wikipedia/en/2/21/Frogger_1_xbla_cover.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (2, 'Tetris','Tetris', 'https://upload.wikimedia.org/wikipedia/en/8/8d/NES_Tetris_Box_Front.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (3, 'Tank','Tank', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/ec/Tank_%28arcade_game%29.jpg/220px-Tank_%28arcade_game%29.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (4, 'Bubble Bobble','Bubble Bobble', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/ed/Bubble_bobble.jpg/256px-Bubble_bobble.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (5, 'Nike+','Nike+', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/200px-Logo_NIKE.svg.png', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (6, 'Personal Trainer','Personal Trainer', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Personal_trainer_showing_a_client_how_to_exercise_the_right_way_and_educating_them_along_the_way.jpg/250px-Personal_trainer_showing_a_client_how_to_exercise_the_right_way_and_educating_them_along_the_way.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (7, 'Weight Management','Weight Management', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Apples.jpg/220px-Apples.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (8, 'Women Sports','Women Sports', 'https://upload.wikimedia.org/wikipedia/en/a/a7/WomenSports_April_1976_cover.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (9, 'Trailer','Trailer', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Aldrich_Attack_movie_trailer_screenshot_%285%29.jpg/220px-Aldrich_Attack_movie_trailer_screenshot_%285%29.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (10, 'Live Nation Entertainment','Live Nation Entertainment', 'https://upload.wikimedia.org/wikipedia/en/thumb/6/62/Live_Nation_Ent.png/240px-Live_Nation_Ent.png', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (11, 'DJ mix','DJ mix', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/DJM_350.jpg/170px-DJM_350.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (12, 'Acoustic Guitar','Acoustic Guitar', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Gibson_SJ200.jpg/200px-Gibson_SJ200.jpg', 0.99);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (13, 'BBC News','BBC News', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/ff/BBC_News.svg/200px-BBC_News.svg.png', 0.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (14, 'NPR','NPR', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/National_Public_Radio_logo.svg/159px-National_Public_Radio_logo.svg.png', 0.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (15, 'Fox News Channel','Fox News Channel', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Fox_News_Channel_logo.png/200px-Fox_News_Channel_logo.png', 0.00);
INSERT INTO Product
(productID, productName, productDescription, productImage, productPrice)
VALUES (16, 'The New York Times','The New York Times', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/New_York_Times_Frontpage_1914-07-29.png/220px-New_York_Times_Frontpage_1914-07-29.png', 0.00);


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
VALUES (5,5,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (6,6,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (7,7,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (8,8,2);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (9,9,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (10,10,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (11,11,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (12,12,3);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (13,13,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (14,14,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (15,15,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (16,16,4);
INSERT INTO ProductCategoryProduct
(ID, productID, productCategoryID)
VALUES (17,8,4);


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
VALUES (1,9,'2015-07-07', '2015-12-31', 0.3);
INSERT INTO SpecialSales
(spacialSalesID, productID,	startDate, endDate, salesPrice)
VALUES (2,6,'2015-06-03', '2015-12-31', 0.2);


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
