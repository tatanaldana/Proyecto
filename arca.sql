-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 04:57:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
  `idcarrito` int(10) NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `estado` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcarrito`, `forma_pago`, `estado`) VALUES
(1, 'efectivo', 2),
(3, 'efectivo', 2),
(4, 'efectivo', 1),
(5, 'efectivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nombre_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_cat`) VALUES
(1, 'catpollo'),
(2, 'catpizza'),
(3, 'catespecial'),
(4, 'cathambur'),
(5, 'catpromo'),
(6, 'catbebida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_venta`
--

CREATE TABLE `com_venta` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL,
  `totalventa` int(50) NOT NULL,
  `doc_cliente` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `carrito_idcarrito` int(50) NOT NULL,
  `estado` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `com_venta`
--

INSERT INTO `com_venta` (`id_venta`, `producto`, `precio`, `cantidad`, `subtotal`, `totalventa`, `doc_cliente`, `fecha_venta`, `carrito_idcarrito`, `estado`) VALUES
(1, 'hamburguesa de carne', 11300, 1, 11300, 59600, 1006155207, '2023-09-20 19:31:18', 0, 2),
(11, 'hamburguesa de carne', 11300, 1, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(12, 'pollo ', 31800, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(13, 'pollo y medio', 48300, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(14, 'hamburguesa de pollo', 11000, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(15, 'pizza hawuallana', 6800, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(16, 'pizza mexicana', 6800, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(17, 'gaseosa manzana', 2000, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(18, 'gaseosa manzana', 3000, 0, 0, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(19, 'medio pollo', 15400, 0, 15400, 15400, 1006155207, '2023-09-21 01:19:16', 3, 2),
(20, 'hamburguesa de carne', 11300, 1, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(21, 'pollo ', 31800, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(22, 'pollo y medio', 48300, 0, 48300, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(23, 'hamburguesa de pollo', 11000, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(24, 'pizza hawuallana', 6800, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(25, 'pizza mexicana', 6800, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(26, 'gaseosa manzana', 2000, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(27, 'gaseosa manzana', 3000, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(28, 'medio pollo', 15400, 0, 0, 48300, 1006155207, '2023-09-21 01:19:38', 4, 1),
(29, 'hamburguesa de carne', 11300, 2, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(30, 'pollo ', 31800, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(31, 'pollo y medio', 48300, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(32, 'hamburguesa de pollo', 11000, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(33, 'pizza hawuallana', 6800, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(34, 'pizza mexicana', 6800, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(35, 'gaseosa manzana', 2000, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(36, 'gaseosa manzana', 3000, 0, 6000, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1),
(37, 'medio pollo', 15400, 0, 0, 6000, 1006155207, '2023-09-21 01:19:51', 5, 1);

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

--
-- Volcado de datos para la tabla `det_promo`
--

INSERT INTO `det_promo` (`idPromo`, `nom_prod`, `pre_prod`, `cantidad`, `descuento`, `subtotal`, `total`, `promocion_idpromo`) VALUES
(6, 'pollo ', 31800, 2, 22, 49608, 12410, 6),
(7, 'hamburguesa de pollo gurmet', 11500, 3, 25, 34500, 20000, 6);

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
  `existencia` int(10) NOT NULL,
  `entrada` int(5) NOT NULL,
  `salida` int(5) NOT NULL,
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mat_pri`
--

INSERT INTO `mat_pri` (`cod_materia_pri`, `referencia`, `descripcion`, `existencia`, `entrada`, `salida`, `stock`) VALUES
(0, 'pollo', 'pollo completo ', 100, 20, 10, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
  `id` int(10) NOT NULL,
  `sugerencia` text NOT NULL,
  `tipo_sugerencia` varchar(20) NOT NULL,
  `fecha_pqr` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `usuarios_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `nombre_pro` varchar(50) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `precio_pro` int(10) NOT NULL,
  `categorias_idcategoria` int(10) NOT NULL,
  `img` text DEFAULT NULL,
  `cod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre_pro`, `detalle`, `precio_pro`, `categorias_idcategoria`, `img`, `cod`) VALUES
(13, 'hamburguesa de carne', 'queso tomate cebolla y papas', 11300, 4, NULL, 'a1'),
(16, 'pollo ', 'patacon y papa salada', 31800, 1, NULL, 'a10'),
(17, 'pollo y medio', 'patacon y papa salada', 48300, 1, NULL, '0'),
(18, 'hamburguesa de pollo', 'queso tomate cebolla y papas', 11000, 4, NULL, 'a2'),
(19, 'pizza hawuallana', 'queso piña jamon', 6800, 2, NULL, '7'),
(20, 'pizza mexicana', 'picado queso nachos carne molida', 6800, 2, NULL, '0'),
(21, 'gaseosa manzana', '250', 2000, 6, NULL, 'a8'),
(22, 'gaseosa manzana', '350', 3000, 6, NULL, 'a3'),
(23, 'medio pollo', 'patacon y papa salada', 15400, 1, NULL, 'a4'),
(24, 'pizza pollo con champiñon', 'queso  pollo chanpiñon', 6800, 2, NULL, 'a20'),
(25, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a29'),
(26, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a29'),
(27, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(28, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(29, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(30, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(31, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30');

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

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id_promo`, `nom_promo`, `totalpromo`, `categorias_idcategoria`) VALUES
(6, 'combo yonner', 67688, 3),
(8, 'combo daniel', 10000, 3);

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
  `id` int(10) UNSIGNED NOT NULL,
  `doc` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tipo_doc` varchar(10) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_naci` date NOT NULL,
  `genero` varchar(50) NOT NULL,
  `cargo` int(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `com_venta_id_venta` int(10) NOT NULL,
  `carrito_idcarrito` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `doc`, `nombre`, `apellido`, `tipo_doc`, `clave`, `tel`, `email`, `fecha_naci`, `genero`, `cargo`, `direccion`, `fecha_reg`, `com_venta_id_venta`, `carrito_idcarrito`) VALUES
(8, 1006155207, 'yonner', 'vargas bernate', 'cc', '61b1fb3f59e28c67f3925f3c79be81a1', '3212296918', 'yonnervargasbernate7@gmail.com', '2002-01-10', 'hombre', 1, 'diagonal 74sur #78c-72', '2023-09-20 00:00:00', 0, 0),
(14, 11111111, 'luis', 'cortes', 'cc', '202cb962ac59075b964b07152d234b70', '3143878596', 'vargasbernateyonner06@gmail.com', '2000-09-19', 'hombre', 2, 'carrera 41 a # 4 a-33', '2023-09-21 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_categorias`
--

CREATE TABLE `usuarios_has_categorias` (
  `usuarios_doc_identidad` int(10) NOT NULL,
  `categorias_idcategoria` int(10) NOT NULL
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
  ADD PRIMARY KEY (`id_venta`) USING BTREE,
  ADD KEY `carrito_idcarrito` (`carrito_idcarrito`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doc` (`doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idcarrito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `com_venta`
--
ALTER TABLE `com_venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `det_promo`
--
ALTER TABLE `det_promo`
  MODIFY `idPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pqr`
--
ALTER TABLE `pqr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

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
