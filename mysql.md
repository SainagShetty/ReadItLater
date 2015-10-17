create database `login`;

use databse `login`;

CREATE TABLE `login`.`members` ( `id` INT(4) NOT NULL AUTO_INCREMENT , `username` VARCHAR(65) NOT NULL , `password` VARCHAR(65) NOT NULL , `email` VARCHAR(65) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `login`.`articles` ( `aid` INT(20) NOT NULL AUTO_INCREMENT , `id` INT(4) NOT NULL , `ourl` VARCHAR(200) NOT NULL , `imgurl` VARCHAR(200) NOT NULL DEFAULT ' ' , `title` VARCHAR(300) NOT NULL DEFAULT ' ' , `imgpth` VARCHAR(200) NOT NULL DEFAULT 'NO' , `author` VARCHAR(100) NOT NULL DEFAULT ' ' , `textpth` VARCHAR(50) NOT NULL DEFAULT ' ' , `place` INT(1) NOT NULL , PRIMARY KEY (`aid`)) ENGINE = InnoDB;