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
CREATE SCHEMA IF NOT EXISTS `arca` DEFAULT CHARACTER SET utf8mb4 ;
USE `arca` ;

-- -----------------------------------------------------
-- Table `arca`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`carrito` (
  `idcarrito` INT(11) NOT NULL AUTO_INCREMENT,
  `forma_pago` VARCHAR(50) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`idcarrito`))
ENGINE = InnoDB
AUTO_INCREMENT = 83
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`categorias` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_cat` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`usuarios` (
  `doc` INT(11) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `tipo_doc` VARCHAR(10) NOT NULL,
  `clave` VARCHAR(100) NULL DEFAULT NULL,
  `tel` VARCHAR(11) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `fecha_naci` DATE NOT NULL,
  `genero` VARCHAR(50) NOT NULL,
  `cargo` INT(11) NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `fecha_reg` DATETIME NOT NULL,
  `com_venta_id_venta` INT(11) NULL DEFAULT NULL,
  `carrito_idcarrito` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`doc`),
  UNIQUE INDEX `doc` (`doc` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`com_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`com_venta` (
  `id_venta` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `producto` VARCHAR(50) NOT NULL,
  `precio` INT(11) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `subtotal` INT(11) NOT NULL,
  `totalventa` INT(11) NOT NULL,
  `doc_cliente` INT(11) NOT NULL,
  `fechaventa` DATETIME NULL DEFAULT NULL,
  `carrito_idcarrito` INT(11) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY USING BTREE (`id_venta`),
  INDEX `carrito_idcarrito` (`carrito_idcarrito` ASC) VISIBLE,
  INDEX `doc_cliente` (`doc_cliente` ASC) VISIBLE,
  CONSTRAINT `com_venta_ibfk_1`
    FOREIGN KEY (`doc_cliente`)
    REFERENCES `arca`.`usuarios` (`doc`))
