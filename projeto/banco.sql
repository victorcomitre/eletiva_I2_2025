-- MySQL Workbench Forward Engineering
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projeto_artcontrol
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projeto_artcontrol` DEFAULT CHARACTER SET utf8 ;
USE `projeto_artcontrol` ;

-- -----------------------------------------------------
-- Table `projeto_artcontrol`.`artista`
-- (RF1 - Cadastro de Artista)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_artcontrol`.`artista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `nacionalidade` VARCHAR(100) NULL,
  `biografia` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projeto_artcontrol`.`obra`
-- (RF2 - Cadastro de Obras)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_artcontrol`.`obra` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `tecnica` VARCHAR(100) NULL,
  `data_criacao` INT NULL COMMENT 'Apenas o ano',
  `artista_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_obra_artista_idx` (`artista_id` ASC),
  CONSTRAINT `fk_obra_artista`
    FOREIGN KEY (`artista_id`)
    REFERENCES `projeto_artcontrol`.`artista` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projeto_artcontrol`.`exposicao`
-- (RF3 - Cadastro de Exposições)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_artcontrol`.`exposicao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tema` VARCHAR(255) NOT NULL,
  `galeria` VARCHAR(150) NULL,
  `data_inicio` DATE NULL,
  `data_fim` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projeto_artcontrol`.`exposicao_obra`
-- (RF4 - Associativa: Participação de obras em exposições)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_artcontrol`.`exposicao_obra` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `exposicao_id` INT NOT NULL,
  `obra_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_exposicao_obra_exposicao_idx` (`exposicao_id` ASC),
  INDEX `fk_exposicao_obra_obra_idx` (`obra_id` ASC),
  UNIQUE INDEX `unique_obra_exposicao` (`exposicao_id` ASC, `obra_id` ASC),
  CONSTRAINT `fk_exposicao_obra_exposicao`
    FOREIGN KEY (`exposicao_id`)
    REFERENCES `projeto_artcontrol`.`exposicao` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exposicao_obra_obra`
    FOREIGN KEY (`obra_id`)
    REFERENCES `projeto_artcontrol`.`obra` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projeto_artcontrol`.`usuario`
-- CRUD de usuários
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_artcontrol`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;