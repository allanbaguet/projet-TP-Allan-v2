CREATE DATABASE IF NOT EXISTS `Dofus_Universe` CHARACTER SET 'utf8';

USE `Dofus_Universe`;

DROP TABLE IF EXISTS `users`, `guides`, `dungeons`, `contents_guides`, `contents_dungeons`, `commentaries`;


CREATE TABLE users(
    `id_users` INT AUTO_INCREMENT,
    `username` VARCHAR(50)  NOT NULL,
    `mail` VARCHAR(255)  NOT NULL,
    `password` VARCHAR(50)  NOT NULL,
    `picture` VARCHAR(50) ,
    `role` BOOLEAN ,
    `added_at` DATETIME,
    `confirmed_at` DATETIME,
    `deleted_at` DATETIME,
    PRIMARY KEY(`id_users`)
);

CREATE TABLE guides(
    `id_guides` INT AUTO_INCREMENT,
    `main_title` VARCHAR(100)  NOT NULL,
    `main_text` VARCHAR(255)  NOT NULL,
    `posted_at` DATETIME,
    `modified_at` DATETIME,
    `id_users` INT NOT NULL,
    PRIMARY KEY(`id_guides`),
    FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)
);

CREATE TABLE dungeons(
    `id_dungeons` INT AUTO_INCREMENT,
    `title` VARCHAR(100)  NOT NULL,
    `posted_at` DATETIME,
    `modified_at` DATETIME,
    `id_users` INT NOT NULL,
    PRIMARY KEY(`id_dungeons`),
    FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)
);

CREATE TABLE contents_guides(
    `id_contents` INT AUTO_INCREMENT,
    `sub_title` VARCHAR(100) ,
    `picture` VARCHAR(50) ,
    `sub_text` VARCHAR(255) ,
    `id_guides` INT NOT NULL,
    PRIMARY KEY(`id_contents`),
    FOREIGN KEY(`id_guides`) REFERENCES `guides`(`id_guides`)
);

CREATE TABLE contents_dungeons(
    `id_contents` INT AUTO_INCREMENT,
    `picture` VARCHAR(50) ,
    `text` VARCHAR(255) ,
    `id_dungeons` INT NOT NULL,
    PRIMARY KEY(`id_contents`),
    FOREIGN KEY(`id_dungeons`) REFERENCES `dungeons`(`id_dungeons`)
);

CREATE TABLE commentaries(
    `id_comments` INT AUTO_INCREMENT,
    `text` VARCHAR(255)  NOT NULL,
    `posted_at` DATETIME,
    `modified_at` DATETIME,
    `deleted_at` DATETIME,
    `confirmed_at` DATETIME,
    `id_guides` INT,
    `id_dungeons` INT,
    `id_users` INT NOT NULL,
    PRIMARY KEY(`id_comments`),
    FOREIGN KEY(`id_guides`) REFERENCES `guides`(`id_guides`) ON DELETE CASCADE,
    FOREIGN KEY(`id_dungeons`) REFERENCES `dungeons`(`id_dungeons`) ON DELETE CASCADE,
    FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)
);
