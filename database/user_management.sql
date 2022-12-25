CREATE database user_management;
CREATE TABLE `user_management`.`user` (
     `id` INT NOT NULL AUTO_INCREMENT , 
     `name` VARCHAR(50) NOT NULL , 
     `address` VARCHAR(100) NOT NULL , 
     `sex` ENUM('homme','femme') ,
     `phone` INT NOT NULL ,
     `email` VARCHAR(100) NOT NULL , 
     `password` INT NOT NULL ,
      PRIMARY KEY (`id`))
         ENGINE = InnoDB;

 INSERT INTO `user` (`id`, `name`, `address`, `sex`, `phone`, `email`, `password`)
  VALUES (NULL, 'Nouhaila', 'Casablanca, sidi othmane', 'femme', '0684763802', 'n.ohapoune@mundiapolis.ma', '070100');  

INSERT INTO `user` (`id`, `name`, `address`, `sex`, `phone`, `email`, `password`) 
 VALUES (NULL, 'Omar', 'Casablanca, maarif', 'homme', '0612121212', 'o.kalili@mundiapolis.ma', '98765');   

CREATE TABLE `user_management`.`article` (
     `article_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     `article_name` VARCHAR(50) NOT NULL , 
     `photo` VARCHAR(255) NOT NULL ,
     `price` INT NOT NULL ,
      );

INSERT INTO `article` (`article_id`, `article_name`,`photo`, `price`) 
 VALUES (NULL,'montre','montre.jpg' , 2000);

CREATE TABLE `user_management`.`detailvente` (
     `detail_id` int(11) PRIMARY KEY REFERENCES article(`article_id`),
     `name` VARCHAR(50) NOT NULL , 
     `quantity` INT NOT NULL ,
     `price` INT NOT NULL ,
     `total` INT NOT NULL ,
     `idSeller` int(11) NOT NULL REFERENCES user(`id`)
      );

CREATE TABLE `user_management`.`vente` (
     `vente_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT , 
     `nom` varchar(256) NOT NULL,
     `price` varchar(11) NOT NULL,
     `quantity` varchar(11) NOT NULL,
     `total` varchar(11) NOT NULL,
     `dateVente` DATE NOT NULL,
     `client` varchar(11) NOT NULL,
     `idSeller` int(11) REFERENCES article(`article_id`),
      );     
