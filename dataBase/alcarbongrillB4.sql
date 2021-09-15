-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2021 a las 16:13:19
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alcarbongrillB4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `DNI` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Clave` text NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`DNI`, `Nombre`, `Apellidos`, `Telefono`, `Direccion`, `Clave`, `rol`) VALUES
(87654321, 'Smith', 'Corvacho Alvarez', 987654321, 'Santa Teresa', '5e8667a439c68f5145dd2fcbecf02209', 1),
(87654320, 'Administrador', 'Del Sistema', 987654321, 'cusco', '5e8667a439c68f5145dd2fcbecf02209', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `Categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `Categoria`) VALUES
(1, 'Parrillas'),
(2, 'Cortes a la parrillas'),
(3, 'Variados a Ia parrilla'),
(4, 'Piqueos'),
(5, 'Pollos a la braza'),
(6, 'Platos a la carta'),
(7, 'Vegetarianos'),
(8, 'Adicionales'),
(9, 'Postres'),
(10, 'Bebidas frías'),
(11, 'Bebidas calientes'),
(12, 'Cocteles'),
(13, 'Cocteles sin alcohol'),
(14, 'Vinos'),
(15, 'Macerados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `DNI` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Clave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DNI`, `Nombre`, `Apellidos`, `Telefono`, `Direccion`, `Clave`) VALUES
(87654320, 'Sarai', 'Salizar', 987654321, 'Santa teresa', '5e8667a439c68f5145dd2fcbecf02209'),
(87654321, 'Juan', 'Contreras', 987654321, 'Santa teresa', '5e8667a439c68f5145dd2fcbecf02209'),
(87654322, 'Waldir', 'Ttito', 987654321, 'Santa teresa', '5e8667a439c68f5145dd2fcbecf02209'),
(87654323, 'Gianella', 'Oviedo', 987654321, 'Santa teresa', '5e8667a439c68f5145dd2fcbecf02209'),
(87654324, 'Smith', 'Corvacho', 987654321, 'Santa teresa', '5e8667a439c68f5145dd2fcbecf02209');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabanco`
--

CREATE TABLE `cuentabanco` (
  `id` int(11) NOT NULL,
  `Numero` int(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Beneficiario` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentabanco`
--

INSERT INTO `cuentabanco` (`id`, `Numero`, `Nombre`, `Beneficiario`, `Tipo`) VALUES
(2, 24748364724344, 'BCP', 'Administrador', 'Corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `NumPedido` int(11) NOT NULL,
  `CodigoProd` varchar(255) NOT NULL,
  `CantidadProductos` int(11) NOT NULL,
  `PrecioProd` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `CodigoProd` varchar(255) NOT NULL,
  `NombreProd` varchar(255) NOT NULL,
  `Categoria_id` int(11) NOT NULL,
  `Precio` decimal(30,2) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Cocinero_dni` int(11) NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
-- Con guarnicion de papas andinas y buffet de ensaladas

INSERT INTO `producto` (`id`, `CodigoProd`, `NombreProd`, `Categoria_id`, `Precio`, `Descripcion`, `Cocinero_dni`, `Imagen`) VALUES
(1, 'p001', 'Parrilla personal', 1, '35.00', '- Bife de res\r\n- Chuleta de cerdo\r\n- Chorizo\r\n- Mollejitas\r\n- Salchicha,\r\n- Porción de papas andinas\r\n- Porción de ensalada', 87654321, 'p001.png'),
(2, 'p002', 'Parrilla carbón', 1, '75.00', '- Bife de res\r\n- Pechuga de pollo\r\n- 2 palitos de anticucho\r\n- Chuleta de cerdo\r\n- 1/8 de pollo a la brasa chorizo\r\n- Mollejita\r\n- Salchicha\r\n- Porción de papas andinas\r\n- Porción de ensalada.', 87654321, 'p002.png'),
(3, 'p003', 'Parrilla familiar', 1, '120.00', '- 2 bifes\r\n- 2 chuletas de cerdo\r\n- 2 pechugas de pollo\r\n- 1/4 de pollo a la brasa\r\n- 2 chorizos\r\n- 2 palitos de anticuchos de corazón\r\n- Mollejitas\r\n- Salchicha\r\n- Porción de papas andinas\r\n- Porción de ensalada', 87654321, 'p003.png'),
(4, 'cp001', 'Lomo Fino', 2, '25.00', '250 gr.', 87654321, 'cp001.png'),
(5, 'cp002', 'Picaña', 2, '22.00', '250 gr.', 87654321, 'cp002.png'),
(6, 'cp003', 'Asado de Tira', 2, '20.00', '250 gr.', 87654321, 'cp003.png'),
(7, 'cp004', 'Bife', 2, '20.00', '250 gr.', 87654321, 'cp004.png'),
(8, 'vp001', 'Chuleta de Cerdo', 3, '16.00', '250 gr.', 87654321, 'vp001.png'),
(9, 'vp002', 'Pechuga de Pollo', 3, '15.00', '220 gr.', 87654321, 'vp002.png'),
(10, 'vp003', 'Costillas de Cerdo', 3, '18.00', '3 Unidades', 87654321, 'vp003.png'),
(11, 'vp004', 'Anticucho de corazón', 3, '12.00', '2 Unidades', 87654321, 'vp004.png'),
(12, 'vp005', 'Costillas de cerdo BBQ', 3, '20.00', '', 87654321, 'vp005.png'),
(13, 'pq001', 'Alitas en Salsa BBQ', 4, '8.50', 'Con guarnición de papas andinas y buffet de ensaladas', 87654321, 'pq001.png'),
(14, 'pq002', 'Alitas Búfalo (Picante)', 4, '9.00', 'Con guarnición de papas andinas y buffet de ensaladas', 87654321, 'pq002.png'),
(15, 'pq003', 'Salchipapas', 4, '6.00', 'Con guarnición de papas andinas y buffet de ensaladas', 87654321, 'pq003.png'),
(16, 'pq004', 'Brocheta de Pollo', 4, '12.00', 'Con guarnición de papas andinas y buffet de ensaladas', 87654321, 'pq004.png'),
(17, 'pq005', 'Mollejitas de Pollo', 4, '8.50', 'Con guarnición de papas andinas y buffet de ensaladas', 87654321, 'pq005.png'),
(18, 'pb001', '1/8 de pollo', 5, '8.50', 'Con guarnición de papas andinas, arroz chaufa y buffet de ensaladas', 87654321, 'pb001.png'),
(19, 'pb002', '1/4 de pollo', 5, '16.00', 'Con guarnición de papas andinas, arroz chaufa y buffet de ensaladas', 87654321, 'pb002.png'),
(20, 'pb003', '1/2 de pollo', 5, '30.00', 'Con guarnición de papas andinas, arroz chaufa y buffet de ensaladas', 87654321, 'pb003.png'),
(21, 'pb004', '1 Pollo entero', 5, '59.00', 'Con guarnición de papas andinas, arroz chaufa y buffet de ensaladas', 87654321, 'pb004.png'),
(22, 'pb005', 'Pollo broaster', 5, '8.50', 'Con guarnición de papas andinas, arroz chaufa y buffet de ensaladas', 87654321, 'pb005.png'),
(23, 'pb006', 'Salchipollo', 5, '10.00', '1/8 de pollo + Salchicha + Papas andinas + Arroz chaufa + Ensaladas', 87654321, 'pb006.png'),
(24, 'pb007', 'Choripollo', 5, '12.50', '1/8 de pollo + Chorizo + Papas andinas + Arroz chaufa + Ensaladas', 87654321, 'pb007.png'),
(25, 'pc001', 'Lomo Saltado', 6, '18.00', '', 87654321, 'pc001.png'),
(26, 'pc002', 'Tallarín Saltado', 6, '18.00', '', 87654321, 'pc002.png'),
(27, 'pc003', 'Fetuccini alfredo o al Pesto', 6, '12.00', '', 87654321, 'pc003.png'),
(28, 'pc004', 'Fetuccini alfredo con Pechuga', 6, '17.00', '', 87654321, 'pc004.png'),
(29, 'pc005', 'Dieta de pollo', 6, '12.00', 'Trozos de Pechuga de Pollo, cabello de ángel y verduras', 87654321, 'pc005.png'),
(30, 'pc006', 'Sopa criolla', 6, '12.00', 'Trocitos de carne picada, cabello de ángel, huevo y leche', 87654321, 'pc006.png'),
(31, 'v001', 'Tallarín Saltado con Verduras', 7, '15.00', '', 87654321, 'v001.png'),
(32, 'v002', 'Arroz Chaufa con Verduras', 7, '13.00', '', 87654321, 'v002.png'),
(33, 'v003', 'Brochetas de Verduras', 7, '12.00', '', 87654321, 'v003.png'),
(34, 'a001', 'Porción de Arroz chaufa', 8, '3.50', '', 87654321, 'a001.png'),
(35, 'a002', 'Porción de Arroz blanco', 8, '2.50', '', 87654321, 'a002.png'),
(36, 'a003', 'Porción de Papas andinas', 8, '4.00', '', 87654321, 'a003.png'),
(37, 'a004', 'Porción de ensalada', 8, '3.00', '', 87654321, 'a004.png'),
(38, 'bf001', 'Limonada clásica jarra', 10, '6.00', '1 jarra', 87654321, 'bf001.png'),
(39, 'bf002', 'Limonada clásica frozen', 10, '7.00', '1 jarra', 87654321, 'bf002.png'),
(40, 'bf003', 'Limonada clásica', 10, '3.50', '1/2 jarra', 87654321, 'bf003.png'),
(41, 'bf004', 'Limonada roja jarra', 10, '7.00', '1 jarra', 87654321, 'bf004.png'),
(42, 'bf005', 'Limonada roja frozen', 10, '8.00', '1 jarra', 87654321, 'bf005.png'),
(43, 'bf006', 'Limonada roja', 10, '4.00', '1/2 jarra', 87654321, 'bf006.png'),
(44, 'bf007', 'Limonada digestiva jarra', 10, '7.00', '1 jarra', 87654321, 'bf007.png'),
(45, 'bf008', 'Limonada digestiva frozen', 10, '8.00', '1 jarra', 87654321, 'bf008.png'),
(46, 'bf009', 'Limonada digestiva', 10, '4.00', '1/2 jarra', 87654321, 'bf009.png'),
(47, 'bf010', 'Limonada turquesa jarra', 10, '7.00', '1 jarra', 87654321, 'bf010.png'),
(48, 'bf011', 'Limonada turquesa frozen', 10, '8.00', '1 jarra', 87654321, 'bf011.png'),
(49, 'bf012', 'Limonada turquesa', 10, '4.00', '1/2 jarra', 87654321, 'bf012.png'),
(50, 'bf013', 'Jugo de maracuyá jarra', 10, '7.00', '1 jarra', 87654321, 'bf013.png'),
(51, 'bf014', 'Jugo de maracuyá frozen', 10, '8.00', '1 jarra', 87654321, 'bf014.png'),
(52, 'bf015', 'Jugo de maracuyá', 10, '4.00', '1/2 jarra', 87654321, 'bf015.png'),
(53, 'bf016', 'Chicha morada jarra', 10, '7.00', '1 jarra', 87654321, 'bf016.png'),
(54, 'bf017', 'Chicha morada', 10, '4.00', '1/2 jarra', 87654321, 'bf017.png'),
(55, 'bc001', 'Infusion de manzanilla', 11, '2.00', '', 87654321, 'bc001.png'),
(56, 'bc002', 'Infusión de anís', 11, '2.00', '', 87654321, 'bc002.png'),
(57, 'bc003', 'Infusión de muña', 11, '2.00', '', 87654321, 'bc003.png'),
(58, 'bc004', 'Infusión de coca', 11, '2.00', '', 87654321, 'bc004.png'),
(59, 'bc005', 'Café', 11, '3.00', '', 87654321, 'bc005.png'),
(60, 'c001', 'Pisco sour', 12, '10.00', '', 87654321, 'c001.png'),
(61, 'c002', 'Cuba libre', 12, '10.00', '', 87654321, 'c002.png'),
(62, 'c003', 'Machupicchu', 12, '12.00', '', 87654321, 'c003.png'),
(63, 'c004', 'Maracuyá sour', 12, '10.00', '', 87654321, 'c004.png'),
(64, 'c005', 'Mojito', 12, '10.00', '', 87654321, 'c005.png'),
(65, 'vi001', 'Tabernero borgoña', 14, '28.00', 'Botella 750 ml', 87654321, 'vi001.png'),
(66, 'vi002', 'Tabernero borgoña copa', 14, '8.00', '1 copa', 87654321, 'vi002.png'),
(67, 'vi003', 'Santiago Queirolo', 14, '28.00', 'Botella 750 ml', 87654321, 'vi003.png'),
(68, 'vi004', 'Santiago Queirolo copa', 14, '8.00', '1 copa', 87654321, 'vi004.png'),
(69, 'vi005', 'Estancia Mendoza', 14, '45.00', 'Botella 750 ml', 87654321, 'vi005.png'),
(70, 'vi006', 'Casillero del diablo', 14, '45.00', 'Botella 750 ml', 87654321, 'vi006.png'),
(71, 'vi007', 'Navarro correas', 14, '60.00', 'Botella 750 ml', 87654321, 'vi007.png'),
(72, 'vi008', 'Sangría jarra', 14, '28.00', '1 jarra', 87654321, 'vi008.png'),
(73, 'vi009', 'Sangría', 14, '15.00', '1/2 jarra', 87654321, 'vi009.png'),
(74, 'ph001', '1 Bola de helado', 9, '2.00', '', 87654321, 'ph001.png'),
(75, 'ph002', '2 Bola de helado', 9, '3.50', '', 87654321, 'ph002.png'),
(76, 'ph003', 'Crepes con helado', 9, '5.00', '', 87654321, 'ph003.png'),
(77, 'cs001', 'Limonada frozen con granadina', 13, '4.00', '1 vaso', 87654321, 'cs001.png'),
(78, 'cs002', 'Shirley temple', 13, '3.50', '1 vaso\r\nSprite - jarabe de granadina - limón', 87654321, 'cs002.png'),
(79, 'cs003', 'Frozen (amar y fuego)', 13, '5.00', '1 vaso\r\nlimonada frozen con hierba buena y granadina', 87654321, 'cs003.png'),
(80, 'm001', 'Hierba luisa', 15, '5.00', 'Shot (1 Onza)', 87654321, 'm001.png'),
(81, 'm002', 'Café', 15, '5.00', 'Shot (1 Onza)', 87654321, 'm002.png'),
(82, 'm003', 'Coca', 15, '5.00', 'Shot (1 Onza)', 87654321, 'm003.png'),
(83, 'm004', 'Maracuyá', 15, '5.00', 'Shot (1 Onza)', 87654321, 'm004.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `NumPedido` int(11) NOT NULL,
  `Fecha` varchar(255) NOT NULL,
  `Cliente_dni` int(11) NOT NULL,
  `TotalPagar` decimal(30,2) NOT NULL,
  `Estado` varchar(255) NOT NULL,
  `TipoPago` varchar(255) NOT NULL,
  `NumeroDeposito` varchar(255) NOT NULL,
  `TipoEnvio` varchar(255) NOT NULL,
  `Adjunto` varchar(255) NOT NULL,
  `Repartidor_dni` int(11) DEFAULT NULL,
  `DirRef` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD KEY `NumPedido` (`NumPedido`),
  ADD KEY `CodigoProd` (`CodigoProd`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Categoria_id` (`Categoria_id`),
  ADD KEY `Cocinero_dni` (`Cocinero_dni`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`NumPedido`),
  ADD KEY `Cliente_dni` (`Cliente_dni`),
  ADD KEY `Cliente_dni_2` (`Cliente_dni`),
  ADD KEY `Repartidor_dni` (`Repartidor_dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `NumPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`NumPedido`) REFERENCES `venta` (`NumPedido`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`Categoria_id`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`Cliente_dni`) REFERENCES `cliente` (`DNI`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_5` FOREIGN KEY (`Repartidor_dni`) REFERENCES `administrador` (`DNI`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
