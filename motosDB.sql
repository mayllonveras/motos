-- MySQL Script generated by MySQL Workbench
-- Tue May 24 10:53:34 2016
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema motos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema motos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `motos` DEFAULT CHARACTER SET utf8 ;
USE `motos` ;

-- -----------------------------------------------------
-- Table `motos`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`marcas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `motos`.`modelos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`modelos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marca_id` INT NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_modelos_marcas_idx` (`marca_id` ASC),
  CONSTRAINT `fk_modelos_marcas`
    FOREIGN KEY (`marca_id`)
    REFERENCES `motos`.`marcas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `motos`.`motos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`motos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modelo_id` INT NOT NULL,
  `ano_fabricação` INT NOT NULL,
  `ano_modelo` INT NOT NULL,
  `placa` VARCHAR(8) NOT NULL,
  `renavam` VARCHAR(45) NULL,
  `cor` VARCHAR(45) NOT NULL,
  `valor_proposto` REAL(8,2) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_motos_modelos1_idx` (`modelo_id` ASC),
  CONSTRAINT `fk_motos_modelos1`
    FOREIGN KEY (`modelo_id`)
    REFERENCES `motos`.`modelos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `motos`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `fone` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `motos`.`negocios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`negocios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `moto_id` INT NOT NULL,
  `data` DATE NOT NULL,
  `tipo` ENUM('compra', 'venda') NOT NULL,
  `valor` REAL(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_negocios_clientes1_idx` (`cliente_id` ASC),
  INDEX `fk_negocios_motos1_idx` (`moto_id` ASC),
  CONSTRAINT `fk_negocios_clientes1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `motos`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_negocios_motos1`
    FOREIGN KEY (`moto_id`)
    REFERENCES `motos`.`motos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `motos`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `motos`.`custos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `motos`.`custos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_id` INT NOT NULL,
  `negocio_id` INT NOT NULL,
  `valor` REAL(8,2) NOT NULL,
  `observação` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_custos_tipos1_idx` (`tipo_id` ASC),
  INDEX `fk_custos_negocios1_idx` (`negocio_id` ASC),
  CONSTRAINT `fk_custos_tipos1`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `motos`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_custos_negocios1`
    FOREIGN KEY (`negocio_id`)
    REFERENCES `motos`.`negocios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
