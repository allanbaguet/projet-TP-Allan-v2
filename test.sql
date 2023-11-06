CREATE DATABASE IF NOT EXISTS `Dofus_Universe` CHARACTER SET 'utf8';

USE `Dofus_Universe`;

DROP TABLE IF EXISTS `users`, `guides`, `dungeons`, `commentaries`;


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
    `sub_title_1` VARCHAR(50)  NOT NULL,
    `sub_text` VARCHAR(255)  NOT NULL,
    `picture_tier_list` VARCHAR(50)  NOT NULL,
    `title_card_1` VARCHAR(50)  NOT NULL,
    `picture_card_1` VARCHAR(50)  NOT NULL,
    `text_card_1` VARCHAR(255)  NOT NULL,
    `title_card_2` VARCHAR(50)  NOT NULL,
    `picture_card_2` VARCHAR(50)  NOT NULL,
    `text_card_2` VARCHAR(255)  NOT NULL,
    `title_card_3` VARCHAR(50)  NOT NULL,
    `picture_card_3` VARCHAR(50)  NOT NULL,
    `text_card_3` VARCHAR(255)  NOT NULL,
    `posted_at` DATETIME,
    `modified_at` DATETIME,
    `id_users` INT NOT NULL,
    PRIMARY KEY(`id_guides`),
    FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)
);

CREATE TABLE dungeons(
   `id_dungeons` INT AUTO_INCREMENT,
   `main_title` VARCHAR(100)  NOT NULL,
   `picture_zone` VARCHAR(50)  NOT NULL,
   `picture_key` VARCHAR(50)  NOT NULL,
   `picture_pnj` VARCHAR(50)  NOT NULL,
   `picture_card_mob_1` VARCHAR(50)  NOT NULL,
   `text_card_mob_1` VARCHAR(255)  NOT NULL,
   `picture_card_mob_2` VARCHAR(50)  NOT NULL,
   `text_card_mob_2` VARCHAR(255)  NOT NULL,
   `picture_card_mob_3` VARCHAR(50)  NOT NULL,
   `text_card_mob_3` VARCHAR(255)  NOT NULL,
   `picture_card_mob_4` VARCHAR(50)  NOT NULL,
   `text_card_mob_4` VARCHAR(255)  NOT NULL,
   `picture_card_mob_5` VARCHAR(50)  NOT NULL,
   `text_card_mob_5` VARCHAR(255)  NOT NULL,
   `title_card_room_1` VARCHAR(50)  NOT NULL,
   `picture_card_room_1` VARCHAR(50)  NOT NULL,
   `title_card_room_2` VARCHAR(50) ,
   `picture_card_room_2` VARCHAR(50)  NOT NULL,
   `title_card_room_3` VARCHAR(50)  NOT NULL,
   `picture_card_room_3` VARCHAR(50)  NOT NULL,
   `title_card_room_4` VARCHAR(50)  NOT NULL,
   `picture_card_room_4` VARCHAR(50)  NOT NULL,
   `title_card_room_boss` VARCHAR(50)  NOT NULL,
   `picture_card_room_boss` VARCHAR(50)  NOT NULL,
   `picture_card_boss` VARCHAR(50)  NOT NULL,
   `text_card_boss` VARCHAR(255)  NOT NULL,
   `posted_at` DATETIME,
   `modified_at` DATETIME,
   `id_users` INT NOT NULL,
   PRIMARY KEY(`id_dungeons`),
   FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)
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