-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ecrowd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecrowd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecrowd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ecrowd` ;

-- -----------------------------------------------------
-- Table `ecrowd`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`user` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NULL,
  `prenom` VARCHAR(50) NULL,
  `email` VARCHAR(100) NULL,
  `mot_de_passe` VARCHAR(45) NULL,
  `ville` VARCHAR(45) NULL,
  `telephone` INT NULL,
  `profil` VARCHAR(45) NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecrowd`.`PROJET`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`PROJET` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`PROJET` (
  `id_projets` INT NOT NULL AUTO_INCREMENT,
  `dateProjet` DATE NULL,
  `typeProjet` SET('developpement', 'graphisme') NULL COMMENT 'cardinalité : 0,n à 0,n\n\non  rajoutera la clé  de l\'entité de  DEVELOPPEMENT à l\'entité USERS',
  `detailProjet` LONGTEXT NULL,
  `disponibilite` DATE NULL,
  `profil_search` SET('developpeur', 'graphiste') NULL,
  PRIMARY KEY (`id_projets`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecrowd`.`EVENTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`EVENTS` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`EVENTS` (
  `id_events` INT NOT NULL AUTO_INCREMENT,
  `eventNom` VARCHAR(45) NULL,
  `eventDetail` LONGTEXT NULL,
  `eventDate` DATE NULL,
  `participants` VARCHAR(45) NULL,
  PRIMARY KEY (`id_events`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecrowd`.`PORTFOLIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`PORTFOLIO` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`PORTFOLIO` (
  `id_portfolio` INT NOT NULL AUTO_INCREMENT,
  `makingNom` VARCHAR(45) NULL,
  `makingDetails` LONGTEXT NULL,
  `makingDate` DATE NULL,
  `makingLiens` VARCHAR(100) NULL,
  PRIMARY KEY (`id_portfolio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecrowd`.`competence`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`competence` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`competence` (
  `id_competence` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id_competence`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecrowd`.`user_competence`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`user_competence` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`user_competence` (
  `id_user` INT NOT NULL,
  `id_competence` INT NOT NULL,
  `niveau` INT NULL,
  `maj` DATETIME NULL,
  PRIMARY KEY (`id_user`, `id_competence`),
  INDEX `fk_USERS_has_competence_competence1_idx` (`id_competence` ASC),
  INDEX `fk_USERS_has_competence_USERS_idx` (`id_user` ASC),
  CONSTRAINT `fk_USERS_has_competence_USERS`
    FOREIGN KEY (`id_user`)
    REFERENCES `ecrowd`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USERS_has_competence_competence1`
    FOREIGN KEY (`id_competence`)
    REFERENCES `ecrowd`.`competence` (`id_competence`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecrowd`.`user_portofolio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecrowd`.`user_portofolio` ;

CREATE TABLE IF NOT EXISTS `ecrowd`.`user_portofolio` (
  `id_user` INT NOT NULL,
  `id_portfolio` INT NOT NULL,
  `ordre` INT NULL,
  PRIMARY KEY (`id_user`, `id_portfolio`),
  INDEX `fk_user_has_PORTFOLIO_PORTFOLIO1_idx` (`id_portfolio` ASC),
  INDEX `fk_user_has_PORTFOLIO_user1_idx` (`id_user` ASC),
  CONSTRAINT `fk_user_has_PORTFOLIO_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `ecrowd`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_PORTFOLIO_PORTFOLIO1`
    FOREIGN KEY (`id_portfolio`)
    REFERENCES `ecrowd`.`PORTFOLIO` (`id_portfolio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
