<?php

$conf = [
    'hostname' => 'mysql',
    'username' => 'root',
    'password' => 'root',
    'database' => 'HW_8',
    'port' => '3306',
];

return $conf;

/*
 * создание таблицы Product "CREATE TABLE `HW_8`.`Products` ( `id` INT NOT NULL AUTO_INCREMENT , `api_id` INT NULL , `title` VARCHAR(254) NOT NULL , `price` DECIMAL(10,2) NULL , `description` TEXT NULL , `image` VARCHAR(254) NULL , PRIMARY KEY (`id`), UNIQUE `api_id` (`api_id`)) ENGINE = InnoDB;"
 */