SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `biblioteca` ;

-- -----------------------------------------------------
-- Table `biblioteca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(70) NOT NULL,
  `created` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`ubicacion` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `foto` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`tipo_libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`tipo_libro` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`libro` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(150) NOT NULL,
  `isbn` VARCHAR(30) NOT NULL,
  `autor` VARCHAR(150) NOT NULL,
  `editorial` VARCHAR(150) NOT NULL,
  `foto` VARCHAR(200) NULL,
  `created` INT UNSIGNED NOT NULL,
  `ubicacion_id` INT UNSIGNED NOT NULL,
  `tipo_libro_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_libro_ubicacion_idx` (`ubicacion_id` ASC),
  INDEX `fk_libro_tipo_libro1_idx` (`tipo_libro_id` ASC),
  CONSTRAINT `fk_libro_ubicacion`
    FOREIGN KEY (`ubicacion_id`)
    REFERENCES `biblioteca`.`ubicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_tipo_libro1`
    FOREIGN KEY (`tipo_libro_id`)
    REFERENCES `biblioteca`.`tipo_libro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`prestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`prestamo` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT UNSIGNED NOT NULL,
  `fecha_prestamo` INT UNSIGNED NOT NULL,
  `fecha_devolucion` INT UNSIGNED NULL,
  `estado` INT(1) UNSIGNED NOT NULL,
  `prestado_a` VARCHAR(200) NOT NULL,
  `usuario_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_prestamo_libro1_idx` (`libro_id` ASC),
  INDEX `fk_prestamo_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_prestamo_libro1`
    FOREIGN KEY (`libro_id`)
    REFERENCES `biblioteca`.`libro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `biblioteca`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
