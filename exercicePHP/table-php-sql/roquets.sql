
SELECT DISTINCT `user`.`name`, `product`.`name` FROM product JOIN order_has_product ON idProduct = order_has_product.Product_idProduct JOIN `order` ON idOrder = order_has_product.Order_idOrder JOIN `User` ON idUser = `Order`.User_idUser WHERE `product`.`name` LIKE "Gourde" 



SELECT `user`.`name`, `idOrder` as `Numéro de commande`,`date`, `product`.`name`, `product`.`price`/ 1.196 as Prix FROM product JOIN order_has_product ON idProduct = order_has_product.Product_idProduct JOIN `order` ON idOrder = order_has_product.Order_idOrder JOIN `User` ON idUser = `Order`.User_idUser WHERE `idOrder` = 13 


SELECT `order`.`idOrder`, sum(price/ 1.196) as Total FROM product JOIN order_has_product ON idProduct = order_has_product.Product_idProduct JOIN `order` ON idOrder = order_has_product.Order_idOrder JOIN `User` ON idUser = `Order`.User_idUser GROUP by Order_idorder LIMIT 5 



SELECT `user`.`name`, `order`.`idOrder`,`date`, sum(price/ 1.196) as total FROM product JOIN order_has_product ON idProduct = order_has_product.Product_idProduct JOIN `order` ON idOrder = order_has_product.Order_idOrder JOIN `User` ON idUser = `Order`.User_idUser WHERE idOrder = 13 


SELECT idOrder, name, date FROM `order` join User ON User.idUser= User_idUser WHERE idUser = 1 




-- 1) afficher tous les clients .
SELECT * FROM `customers` ;

--2) afficher le nom et la ville de tous les clients .
SELECT ContactName , city FROM `customers` WHERE 1; 

--3) afficher les pays des clients .
SELECT Country FROM `customers`;
-- pour eviter les doublons il faut utiliser distinct
SELECT distinct Country FROM `customers`;

-- pour trier les pays par ordre alphabétique on rajoute order by .

SELECT distinct Country FROM `customers` ORDER BY Country;

-- d'autres formes 
SELECT distinct Country FROM `customers` ORDER BY Country asc;
SELECT distinct Country FROM `customers` ORDER BY 1;

-- on peut aussi enlever les ``
SELECT distinct Country FROM customers ORDER BY 1;



--4) nombre de clients total , en france , export .
SELECT count(CustomerID) FROM `customers`;

-- nombre de pays 
SELECT count(distinct Country) FROM `customers`;
-- nombre de clients  en france
SELECT count(*) FROM `customers` WHERE country like 'France';
-- nombre des clients export 
SELECT count(distinct Country) - (SELECT count(*) FROM `customers` WHERE country like 'France') FROM `customers`;

--5) afficher les clients du mexique  
SELECT * FROM `customers` WHERE country like 'Mexico';

--6) quel est le nom du client d'ID 17
SELECT Customername FROM Customers where CustomerID like 17;

--7) les allemands qui habitent Berlin (id et nom)
SELECT * FROM `customers` WHERE city like 'Berlin' and country like 'Germany';
-- id et nom 
SELECT customerID ,CustomerName FROM `customers` WHERE city like 'Berlin' and country like 'Germany';

--8) les français du nord-est 
SELECT * FROM `customers` WHERE City like 'Strasbourg' OR city like 'Reims';

--9) trouver les clients qui n'ont pas d'adresse 

SELECT count(*) FROM `customers` WHERE Address is NULL;