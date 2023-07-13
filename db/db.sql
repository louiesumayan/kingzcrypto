CREATE TABLE `u266886950_coins`.`user` (
    `id` INT NOT NULL , 
    `name` INT NOT NULL ,
    `email` INT NOT NULL ,
    `password` INT NOT NULL ,
    `reg_date` INT NOT NULL ,
    `auth` INT NOT NULL 
    ) ENGINE = InnoDB;


CREATE TABLE `u266886950_coins`.`coins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `logo` VARCHAR(255) NULL,
  `name` VARCHAR(255) NULL,
  `symbol` VARCHAR(255) NULL,
  `networkchain` VARCHAR(255) NULL,
  `ppresale` VARCHAR(255) NULL,
  `contractaddr` VARCHAR(255) NULL,
  `desc` VARCHAR(255) NULL,
  `ldate` VARCHAR(255) NULL,
  `customchartlink` VARCHAR(255) NULL,
  `customswaplink` VARCHAR(255) NULL,
  `wlink` VARCHAR(255) NULL,
  `tlink` VARCHAR(255) NULL,
  `dlink` VARCHAR(255) NULL,
  `whlink` VARCHAR(255) NULL,
  `cemail` VARCHAR(255) NULL,
  `ctelegram` VARCHAR(255) NULL,
  `status` VARCHAR(45) NULL,
  `reg_date` TIMESTAMP NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`));


  CREATE TABLE `u266886950_coins`.`boosts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `package` VARCHAR(255) NULL,
  `boost` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  `uid` VARCHAR(45) NULL,
  `reg_date` VARCHAR(45) NULL DEFAULT 'current_timestamp()',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);