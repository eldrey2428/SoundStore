-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema soundstore_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `soundstore_bd` DEFAULT CHARACTER SET utf8mb4 ;
USE `soundstore_bd` ;

-- -----------------------------------------------------
-- Table `soundstore_bd`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_bd`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `cpf` VARCHAR(14) NULL,
  `telefone` VARCHAR(20) NULL DEFAULT NULL,
  `senha` VARCHAR(100) NULL,
  PRIMARY KEY (`id`)
);

-- -----------------------------------------------------
-- Table `soundstore_bd`.`cupons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_bd`.`cupons` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(20) NULL,
  `desconto` DECIMAL(5,2) NULL,
  `validade` DATE NULL,
  PRIMARY KEY (`id`)
);

-- -----------------------------------------------------
-- Table `soundstore_bd`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_bd`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL,
  PRIMARY KEY (`id`)
);

-- -----------------------------------------------------
-- Table `soundstore_bd`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_bd`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categorias_id` INT NULL,
  `nome` VARCHAR(100) NULL,
  `preco` DECIMAL(10,2) NULL,
  `estoque` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_categorias_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_produtos_categorias`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `soundstore_bd`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `soundstore_bd`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_bd`.`pedidos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_pedido` DATETIME NULL,
  `status` VARCHAR(20) NULL,
  `valor_total` DECIMAL(10,2) NULL,
  `cupons_id` INT NOT NULL,
  `clientes_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pedidos_cupons1_idx` (`cupons_id` ASC),
  INDEX `fk_pedidos_clientes1_idx` (`clientes_id` ASC),
  CONSTRAINT `fk_pedidos_cupons1`
    FOREIGN KEY (`cupons_id`)
    REFERENCES `soundstore_bd`.`cupons` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_clientes1`
    FOREIGN KEY (`clientes_id`)
    REFERENCES `soundstore_bd`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `soundstore_bd`.`pedidos_has_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_bd`.`pedidos_has_produtos` (
  `pedidos_id` INT NOT NULL,
  `produtos_id` INT NOT NULL,
  `quantidade` INT NULL,
  `precoUnitario` DECIMAL(10,2) NULL,
  PRIMARY KEY (`pedidos_id`, `produtos_id`),
  INDEX `fk_pedidos_has_produtos_produtos1_idx` (`produtos_id` ASC),
  INDEX `fk_pedidos_has_produtos_pedidos1_idx` (`pedidos_id` ASC),
  CONSTRAINT `fk_pedidos_has_produtos_pedidos1`
    FOREIGN KEY (`pedidos_id`)
    REFERENCES `soundstore_bd`.`pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_has_produtos_produtos1`
    FOREIGN KEY (`produtos_id`)
    REFERENCES `soundstore_bd`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;