-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2024 a las 17:43:28
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_ventas` (IN `fechaini` DATE, IN `fechafin` DATE)   BEGIN
    SELECT SUM(c.subtotal) AS TOTAL 
    FROM com_venta AS c 
    WHERE c.estado = 2 AND c.fechaventa BETWEEN fechaini AND fechafin;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcarrito`, `forma_pago`, `estado`) VALUES
(51, 'efectivo', 2),
(52, 'efectivo', 2),
(53, 'tarjeta', 2),
(54, 'efectivo', 2),
(55, 'tarjeta', 2),
(74, 'efectivo', 2),
(75, 'efectivo', 2),
(76, 'efectivo', 2),
(77, 'efectivo', 2),
(78, 'efectivo', 1),
(79, 'efectivo', 1),
(80, 'efectivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
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
(6, 'catbebida'),
(8, 'choriperro'),
(9, 'Salchipapa'),
(10, '');

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
  `fechaventa` datetime DEFAULT NULL,
  `carrito_idcarrito` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `com_venta`
--

INSERT INTO `com_venta` (`id_venta`, `producto`, `precio`, `cantidad`, `subtotal`, `totalventa`, `doc_cliente`, `fechaventa`, `carrito_idcarrito`, `estado`) VALUES
(73, 'hamburguesa de carne', 11300, 2, 22600, 22600, 1014298794, '2024-03-24 22:17:17', 51, 2),
(74, 'hamburguesa de carne', 11300, 3, 33900, 33900, 1014298794, '2024-03-24 22:43:08', 52, 2),
(75, 'hamburguesa de carne', 11300, 1, 11300, 219800, 1014243818, '2024-03-28 02:33:00', 53, 2),
(76, 'pollo ', 31800, 2, 63600, 219800, 1014243818, '2024-03-28 02:33:00', 53, 2),
(77, 'pollo y medio', 48300, 3, 144900, 219800, 1014243818, '2024-03-28 02:33:00', 53, 2),
(78, 'hamburguesa de carne', 11300, 10, 113000, 431000, 1014243818, '2024-03-29 20:16:52', 54, 2),
(79, 'pollo ', 31800, 10, 318000, 431000, 1014243818, '2024-03-29 20:16:52', 54, 2),
(80, 'hamburguesa de carne', 11300, 20, 226000, 257800, 1014243818, '2024-03-29 20:29:28', 55, 2),
(81, 'pollo ', 31800, 1, 31800, 257800, 1014243818, '2024-03-29 20:29:28', 55, 2),
(82, 'hamburguesa de carne', 11300, 10, 113000, 914000, 1014243818, '2024-03-31 00:26:04', 74, 2),
(83, 'pollo ', 31800, 10, 318000, 914000, 1014243818, '2024-03-31 00:26:04', 74, 2),
(84, 'pollo y medio', 48300, 10, 483000, 914000, 1014243818, '2024-03-31 00:26:04', 74, 2),
(85, 'hamburguesa de carne', 11300, 10, 113000, 936000, 1014243818, '2024-03-31 00:31:16', 75, 2),
(86, 'pollo ', 31800, 10, 318000, 936000, 1014243818, '2024-03-31 00:31:16', 75, 2),
(87, 'pollo y medio', 48300, 10, 483000, 936000, 1014243818, '2024-03-31 00:31:16', 75, 2),
(88, 'hamburguesa de pollo', 11000, 2, 22000, 936000, 1014243818, '2024-03-31 00:31:16', 75, 2),
(89, 'hamburguesa de carne', 11300, 10, 113000, 936000, 1014243818, '2024-03-31 00:32:19', 76, 2),
(90, 'pollo ', 31800, 10, 318000, 936000, 1014243818, '2024-03-31 00:32:19', 76, 2),
(91, 'pollo y medio', 48300, 10, 483000, 936000, 1014243818, '2024-03-31 00:32:19', 76, 2),
(92, 'hamburguesa de pollo', 11000, 2, 22000, 936000, 1014243818, '2024-03-31 00:32:19', 76, 2),
(93, 'hamburguesa de carne', 11300, 2, 22600, 22600, 1014243818, '2024-03-31 00:32:31', 77, 2),
(94, 'hamburguesa de carne', 11300, 5, 56500, 153100, 1014243818, '2024-03-31 00:34:25', 78, 1),
(95, 'pollo y medio', 48300, 2, 96600, 153100, 1014243818, '2024-03-31 00:34:25', 78, 1),
(96, 'hamburguesa de carne', 11300, 2, 22600, 340600, 1014243818, '2024-03-31 00:37:42', 79, 1),
(97, 'pollo ', 31800, 10, 318000, 340600, 1014243818, '2024-03-31 00:37:42', 79, 1),
(98, 'hamburguesa de carne', 11300, 10, 113000, 431000, 1014243818, '2024-03-31 00:40:35', 80, 1),
(99, 'pollo ', 31800, 10, 318000, 431000, 1014243818, '2024-03-31 00:40:35', 80, 1);

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
(7, 'hamburguesa de pollo gurmet', 11500, 3, 25, 34500, 20000, 6),
(8, 'hamburguesa de carne', 11300, 1, 10, 10170, 38790, 9),
(9, 'pollo ', 31800, 1, 10, 28620, 38790, 9);

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
  `cod_materia_pri` int(10) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `existencia` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `salida` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mat_pri`
--

INSERT INTO `mat_pri` (`cod_materia_pri`, `referencia`, `descripcion`, `existencia`, `entrada`, `salida`, `stock`) VALUES
(1, 'ZO1', 'car', 10, 10, 10, 10),
(2, 'ZO12', 'sabroso', 10, 10, 10, 10),
(3, 'CAR1', 'carne', 10, 10, 10, 10),
(4, 'car1', 'sabrososasa', 20, 20, 20, 20);

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

--
-- Volcado de datos para la tabla `pqr`
--

INSERT INTO `pqr` (`id`, `sugerencia`, `tipo_sugerencia`, `fecha_pqr`, `estado`, `usuarios_id`) VALUES
(15, 'Esta muy rica la comida', 'queja', '2023-10-10 00:00:00', 1, 1014243818),
(16, 'Esta muy fea la comida', 'sugerencia', '2023-10-11 00:00:00', 1, 1014243818),
(17, 'No deberian vender comida', 'felicitacion', '2023-10-12 00:00:00', 1, 1014243818),
(18, 'Porque no venden chicles', 'peticion', '2023-10-13 00:00:00', 1, 1014243818);

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

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre_pro`, `detalle`, `precio_pro`, `categorias_idcategoria`, `img`, `cod`) VALUES
(13, 'hamburguesa de carne', 'queso tomate cebolla y papas', 11300, 4, NULL, 'a1'),
(16, 'pollo ', 'patacon y papa salada', 31800, 1, NULL, 'a10'),
(17, 'pollo y medio', 'patacon y papa salada', 48300, 1, NULL, '0'),
(18, 'hamburguesa de pollo', 'queso tomate cebolla y papas', 11000, 4, NULL, 'a2'),
(19, 'pizza hawuallana', 'queso pi', 6800, 2, NULL, '7'),
(20, 'pizza mexicana', 'picado queso nachos carne molida', 6800, 2, NULL, '0'),
(21, 'gaseosa manzana', '250', 2000, 6, NULL, 'a8'),
(22, 'gaseosa manzana', '350', 3000, 6, NULL, 'a3'),
(23, 'medio pollo', 'patacon y papa salada', 15400, 1, NULL, 'a4'),
(24, 'pizza pollo con champi', 'queso  pollo chanpi', 6800, 2, NULL, 'a20'),
(25, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a29'),
(26, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a29'),
(27, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(28, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(29, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(30, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(31, 'pizza pollo con jamon', 'queso  pollo jamon', 6800, 2, NULL, 'a30'),
(32, 'prueba', 'prueba', 100000, 1, NULL, 'i000');

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
(8, 'combo daniel', 10000, 3),
(9, 'Combo1', 38790, 3);

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
-- Estructura de tabla para la tabla `registroeliminacion`
--

CREATE TABLE `registroeliminacion` (
  `id` int(11) NOT NULL,
  `doc_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fecha_eli` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `registroeliminacion`
--

INSERT INTO `registroeliminacion` (`id`, `doc_usuario`, `nombre`, `apellido`, `email`, `fecha_eli`) VALUES
(2, 1014298794, 'daniel', 'gamboa', 'dani6@hotmail.com', '2024-03-22 18:30:00'),
(3, 124578, 'luis ', 'cortes', 'a@a.com', '2024-03-24 17:05:05'),
(4, 1234567890, 'jhonatan', 'saldana', 'l@b.com', '2024-03-27 21:08:39'),
(5, 2358974, 'luis ', 'rodriguez', 'L@F.COM', '2024-03-29 16:55:04'),
(6, 12345678, 'luis ', 'aldana', 'a@c.com', '2024-03-29 16:56:05'),
(7, 2354789, 'paula', 'katherin', 'de@gmail.com', '2024-03-30 14:42:07'),
(8, 101425698, 'estefani', 'valero', 'dea@hotmail.com', '2024-03-30 15:47:51'),
(9, 235689, 'paula', 'katherin', 'dea@gmail.com', '2024-03-30 16:07:20'),
(10, 23568741, 'estefani', 'valero', 'ja@gmail.com', '2024-03-30 22:25:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `doc` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tipo_doc` varchar(10) NOT NULL,
  `clave` varchar(100) DEFAULT NULL,
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
(101498, 'Daniel', 'Gamboa', 'CC', '$2y$10$vW6MxtdUZ6hxUpnGCUeC1uGlCMgqCfu0OWu9PnT3uK0t5dmcHqdu.', '32122112', 'daniel@daniel.com', '1998-07-10', 'Hombre', 1, 'calls 23 2 bis', '2024-03-19 00:00:00', NULL, NULL),
(123456, 'luis ', 'SALDAAN', 'CC', '$2y$10$wNNPA2tapYJK0vITZgS/oOirWoapanQ7V.H35lbG.aQCDLFxd6ZOi', '3002305689', 'A@R.COM', '2000-10-10', 'Hombre', 2, 'CL 89 74 75', '2024-03-29 00:00:00', NULL, NULL),
(102345696, 'jhonatan ', 'maldana', 'CC', '$2y$10$FP7KGTPzUIELKz6mAV8djOH7FSvtrDDT24/WN5foC7rUUo.LJOyem', '3215649870', 'jbojhonatan@gmail.com', '2000-10-10', 'Hombre', 1, 'cl 78 96 63', '2024-03-28 00:00:00', NULL, NULL),
(235698741, 'jhonatan', 'pulido', 'CC', '$2y$10$LOeChLWpk.dX5CHuwH.g4u5Do15y63xJ4R/WVH5YeTBSQMF9wNQ2K', '3698520147', 'fd@gmail.com', '2000-10-10', 'Hombre', 2, 'cl 78 45 12', '2024-03-31 00:00:00', NULL, NULL),
(1014243818, 'jhonatan ', 'aldana rodriguez', 'CC', '$2y$10$mSDXhTg6rGpLwH2E7kW2OOW9SNow9H4mXsf0kBPWqDObsfWcbZ7AW', '3216549870', 'j@gmail.com', '1998-10-10', 'Hombre', 2, 'cl 76a 82 40', '2024-03-24 00:00:00', NULL, NULL),
(1014298794, 'Daniel', 'Eduardo', 'CC', '$2y$10$2HOgdevBxlpjS74dX28Fgu/NufCEd0Y8Hjk.NSaD7WIT4s1qpkmWS', '3102020362', 'dani6@hotmail.com', '1998-07-10', 'Hombre', 2, 'calle 71 a 76', '2024-03-23 00:00:00', NULL, NULL);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `registro_eliminacion_usuario` BEFORE DELETE ON `usuarios` FOR EACH ROW BEGIN
    INSERT INTO registroEliminacion (doc_usuario, nombre, apellido, email, fecha_eli)
    VALUES (OLD.doc, OLD.nombre, OLD.apellido, OLD.email, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_categorias`
--

CREATE TABLE `usuarios_has_categorias` (
  `usuarios_doc_identidad` int(11) NOT NULL,
  `categorias_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `viewventa_preparacion`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `viewventa_preparacion` (
`doc_cliente` int(11)
,`fechaventa` datetime
,`carrito_idcarrito` int(11)
,`totalventa` int(11)
,`estado` varchar(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_clientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_clientes` (
`doc` int(11)
,`nombre` varchar(50)
,`apellido` varchar(50)
,`tel` varchar(11)
,`email` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_pqr`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_pqr` (
`id` int(11)
,`nombre` varchar(50)
,`apellido` varchar(50)
,`usuarios_id` int(11)
,`estado` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `viewventa_preparacion`
--
DROP TABLE IF EXISTS `viewventa_preparacion`;

CREATE ALGORITHM=UNDEFINED DEFINER= CURRENT_USER SQL SECURITY DEFINER VIEW `viewventa_preparacion`  AS SELECT `c`.`doc_cliente` AS `doc_cliente`, `c`.`fechaventa` AS `fechaventa`, `c`.`carrito_idcarrito` AS `carrito_idcarrito`, `c`.`totalventa` AS `totalventa`, CASE WHEN `c`.`estado` = 1 THEN 'Preparación' ELSE 'Otro Estado' END AS `estado` FROM (`com_venta` `c` join `carrito` `cv` on(`c`.`carrito_idcarrito` = `cv`.`idcarrito`)) WHERE `c`.`estado` = 1 GROUP BY `cv`.`idcarrito``idcarrito`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_clientes`
--
DROP TABLE IF EXISTS `view_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clientes`  AS SELECT `usuarios`.`doc` AS `doc`, `usuarios`.`nombre` AS `nombre`, `usuarios`.`apellido` AS `apellido`, `usuarios`.`tel` AS `tel`, `usuarios`.`email` AS `email` FROM `usuarios` WHERE `usuarios`.`cargo` = 2 ORDER BY `usuarios`.`doc` ASC  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_pqr`
--
DROP TABLE IF EXISTS `view_pqr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pqr`  AS SELECT `c`.`id` AS `id`, `cv`.`nombre` AS `nombre`, `cv`.`apellido` AS `apellido`, `c`.`usuarios_id` AS `usuarios_id`, CASE WHEN `c`.`estado` = 2 THEN 'Completada' ELSE 'Trámite' END AS `estado` FROM (`pqr` `c` join `usuarios` `cv` on(`c`.`usuarios_id` = `cv`.`doc`))  ;

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
-- Indices de la tabla `registroeliminacion`
--
ALTER TABLE `registroeliminacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_usuario` (`doc_usuario`);

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
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `com_venta`
--
ALTER TABLE `com_venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `det_promo`
--
ALTER TABLE `det_promo`
  MODIFY `idPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mat_pri`
--
ALTER TABLE `mat_pri`
  MODIFY `cod_materia_pri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pqr`
--
ALTER TABLE `pqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `registroeliminacion`
--
ALTER TABLE `registroeliminacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
