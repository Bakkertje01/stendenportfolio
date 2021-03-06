-- MySQL Script generated by MySQL Workbench
-- Tue Jun 27 11:02:17 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema portfolio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema portfolio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 ;
USE `portfolio` ;

-- -----------------------------------------------------
-- Table `portfolio`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`User` (
  `Gebruiker_ID` INT NOT NULL AUTO_INCREMENT,
  `Voornaam` VARCHAR(45) NOT NULL,
  `Achternaam` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(155) NOT NULL,
  `Wachtwoord` VARCHAR(256) NOT NULL,
  `Studentnr` INT(6) NULL DEFAULT NULL,
  `Verified` TINYINT NULL DEFAULT NULL,
  `Type` VARCHAR(45) NOT NULL,
  `Img_path` VARCHAR(200) NULL DEFAULT 'images/default',
  `Color_path` VARCHAR(200) NULL DEFAULT NULL,
  `Quote` VARCHAR(200) NULL DEFAULT 'Standaard text',
  `Indeling` VARCHAR(10) NULL,
  `Toegang_gast` VARCHAR(200) NULL,
  PRIMARY KEY (`Gebruiker_ID`),
  UNIQUE INDEX `Gebruiker_ID_UNIQUE` (`Gebruiker_ID` ASC),
  UNIQUE INDEX `Student_nr._UNIQUE` (`Studentnr` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio`.`Bericht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`Bericht` (
  `Bericht_ID` INT NOT NULL AUTO_INCREMENT,
  `Datum_tijd` DATETIME NOT NULL,
  `Bericht` VARCHAR(500) NOT NULL,
  `Gebruiker_ID` INT NOT NULL,
  `Portfolio_ID` INT NOT NULL,
  PRIMARY KEY (`Bericht_ID`),
  INDEX `fk_Bericht_User1_idx` (`Gebruiker_ID` ASC),
  CONSTRAINT `fk_Bericht_User1`
    FOREIGN KEY (`Gebruiker_ID`)
    REFERENCES `portfolio`.`User` (`Gebruiker_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portfolio`.`Files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`Files` (
  `File_ID` INT NOT NULL AUTO_INCREMENT,
  `Files_path` VARCHAR(500) NULL DEFAULT NULL,
  `Gebruiker_ID` INT NOT NULL,
  `Filetype` VARCHAR(15) NULL,
  `Verified` INT(1) NULL DEFAULT 0,
  `Description` VARCHAR(100) NULL,
  `Filename` VARCHAR(200) NULL,
  UNIQUE INDEX `Information_ID_UNIQUE` (`File_ID` ASC),
  PRIMARY KEY (`File_ID`),
  INDEX `fk_Files_User1_idx` (`Gebruiker_ID` ASC),
  CONSTRAINT `fk_Files_User1`
    FOREIGN KEY (`Gebruiker_ID`)
    REFERENCES `portfolio`.`User` (`Gebruiker_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '			';


-- -----------------------------------------------------
-- Table `portfolio`.`Contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `portfolio`.`Contact` (
  `Contactg_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Voornaam` VARCHAR(20) NOT NULL,
  `Achternaam` VARCHAR(20) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Onderwerp` VARCHAR(50) NOT NULL,
  `Bericht` VARCHAR(500) NOT NULL,
  `Datum` DATETIME NOT NULL,
  PRIMARY KEY (`Contactg_ID`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
