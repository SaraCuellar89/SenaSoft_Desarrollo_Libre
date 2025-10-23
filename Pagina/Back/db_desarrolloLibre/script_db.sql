-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema desarrollo_libre
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema desarrollo_libre
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `desarrollo_libre` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `desarrollo_libre` ;

-- -----------------------------------------------------
-- Table `desarrollo_libre`.`asientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`asientos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `asiento` VARCHAR(255) NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`avions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`avions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `aerolinea` VARCHAR(255) NOT NULL,
  `capacidad` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`asientos_aviones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`asientos_aviones` (
  `asiento_id` BIGINT UNSIGNED NOT NULL,
  `avion_id` BIGINT UNSIGNED NOT NULL,
  INDEX `asientos_aviones_asiento_id_foreign` (`asiento_id` ASC) VISIBLE,
  INDEX `asientos_aviones_avion_id_foreign` (`avion_id` ASC) VISIBLE,
  CONSTRAINT `asientos_aviones_asiento_id_foreign`
    FOREIGN KEY (`asiento_id`)
    REFERENCES `desarrollo_libre`.`asientos` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `asientos_aviones_avion_id_foreign`
    FOREIGN KEY (`avion_id`)
    REFERENCES `desarrollo_libre`.`avions` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`metodos_pagos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`metodos_pagos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `metodo_pago` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`rols`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`rols` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`tipos_documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`tipos_documentos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `primer_apellido` VARCHAR(255) NOT NULL,
  `segundo_apellido` VARCHAR(255) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `genero` VARCHAR(255) NOT NULL,
  `tipo_id` BIGINT UNSIGNED NOT NULL,
  `documento` VARCHAR(255) NOT NULL,
  `edad` INT NOT NULL,
  `celular` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE,
  INDEX `users_rol_id_foreign` (`rol_id` ASC) VISIBLE,
  INDEX `users_tipo_id_foreign` (`tipo_id` ASC) VISIBLE,
  CONSTRAINT `users_rol_id_foreign`
    FOREIGN KEY (`rol_id`)
    REFERENCES `desarrollo_libre`.`rols` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `users_tipo_id_foreign`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `desarrollo_libre`.`tipos_documentos` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`vuelos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`vuelos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `origen` VARCHAR(255) NOT NULL,
  `destino` VARCHAR(255) NOT NULL,
  `fecha_salida` DATETIME NOT NULL,
  `fecha_llegada` DATETIME NOT NULL,
  `tipo_vuelo` ENUM('solo ida', 'ida y vuelta') NOT NULL,
  `precio` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `desarrollo_libre`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desarrollo_libre`.`reservas` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `vuelo_id` BIGINT UNSIGNED NOT NULL,
  `asiento_id` BIGINT UNSIGNED NOT NULL,
  `nombre_completo` VARCHAR(255) NOT NULL,
  `tipo_documento` VARCHAR(255) NOT NULL,
  `documento` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `celular` VARCHAR(255) NOT NULL,
  `metodo_id` BIGINT UNSIGNED NOT NULL,
  `monto` DOUBLE NOT NULL,
  `estado` VARCHAR(255) NOT NULL,
  `codigo` VARCHAR(255) NOT NULL,
  `cantidad_reserva` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `reservas_user_id_foreign` (`user_id` ASC) VISIBLE,
  INDEX `reservas_vuelo_id_foreign` (`vuelo_id` ASC) VISIBLE,
  INDEX `reservas_asiento_id_foreign` (`asiento_id` ASC) VISIBLE,
  INDEX `reservas_metodo_id_foreign` (`metodo_id` ASC) VISIBLE,
  CONSTRAINT `reservas_asiento_id_foreign`
    FOREIGN KEY (`asiento_id`)
    REFERENCES `desarrollo_libre`.`asientos` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `reservas_metodo_id_foreign`
    FOREIGN KEY (`metodo_id`)
    REFERENCES `desarrollo_libre`.`metodos_pagos` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `reservas_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `desarrollo_libre`.`users` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `reservas_vuelo_id_foreign`
    FOREIGN KEY (`vuelo_id`)
    REFERENCES `desarrollo_libre`.`vuelos` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
