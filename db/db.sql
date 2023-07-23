CREATE TABLE `u266886950_coins`.`user` (
    `id` INT NOT NULL , 
    `name` INT NOT NULL ,
    `email` INT NOT NULL ,
    `password` INT NOT NULL ,
    `reg_date` INT NOT NULL ,
    `auth` INT NOT NULL 
    ) ENGINE = InnoDB;


CREATE TABLE `coins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `presale` varchar(255) DEFAULT NULL,
  `fairlaunch` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `cap_network` varchar(255) DEFAULT NULL,
  `hardcap` varchar(255) DEFAULT NULL,
  `customswaplink` varchar(255) DEFAULT NULL,
  `presale_start_month` varchar(255) DEFAULT NULL,
  `presale_start_year` varchar(255) DEFAULT NULL,
  `presale_end_day` varchar(255) DEFAULT NULL,
  `presale_end_year` varchar(255) DEFAULT NULL,
  `bsc_contract_address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `launch_date` varchar(255) DEFAULT NULL,
  `date_created_day` varchar(255) DEFAULT NULL,
  `date_created_month` varchar(255) DEFAULT NULL,
  `date_created_year` varchar(255) DEFAULT NULL,
  `custom_dex_link` varchar(255) DEFAULT NULL,
  `custom_swap_link` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `telegram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `discord_link` varchar(255) DEFAULT NULL,
  `whitepaper_link` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_telegram` varchar(255) DEFAULT NULL,
  `terms` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `vote` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



  CREATE TABLE `u266886950_coins`.`boosts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `package` VARCHAR(255) NULL,
  `boost` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  `uid` VARCHAR(45) NULL,
  `reg_date` VARCHAR(45) NULL DEFAULT 'current_timestamp()',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) 
  );



  CREATE TABLE `u266886950_coins`.`boosts_list` (
  `id` INTboosts_list NOT NULL AUTO_INCREMENT,
  `package` INT NULL,
  `boosts` INT NULL,
  `price` INT NULL,
  `bonus` INT NULL,
  `reg_date` DATETIME NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`id`)
);

CREATE TABLE `buy_boosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(45) DEFAULT NULL,
  `totalboosts` varchar(45) DEFAULT NULL,
  `totalprice` varchar(45) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `userid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `u266886950_coins`.`ads_list` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `desc` TEXT NULL,
  `price` VARCHAR(45) NULL,
  `pos_image` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)
  );



CREATE TABLE `u266886950_coins`.`buy_ads` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dates_banners` TEXT NULL,
  `dates_promoted` TEXT NULL,
  `dates_premium` TEXT NULL,
  `dates_search` TEXT NULL,
  `status` VARCHAR(45) NULL,
  `userid` VARCHAR(25) NULL,
  `reg_date` TIMESTAMP NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) );

  CREATE TABLE `u266886950_coins`.`buy_ads_one` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ads` VARCHAR(255) NULL,
  `date` TEXT NULL,
  `price` VARCHAR(45) NULL,
  `userid` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `reg_date` TIMESTAMP NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) );



CREATE TABLE `u266886950_coins`.`voteduser` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `coin_id` VARCHAR(45) NULL,
  `user_id` VARCHAR(45) NULL,
  `reg_date` TIMESTAMP NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) );