ENGINE = InnoDB
AUTO_INCREMENT = 105
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`promocion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`promocion` (
  `id_promo` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_promo` VARCHAR(50) NOT NULL,
  `totalpromo` INT(11) NOT NULL,
  `categorias_idcategoria` INT(11) NOT NULL,
  PRIMARY KEY (`id_promo`),
  INDEX `categorias_idcategoria` USING BTREE (`categorias_idcategoria`) VISIBLE,
  CONSTRAINT `promocion_ibfk_1`
    FOREIGN KEY (`categorias_idcategoria`)
    REFERENCES `arca`.`categorias` (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`det_promo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`det_promo` (
  `idPromo` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_prod` VARCHAR(50) NOT NULL,
  `pre_prod` INT(11) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `descuento` INT(11) NOT NULL,
  `subtotal` INT(11) NOT NULL,
  `promocion_idpromo` INT(11) NOT NULL,
  PRIMARY KEY (`idPromo`),
  INDEX `promocion_idpromo` USING BTREE (`promocion_idpromo`) VISIBLE,
  CONSTRAINT `det_promo_ibfk_1`
    FOREIGN KEY (`promocion_idpromo`)
    REFERENCES `arca`.`promocion` (`id_promo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 49
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`mat_pri`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`mat_pri` (
  `cod_materia_pri` INT(10) NOT NULL AUTO_INCREMENT,
  `referencia` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(50) NOT NULL,
  `existencia` INT(11) NOT NULL,
  `entrada` INT(11) NOT NULL,
  `salida` INT(11) NOT NULL,
  `stock` INT(11) NOT NULL,
  PRIMARY KEY (`cod_materia_pri`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`materias_primas_has_proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`materias_primas_has_proveedores` (
  `materias_primas_cod_materia_pri` INT(10) UNSIGNED NOT NULL,
  `proveedores_idproveedor` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`materias_primas_cod_materia_pri`, `proveedores_idproveedor`),
  INDEX `materias_primas_cod_materia_pri` (`materias_primas_cod_materia_pri` ASC) VISIBLE,
  INDEX `proveedores_idproveedor` (`proveedores_idproveedor` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`pqr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`pqr` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sugerencia` TEXT NOT NULL,
  `tipo_sugerencia` VARCHAR(20) NOT NULL,
  `fecha_pqr` DATETIME NOT NULL,
  `estado` INT(11) NOT NULL,
  `usuarios_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `usuarios_id` USING BTREE (`usuarios_id`) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`productos` (
  `idProducto` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_pro` VARCHAR(50) NOT NULL,
  `detalle` VARCHAR(200) NOT NULL,
  `precio_pro` INT(11) NOT NULL,
  `categorias_idcategoria` INT(11) NOT NULL,
  `img` TEXT NULL DEFAULT NULL,
  `cod` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idProducto`),
  INDEX `categorias_idcategoria` USING BTREE (`categorias_idcategoria`) VISIBLE,
  CONSTRAINT `productos_ibfk_1`
    FOREIGN KEY (`categorias_idcategoria`)
    REFERENCES `arca`.`categorias` (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 34
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`productos_has_materias_primas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`productos_has_materias_primas` (
  `productos_idproducto` INT(10) UNSIGNED NOT NULL,
  `materias_primas_cod_materia_pri` INT(10) UNSIGNED NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`provee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`provee` (
  `idproveedor` INT(10) UNSIGNED NOT NULL,
  `nom_proveedor` VARCHAR(50) NOT NULL,
  `telefono_proveedor` VARCHAR(50) NOT NULL,
  `direccion_proveedor` VARCHAR(50) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `arca`.`registroeliminacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`registroeliminacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `doc_usuario` INT(11) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `fecha_eli` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `doc_usuario` (`doc_usuario` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `arca`.`usuarios_has_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`usuarios_has_categorias` (
  `usuarios_doc_identidad` INT(11) NOT NULL,
  `categorias_idcategoria` INT(11) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

USE `arca` ;

-- -----------------------------------------------------
-- Placeholder table for view `arca`.`view_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`view_clientes` (`doc` INT, `nombre` INT, `apellido` INT, `tel` INT, `email` INT);

-- -----------------------------------------------------
-- Placeholder table for view `arca`.`view_pqr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`view_pqr` (`id` INT, `nombre` INT, `apellido` INT, `usuarios_id` INT, `estado` INT);

-- -----------------------------------------------------
-- Placeholder table for view `arca`.`viewventa_preparacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arca`.`viewventa_preparacion` (`doc_cliente` INT, `fechaventa` INT, `carrito_idcarrito` INT, `totalventa` INT, `estado` INT);

-- -----------------------------------------------------
-- procedure total_ventas
-- -----------------------------------------------------

DELIMITER $$
USE `arca`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_ventas`(IN fechaini DATE, IN fechafin DATE)
BEGIN
    SELECT SUM(c.subtotal) AS TOTAL 
    FROM com_venta AS c 
    WHERE c.estado = 2 AND c.fechaventa BETWEEN fechaini AND fechafin;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- View `arca`.`view_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `arca`.`view_clientes`;
USE `arca`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arca`.`view_clientes` AS select `arca`.`usuarios`.`doc` AS `doc`,`arca`.`usuarios`.`nombre` AS `nombre`,`arca`.`usuarios`.`apellido` AS `apellido`,`arca`.`usuarios`.`tel` AS `tel`,`arca`.`usuarios`.`email` AS `email` from `arca`.`usuarios` where `arca`.`usuarios`.`cargo` = 2 order by `arca`.`usuarios`.`doc`;

-- -----------------------------------------------------
-- View `arca`.`view_pqr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `arca`.`view_pqr`;
USE `arca`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arca`.`view_pqr` AS select `c`.`id` AS `id`,`cv`.`nombre` AS `nombre`,`cv`.`apellido` AS `apellido`,`c`.`usuarios_id` AS `usuarios_id`,case when `c`.`estado` = 2 then 'Completada' else 'Trámite' end AS `estado` from (`arca`.`pqr` `c` join `arca`.`usuarios` `cv` on(`c`.`usuarios_id` = `cv`.`doc`));

-- -----------------------------------------------------
-- View `arca`.`viewventa_preparacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `arca`.`viewventa_preparacion`;
USE `arca`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arca`.`viewventa_preparacion` AS select `c`.`doc_cliente` AS `doc_cliente`,`c`.`fechaventa` AS `fechaventa`,`c`.`carrito_idcarrito` AS `carrito_idcarrito`,`c`.`totalventa` AS `totalventa`,case when `c`.`estado` = 1 then 'Preparación' else 'Otro Estado' end AS `estado` from (`arca`.`com_venta` `c` join `arca`.`carrito` `cv` on(`c`.`carrito_idcarrito` = `cv`.`idcarrito`)) where `c`.`estado` = 1 group by `cv`.`idcarrito`;
USE `arca`;

DELIMITER $$
USE `arca`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `arca`.`registro_eliminacion_usuario`
BEFORE DELETE ON `arca`.`usuarios`
FOR EACH ROW
BEGIN
    INSERT INTO registroEliminacion (doc_usuario, nombre, apellido, email, fecha_eli)
    VALUES (OLD.doc, OLD.nombre, OLD.apellido, OLD.email, NOW());
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
