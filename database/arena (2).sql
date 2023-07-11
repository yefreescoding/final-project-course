-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2023 a las 20:39:52
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
-- Base de datos: `arena`
--
CREATE DATABASE IF NOT EXISTS `arena` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `arena`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boxers`
--

CREATE TABLE `boxers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `record` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `p4p_ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boxers`
--

INSERT INTO `boxers` (`id`, `name`, `weight`, `record`, `country`, `p4p_ranking`) VALUES
(1, 'Anthony Joshua', 240, '24-1-0', 'United Kingdom', 13),
(2, 'Tyson Fury', 260, '30-0-1', 'United Kingdom', 16),
(3, 'Canelo Alvarez', 168, '56-1-2', 'Mexico', 1),
(4, 'Terence Crawford', 147, '37-0-0', 'USA', 2),
(5, 'Naoya Inoue', 118, '21-0-0', 'Japan', 3),
(6, 'Errol Spence Jr.', 147, '27-0-0', 'USA', 4),
(7, 'Teofimo Lopez', 135, '16-0-0', 'Honduras', 5),
(8, 'Gennady Golovkin', 160, '41-1-1', 'Kazakhstan', 6),
(9, 'Juan Francisco Estrada', 115, '42-3-0', 'Mexico', 7),
(10, 'Josh Taylor', 140, '18-0-0', 'Scotland', 8),
(11, 'Manny Pacquiao', 147, '62-7-2', 'Philippines', 9),
(12, 'Vasyl Lomachenko', 135, '14-2-0', 'Ukraine', 10),
(13, 'Stephen Fulton', 122, '21-0-0', 'USA', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fights`
--

CREATE TABLE `fights` (
  `id` int(11) NOT NULL,
  `boxer1_id` int(11) NOT NULL,
  `boxer2_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fights`
--

INSERT INTO `fights` (`id`, `boxer1_id`, `boxer2_id`, `date`, `place`) VALUES
(1, 7, 9, '2023-07-15', 'Las Vegas, Nevada. USA.'),
(2, 5, 13, '2023-07-17', 'Tokyo, Japon.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boxers`
--
ALTER TABLE `boxers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fights`
--
ALTER TABLE `fights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boxer1_id` (`boxer1_id`),
  ADD KEY `boxer2_id` (`boxer2_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boxers`
--
ALTER TABLE `boxers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fights`
--
ALTER TABLE `fights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fights`
--
ALTER TABLE `fights`
  ADD CONSTRAINT `fights_ibfk_1` FOREIGN KEY (`boxer1_id`) REFERENCES `boxers` (`id`),
  ADD CONSTRAINT `fights_ibfk_2` FOREIGN KEY (`boxer2_id`) REFERENCES `boxers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
