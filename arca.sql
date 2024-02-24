-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2024 a las 01:11:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_venta`
--

CREATE TABLE `com_venta` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `totalventa` int(11) NOT NULL,
  `doc_cliente` int(11) NOT NULL,
  `fechaventa` varchar(50) NOT NULL,
  `carrito_idcarrito` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_promo`
--

CREATE TABLE `det_promo` (
  `idPromo` int(11) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `pre_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `promocion_idpromo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_primas_has_proveedores`
--

CREATE TABLE `materias_primas_has_proveedores` (
  `materias_primas_cod_materia_pri` int(10) UNSIGNED NOT NULL,
  `proveedores_idproveedor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_pri`
--

CREATE TABLE `mat_pri` (
  `cod_materia_pri` int(10) UNSIGNED NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `existencia` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `salida` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
  `id` int(11) NOT NULL,
  `sugerencia` text NOT NULL,
  `tipo_sugerencia` varchar(20) NOT NULL,
  `fecha_pqr` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `nombre_pro` varchar(50) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `precio_pro` int(11) NOT NULL,
  `categorias_idcategoria` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `cod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_materias_primas`
--

CREATE TABLE `productos_has_materias_primas` (
  `productos_idproducto` int(10) UNSIGNED NOT NULL,
  `materias_primas_cod_materia_pri` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id_promo` int(11) NOT NULL,
  `nom_promo` varchar(50) NOT NULL,
  `totalpromo` int(11) NOT NULL,
  `categorias_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provee`
--

CREATE TABLE `provee` (
  `idproveedor` int(10) UNSIGNED NOT NULL,
  `nom_proveedor` varchar(50) NOT NULL,
  `telefono_proveedor` varchar(50) NOT NULL,
  `direccion_proveedor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `doc` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tipo_doc` varchar(10) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_naci` date NOT NULL,
  `genero` varchar(50) NOT NULL,
  `cargo` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `com_venta_id_venta` int(11) DEFAULT NULL,
  `carrito_idcarrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`doc`, `nombre`, `apellido`, `tipo_doc`, `clave`, `tel`, `email`, `fecha_naci`, `genero`, `cargo`, `direccion`, `fecha_reg`, `com_venta_id_venta`, `carrito_idcarrito`) VALUES
(111111111, 'anyi', 'cardenas', 'CC', '123', '3143878596', 'nellybernate7@gmail.com', '2332-03-22', 'Hombre', 2, 'carrera 41 a # 4 a-33', '2024-02-24 00:00:00', NULL, NULL),
(1006155207, 'Yonner', 'Vargas bernate', 'CC', '12345', '3212296918', 'yonnervargasbernate7@gmail.com', '2002-01-10', 'Hombre', 1, 'Diagonal 74sur #78c-72', '2024-02-24 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_categorias`
--

CREATE TABLE `usuarios_has_categorias` (
  `usuarios_doc_identidad` int(11) NOT NULL,
  `categorias_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idcarrito`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `com_venta`
--
ALTER TABLE `com_venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `carrito_idcarrito` (`carrito_idcarrito`),
  ADD KEY `doc_cliente` (`doc_cliente`);

--
-- Indices de la tabla `det_promo`
--
ALTER TABLE `det_promo`
  ADD PRIMARY KEY (`idPromo`),
  ADD KEY `promocion_idpromo` (`promocion_idpromo`) USING BTREE;

--
-- Indices de la tabla `materias_primas_has_proveedores`
--
ALTER TABLE `materias_primas_has_proveedores`
  ADD PRIMARY KEY (`materias_primas_cod_materia_pri`,`proveedores_idproveedor`),
  ADD KEY `materias_primas_cod_materia_pri` (`materias_primas_cod_materia_pri`),
  ADD KEY `proveedores_idproveedor` (`proveedores_idproveedor`);

--
-- Indices de la tabla `mat_pri`
--
ALTER TABLE `mat_pri`
  ADD PRIMARY KEY (`cod_materia_pri`);

--
-- Indices de la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_id` (`usuarios_id`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `categorias_idcategoria` (`categorias_idcategoria`) USING BTREE;

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `categorias_idcategoria` (`categorias_idcategoria`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`doc`),
  ADD UNIQUE KEY `doc` (`doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `com_venta`
--
ALTER TABLE `com_venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `det_promo`
--
ALTER TABLE `det_promo`
  MODIFY `idPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pqr`
--
ALTER TABLE `pqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `com_venta`
--
ALTER TABLE `com_venta`
  ADD CONSTRAINT `com_venta_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`doc`);

--
-- Filtros para la tabla `det_promo`
--
ALTER TABLE `det_promo`
  ADD CONSTRAINT `det_promo_ibfk_1` FOREIGN KEY (`promocion_idpromo`) REFERENCES `promocion` (`id_promo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categorias_idcategoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `promocion_ibfk_1` FOREIGN KEY (`categorias_idcategoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
