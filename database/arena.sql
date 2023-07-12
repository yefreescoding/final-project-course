-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2023 a las 19:12:22
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
(3, 'Canelo Alvarez', 168, '56-1-2', 'Mexico', 5),
(4, 'Terence Crawford', 147, '37-0-0', 'USA', 3),
(5, 'Naoya Inoue', 118, '21-0-0', 'Japan', 2),
(6, 'Errol Spence Jr.', 147, '27-0-0', 'USA', 4),
(7, 'Teofimo Lopez', 135, '16-0-0', 'Honduras', 5),
(8, 'Gennady Golovkin', 160, '41-1-1', 'Kazakhstan', 6),
(9, 'Juan Francisco Estrada', 115, '42-3-0', 'Mexico', 7),
(10, 'Josh Taylor', 140, '18-0-0', 'Scotland', 8),
(11, 'Manny Pacquiao', 147, '62-7-2', 'Philippines', 9),
(12, 'Vasyl Lomachenko', 135, '14-2-0', 'Ukraine', 10),
(13, 'Stephen Fulton', 122, '21-0-0', 'USA', 20),
(14, 'Jake Paul', 186, '6-1-0', 'United States', 99),
(15, 'Nate Diaz', 184, '0-0-0', 'United States', 999),
(16, 'Emanuel Navarrete', 130, '37-1-0', 'Mexico', 17),
(17, 'Óscar Valdez', 130, '30-1-0', 'Mexico', 24),
(18, 'Dillan Whyte', 247, '29-3-0', 'Reino unido', 20),
(19, 'Daniel Dubois', 245, '19-1-0', 'Reino Unido', 17),
(20, 'Oleksander Usyk', 245, '20-0-0', 'Ucrania', 1),
(21, 'Dmitry Bivol', 165, '21-0-0', 'Rusia', 6),
(22, 'Artur Beterbiev', 168, '19-0-0', 'Rusia', 19),
(23, 'Callum Smith', 168, '20-0-0', 'Reino Unido', 29),
(24, 'Jermell Charlo', 150, '35-1-1', 'Estados Unidos', 18);

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
(1, 14, 15, '2023-08-05', 'Dallas, Texas. USA.'),
(2, 5, 13, '2023-07-25', 'Tokyo, Japon.'),
(3, 6, 4, '2023-07-29', 'Las Vegas, Nevada. USA.'),
(4, 16, 17, '2023-08-12', 'Glendale, Arizona. USA.'),
(5, 1, 18, '2023-08-12', 'Londres, Inglaterra.'),
(6, 20, 19, '2023-08-26', 'Wroclaw, Poland.'),
(7, 22, 23, '2023-08-19', 'Quebec, Canada.'),
(8, 3, 24, '2023-09-30', 'Las Vegas, Nevada. USA.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `fights`
--
ALTER TABLE `fights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
