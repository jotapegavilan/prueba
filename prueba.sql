-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2021 a las 20:03:55
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `clave` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `nacimiento`, `clave`) VALUES
(1, 'Juan', 'GavilÃ¡n', 'j.p.daniel.gavilan@gmail.cl', '2021-11-25', '$2y$10$TiTL99psh4iryQFFRQ4R8OEp6TEm25CNa5QaNEtoweVX9RGP/LxBm'),
(4, 'Jorge', 'Perez', 'jorge@perez.cl', '2000-05-15', '$2y$10$UtwKDBxoqijWbL.d3I7Lr.I0xkeezWfBYhmYkDirRUZm1cGJEUjBa'),
(5, 'Marta', 'Lopez', 'marta_lopez@gmail.com', '1990-01-10', '$2y$10$6dx9PYkiO7ykhXthxhsFbOhU9xC50hJjlzpunbgaBKh2DwkkTPkIC'),
(6, 'Loreto', 'ZuÃ±iga', 'loreto@xn--zuiga-pta.cl', '1991-10-10', '$2y$10$9BmIXdfVSgCuNmFWjDReCuHy5P71dmks3WhyOqqt39TuPish.dA9y'),
(7, 'Matias', 'Gomez', 'matias@gomez.cl', '1895-02-14', '$2y$10$cChB7bl5G065c6PPreWzw.uhPLcoZukNueVm0I5baX6GLs2RmZVky'),
(8, 'MarÃ­a', 'Gajardo', 'maria@gajar.cl', '1998-10-14', '$2y$10$XezFTaBxmjDw92zehJI73.PcrWIwSiCmbzhZ3BlRXfTc/Dh9O2/OS'),
(9, 'Ana', 'Gomez', 'gomez@ana.cl', '2000-01-01', '$2y$10$6dWK9IxYa0mJLLrguIfOtOZ9ZkCgzZU3r/mtaC4ytE2ZejhFquH6m');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
