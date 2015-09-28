-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-04-2015 a las 18:51:47
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cooperativa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE IF NOT EXISTS `camiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(15) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `anio` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinarias`
--

CREATE TABLE IF NOT EXISTS `maquinarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_maquinaria_id` int(11) NOT NULL,
  `serial` varchar(30) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `propietario` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_maquinaria_id` (`tipo_maquinaria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabuladores`
--

CREATE TABLE IF NOT EXISTS `tabuladores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maquinaria_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `unidad` varchar(10) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_maquinarias`
--

CREATE TABLE IF NOT EXISTS `tipos_maquinarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipos_maquinarias`
--

INSERT INTO `tipos_maquinarias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Retroexcavadora', 'retroexcavadora'),
(2, 'Excavadora', 'excavadora');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `maquinarias`
--
ALTER TABLE `maquinarias`
  ADD CONSTRAINT `maquinarias_ibfk_1` FOREIGN KEY (`tipo_maquinaria_id`) REFERENCES `tipos_maquinarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
