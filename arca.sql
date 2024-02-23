show databases ;
show tables;
create database arca;
drop database arca;
use arca;
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema arca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema arca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `arca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `arca` ;

-- -----------------------------------------------------
-- Table `arca`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`carrito` (
  `idcarrito` INT NOT NULL AUTO_INCREMENT,
  `forma_pago` VARCHAR(50) NOT NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`idcarrito`))
ENGINE = InnoDB
AUTO_INCREMENT = 40
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`categorias` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `nombre_cat` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`usuarios` (
  `doc` INT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `tipo_doc` VARCHAR(10) NOT NULL,
  `clave` VARCHAR(50) NOT NULL,
  `tel` VARCHAR(11) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `fecha_naci` DATE NOT NULL,
  `genero` VARCHAR(50) NOT NULL,
  `cargo` INT NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `fecha_reg` DATETIME NOT NULL,
  `com_venta_id_venta` INT NULL DEFAULT NULL,
  `carrito_idcarrito` INT NULL DEFAULT NULL,
  PRIMARY KEY (`doc`),
  UNIQUE INDEX `doc` (`doc` ASC));



-- -----------------------------------------------------
-- Table `arca`.`com_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`com_venta` (
  `id_venta` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `producto` VARCHAR(50) NOT NULL,
  `precio` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `subtotal` INT NOT NULL,
  `totalventa` INT NOT NULL,
  `doc_cliente` INT NOT NULL,
  `fechaventa` VARCHAR(50) NOT NULL,
  `carrito_idcarrito` INT NOT NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`id_venta`),
  INDEX `carrito_idcarrito` (`carrito_idcarrito` ASC),
  INDEX `doc_cliente` (`doc_cliente` ASC),
  CONSTRAINT `com_venta_ibfk_1`
    FOREIGN KEY (`doc_cliente`)
    REFERENCES `arca`.`usuarios` (`doc`))
ENGINE = InnoDB
AUTO_INCREMENT = 53
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`promocion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`promocion` (
  `id_promo` INT NOT NULL AUTO_INCREMENT,
  `nom_promo` VARCHAR(50) NOT NULL,
  `totalpromo` INT NOT NULL,
  `categorias_idcategoria` INT NOT NULL,
  PRIMARY KEY (`id_promo`),
  INDEX `categorias_idcategoria` USING BTREE (`categorias_idcategoria`),
  CONSTRAINT `promocion_ibfk_1`
    FOREIGN KEY (`categorias_idcategoria`)
    REFERENCES `arca`.`categorias` (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`det_promo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`det_promo` (
  `idPromo` INT NOT NULL AUTO_INCREMENT,
  `nom_prod` VARCHAR(50) NOT NULL,
  `pre_prod` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `descuento` INT NOT NULL,
  `subtotal` INT NOT NULL,
  `total` INT NOT NULL,
  `promocion_idpromo` INT NOT NULL,
  PRIMARY KEY (`idPromo`),
  INDEX `promocion_idpromo` USING BTREE (`promocion_idpromo`),
  CONSTRAINT `det_promo_ibfk_1`
    FOREIGN KEY (`promocion_idpromo`)
    REFERENCES `arca`.`promocion` (`id_promo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`mat_pri`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`mat_pri` (
  `cod_materia_pri` INT UNSIGNED NOT NULL,
  `referencia` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(50) NOT NULL,
  `existencia` INT NOT NULL,
  `entrada` INT NOT NULL,
  `salida` INT NOT NULL,
  `stock` INT NOT NULL,
  PRIMARY KEY (`cod_materia_pri`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`materias_primas_has_proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`materias_primas_has_proveedores` (
  `materias_primas_cod_materia_pri` INT UNSIGNED NOT NULL,
  `proveedores_idproveedor` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`materias_primas_cod_materia_pri`, `proveedores_idproveedor`),
  INDEX `materias_primas_cod_materia_pri` (`materias_primas_cod_materia_pri` ASC),
  INDEX `proveedores_idproveedor` (`proveedores_idproveedor` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`pqr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`pqr` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sugerencia` TEXT NOT NULL,
  `tipo_sugerencia` VARCHAR(20) NOT NULL,
  `fecha_pqr` DATETIME NOT NULL,
  `estado` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `usuarios_id` USING BTREE (`usuarios_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`productos` (
  `idProducto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_pro` VARCHAR(50) NOT NULL,
  `detalle` VARCHAR(200) NOT NULL,
  `precio_pro` INT NOT NULL,
  `categorias_idcategoria` INT NOT NULL,
  `img` TEXT NULL DEFAULT NULL,
  `cod` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idProducto`),
  INDEX `categorias_idcategoria` USING BTREE (`categorias_idcategoria`),
  CONSTRAINT `productos_ibfk_1`
    FOREIGN KEY (`categorias_idcategoria`)
    REFERENCES `arca`.`categorias` (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`productos_has_materias_primas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`productos_has_materias_primas` (
  `productos_idproducto` INT UNSIGNED NOT NULL,
  `materias_primas_cod_materia_pri` INT UNSIGNED NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`provee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`provee` (
  `idproveedor` INT UNSIGNED NOT NULL,
  `nom_proveedor` VARCHAR(50) NOT NULL,
  `telefono_proveedor` VARCHAR(50) NOT NULL,
  `direccion_proveedor` VARCHAR(50) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`usuarios_has_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`usuarios_has_categorias` (
  `usuarios_doc_identidad` INT NOT NULL,
  `categorias_idcategoria` INT NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;