-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-06-2016 a las 18:09:24
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Bodega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id` int(11) NOT NULL,
  `Sub` int(11) NOT NULL,
  `Buen_Estado_Cantidad` int(11) NOT NULL,
  `Mal_Estado_Cantidad` int(11) NOT NULL,
  `Reparar_Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id`, `Sub`, `Buen_Estado_Cantidad`, `Mal_Estado_Cantidad`, `Reparar_Cantidad`) VALUES
(1, 1, 40, 0, 55),
(2, 2, 21, 0, 0),
(3, 5, 46, 0, 0),
(4, 6, 20, 0, 0),
(5, 7, 30, 0, 0),
(6, 8, 15, 0, 0),
(7, 9, 15, 0, 0),
(8, 10, 11, 0, 0),
(9, 11, 1, 0, 0),
(10, 12, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `Id` int(11) NOT NULL,
  `Producto` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `Presentacion` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Kit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`Id`, `Producto`, `Presentacion`, `Cantidad`, `Kit`) VALUES
(1, 'Martillo Madera', 'Unidad', 95, 2),
(2, 'Martillo Metal', 'Unidad', 21, 1),
(5, 'Desarmador de Estrella', 'Unidad', 46, 3),
(6, 'Pasadores', 'Unidad', 20, 4),
(7, 'Bisagras', 'Unidad', 30, 9),
(8, 'Armellas', 'Unidad', 15, 2),
(9, 'Clavo de 5"', 'Libra', 15, 3),
(10, 'Clavo de 4"', 'Libra', 11, 3),
(11, 'Clavo de 3"', 'Libra', 1, 3),
(12, 'Clavo de Lamina', 'Libra', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `Id` int(11) NOT NULL,
  `Producto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Presentacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Expira` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`Id`, `Producto`, `Presentacion`, `Cantidad`, `Expira`) VALUES
(1, 'Frijol', 'Lata 12 ONZ', 11, '2015-12-15'),
(2, 'Arroz', 'Bolsa 1lb', 23, '2016-08-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'Techo', '$2y$10$MjY4ZGI0YjZjZTg4YjczNep5sb3qQd9nomjBm7ivqxfNx7s8ZN8Dq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Sub_Codigo` (`Sub`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
