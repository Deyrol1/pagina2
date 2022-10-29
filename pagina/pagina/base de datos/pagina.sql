-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2022 a las 03:37:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_habitacion`
--

CREATE TABLE `categoria_habitacion` (
  `tipo_habitacion` varchar(20) NOT NULL,
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_habitacion`
--

INSERT INTO `categoria_habitacion` (`tipo_habitacion`, `Valor`) VALUES
('doble', 2500000),
('familiar', 100000),
('personal', 20000),
('suite', 200000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_habitacion`
--

CREATE TABLE `estado_habitacion` (
  `estado` varchar(20) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_habitacion`
--

INSERT INTO `estado_habitacion` (`estado`, `numero`) VALUES
('Disponible', 1),
('Limpieza', 2),
('Mantenimiento', 3),
('Ocupado', 4),
('Sucio', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `numero` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`numero`, `costo`, `estado`, `tipo`) VALUES
(134, 100000, 'Disponible', 'familiar'),
(1313, 20000, 'Ocupado', 'personal'),
(6346435, 200000, 'Disponible', 'suite'),
(18275187, 2500000, 'Ocupado', 'doble'),
(2147483647, 2500000, 'Disponible', 'doble');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `pass` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `pass`) VALUES
(5, 'miau', '1234'),
(6, 'miau', '1234'),
(7, 'miau', '1234'),
(8, 'miau', '1234'),
(9, 'miau', '1234'),
(10, 'miau', '1234'),
(11, 'miau', '1234'),
(12, 'miau', '1234'),
(13, 'miau', '1234'),
(14, 'miau', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prereserva`
--

CREATE TABLE `prereserva` (
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_completa`
--

CREATE TABLE `reserva_completa` (
  `numero` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `tipo_habitacion` varchar(45) NOT NULL,
  `num_habitacion` int(45) NOT NULL,
  `dias` int(11) NOT NULL,
  `valor_a_pagar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva_completa`
--

INSERT INTO `reserva_completa` (`numero`, `fecha_inicio`, `fecha_fin`, `Cedula`, `Nombre`, `tipo_habitacion`, `num_habitacion`, `dias`, `valor_a_pagar`) VALUES
(0, '2022-07-08', '2022-07-10', 127517825, 'kjgkgj', 'doble', 18275187, 2, 5000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `tipo`) VALUES
(123, 'Luis', 'Admin'),
(76464, 'Miguel', 'Recepcionista'),
(32542542, '&lt;script src&quot;', 'Recepcionista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_habitacion`
--
ALTER TABLE `categoria_habitacion`
  ADD PRIMARY KEY (`tipo_habitacion`),
  ADD UNIQUE KEY `tipo_habitacion` (`tipo_habitacion`);

--
-- Indices de la tabla `estado_habitacion`
--
ALTER TABLE `estado_habitacion`
  ADD PRIMARY KEY (`estado`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `habitacion_ibfk_2` (`estado`),
  ADD KEY `foranea1` (`tipo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prereserva`
--
ALTER TABLE `prereserva`
  ADD PRIMARY KEY (`Cedula`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `reserva_completa`
--
ALTER TABLE `reserva_completa`
  ADD PRIMARY KEY (`Cedula`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_habitacion`
--
ALTER TABLE `estado_habitacion`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `prereserva`
--
ALTER TABLE `prereserva`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `foranea1` FOREIGN KEY (`tipo`) REFERENCES `categoria_habitacion` (`tipo_habitacion`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
