-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gestao_de_projeto
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `gestao_de_projeto` DEFAULT CHARACTER SET utf8 ;
USE `gestao_de_projeto` ;

-- -----------------------------------------------------
-- Table `gestao_de_projeto`.`projetos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestao_de_projeto`.`projetos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestao_de_projeto`.`membros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestao_de_projeto`.`membros` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestao_de_projeto`.`tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestao_de_projeto`.`tarefas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descrcao` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestao_de_projeto`.`atividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestao_de_projeto`.`atividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `projetos_id` INT NOT NULL,
  `tarefas_id` INT NOT NULL,
  `membros_id` INT NOT NULL,
  `data_comeco` DATE NOT NULL,
  `data_termino` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  INDEX `fk_atividades_projetos_idx` (`projetos_id` ASC),
  INDEX `fk_atividades_tarefas1_idx` (`tarefas_id` ASC),
  INDEX `fk_atividades_membros1_idx` (`membros_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_atividades_projetos`
    FOREIGN KEY (`projetos_id`)
    REFERENCES `gestao_de_projeto`.`projetos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividades_tarefas1`
    FOREIGN KEY (`tarefas_id`)
    REFERENCES `gestao_de_projeto`.`tarefas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividades_membros1`
    FOREIGN KEY (`membros_id`)
    REFERENCES `gestao_de_projeto`.`membros` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestao_de_projeto`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestao_de_projeto`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;