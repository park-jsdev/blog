CREATE  TABLE IF NOT EXISTS `feed` (
  `id` INT(10) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `url` VARCHAR(255) NOT NULL ,
  `last_access` INT(10) NOT NULL ,
  `frequency` INT(5) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `url_UNIQUE` (`url` ASC) )
ENGINE = MyISAM
 
CREATE  TABLE IF NOT EXISTS `article` (
  `id` INT(10) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `content` TEXT NOT NULL ,
  `url` VARCHAR(255) NOT NULL ,
  `pub_date` INT(10) NOT NULL ,
  `insert_date` INT(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `url_UNIQUE` (`url` ASC) )
ENGINE = MyISAM;