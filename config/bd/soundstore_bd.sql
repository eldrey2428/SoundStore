-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema soundstore_bd
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema soundstore_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema soundstore_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `soundstore_db` ;
USE `soundstore_db` ;

-- -----------------------------------------------------
-- Table `soundstore_db`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_db`.`clientes` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `telefone` VARCHAR(20) NULL DEFAULT NULL,
  `senha` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `soundstore_db`.`cupons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_db`.`cupons` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(20) NOT NULL,
  `desconto` DECIMAL(5,2) NOT NULL,
  `validade` DATE NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `soundstore_db`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_db`.`categorias` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `soundstore_db`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_db`.`produtos` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `categoria_id` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `estoque` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX (`categoria_id` ASC) VISIBLE,
  CONSTRAINT ``
    FOREIGN KEY (`categoria_id`)
    REFERENCES `soundstore_db`.`categorias` (`id`));


-- -----------------------------------------------------
-- Table `soundstore_db`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_db`.`pedidos` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `cupom_id` INT NULL DEFAULT NULL,
  `data_pedido` DATETIME NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX (`cliente_id` ASC) VISIBLE,
  INDEX (`cupom_id` ASC) VISIBLE,
  CONSTRAINT ``
    FOREIGN KEY (`cliente_id`)
    REFERENCES `soundstore_db`.`clientes` (`id`),
  CONSTRAINT ``
    FOREIGN KEY (`cupom_id`)
    REFERENCES `soundstore_db`.`cupons` (`id`));


-- -----------------------------------------------------
-- Table `soundstore_db`.`item_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soundstore_db`.`item_pedido` (
  `id` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `pedido_id` INT NOT NULL,
  `produto_id` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `preco_unitario` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX (`pedido_id` ASC) VISIBLE,
  INDEX (`produto_id` ASC) VISIBLE,
  CONSTRAINT ``
    FOREIGN KEY (`pedido_id`)
    REFERENCES `soundstore_db`.`pedidos` (`id`),
  CONSTRAINT ``
    FOREIGN KEY (`produto_id`)
    REFERENCES `soundstore_db`.`produtos` (`id`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
