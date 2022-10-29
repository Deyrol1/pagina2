-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2022 a las 03:36:33
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `cod_dep` int(11) NOT NULL,
  `nombre_dep` varchar(30) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`cod_dep`, `nombre_dep`, `ubicacion`) VALUES
(10, 'contabilidad', 'cali'),
(20, 'investigacion', 'bogota'),
(30, 'ventas', 'manizales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `f_ingreso` date NOT NULL,
  `salario` int(11) NOT NULL,
  `comision` int(11) NOT NULL,
  `deptno` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `deptno` (`deptno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`codigo`, `nombre`, `cargo`, `f_ingreso`, `salario`, `comision`, `deptno`) VALUES
(7369, 'Carlos Perdomo', 'SUPERVISOR', '1980-12-17', 800, 50, 20),
(7499, 'Fernando Velez', 'VENDEDOR', '1981-02-20', 1600, 300, 30),
(7521, 'Rosario Gomez', 'VENDEDOR', '1981-12-22', 1250, 500, 30),
(7566, 'Jones Wilson', 'AUXILIAR', '1981-04-21', 2975, 200, 20),
(7654, 'Martin Vanegas', 'VENDEDOR', '1998-03-04', 1250, 1400, 30),
(7698, 'Blake Salas', 'AUXILIAR', '2003-08-04', 2850, 150, 30),
(7782, 'Clark Ken', 'AUXILIAR', '2006-11-30', 2450, 1200, 10),
(7788, 'Alma Scott', 'ANALISTA', '2004-07-14', 3000, 0, 20),
(7839, 'Clara Lopez', 'PRESIDENTE', '1998-11-11', 5000, 0, 10),
(7844, 'Zoila Estrada', 'VENDEDOR', '2007-10-03', 1500, 1300, 30),
(7876, 'Diego Perez', 'SUPERVISOR', '1999-11-03', 1100, 100, 20),
(7900, 'Ximena Rugeles', 'SUPERVISOR', '2000-12-20', 950, 2500, 30),
(7902, 'Viviana Morales', 'ANALISTA', '2001-11-11', 3000, 1800, 20),
(7934, 'Tito Lopez', 'SUPERVISOR', '2006-06-05', 1300, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `login` varchar(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `login`, `password`, `estado`) VALUES
(1, 'Ferney Osma', 'ferneyo', '12345678', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`deptno`) REFERENCES `departamento` (`cod_dep`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
