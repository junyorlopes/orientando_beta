-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pj_fatec
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `pj_fatec` ;

-- -----------------------------------------------------
-- Schema pj_fatec
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pj_fatec` DEFAULT CHARACTER SET latin1 ;
USE `pj_fatec` ;

-- -----------------------------------------------------
-- Table `pj_fatec`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`cursos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NOT NULL,
  `duracao` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pj_fatec`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NULL,
  `email` VARCHAR(250) NULL,
  `img` VARCHAR(250) NULL,
  `senha` VARCHAR(45) NULL,
  `nivel` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `pj_fatec`.`docentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`docentes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `especialidade` VARCHAR(45) NULL,
  `cursos_id` INT(11) NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `users_id`),
  INDEX `fk_docentes_cursos1_idx` (`cursos_id` ASC),
  INDEX `fk_docentes_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_docentes_cursos1`
    FOREIGN KEY (`cursos_id`)
    REFERENCES `pj_fatec`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_docentes_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `pj_fatec`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `pj_fatec`.`formacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`formacoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL DEFAULT NULL,
  `tipo` VARCHAR(200) NULL DEFAULT NULL,
  `ano` INT NULL,
  `instituicao` VARCHAR(255) NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_formacoes_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_formacoes_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `pj_fatec`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pj_fatec`.`pesquisa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`pesquisa` (
  `idpesquisa` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`idpesquisa`, `users_id`),
  INDEX `fk_pesquisas_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_pesquisas_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `pj_fatec`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pj_fatec`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`adm` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `users_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pj_fatec`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `RA` VARCHAR(45) NULL,
  `nome` VARCHAR(70) NULL,
  `data` DATE NULL,
  `nomeprojeto` VARCHAR(120) NULL,
  `mensagem` VARCHAR(2000) NULL,
  `doc` VARCHAR(100) NULL,
  `users_id` INT(11) NOT NULL,
  `email` VARCHAR(100) NULL,
  `status` INT NULL,
  PRIMARY KEY (`idpedido`),
  INDEX `fk_pedido_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_pedido_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `pj_fatec`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pj_fatec`.`vinculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pj_fatec`.`vinculos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `alunos_ra` VARCHAR(15) NULL,
  `data` DATE NULL,
  `status` TINYINT(1) NULL,
  `resposta` VARCHAR(2000) NULL,
  `idpedido` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vinculos_pedido1_idx` (`idpedido` ASC),
  CONSTRAINT `fk_vinculos_pedido1`
    FOREIGN KEY (`idpedido`)
    REFERENCES `pj_fatec`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `pj_fatec`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `pj_fatec`;
INSERT INTO `pj_fatec`.`users` (`id`, `nome`, `email`, `img`, `senha`, `nivel`) VALUES (1, 'adm', 'adm@adm', NULL, '123', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pj_fatec`.`adm`
-- -----------------------------------------------------
START TRANSACTION;
USE `pj_fatec`;
INSERT INTO `pj_fatec`.`adm` (`id`, `users_id`) VALUES (1, 1);

COMMIT;

