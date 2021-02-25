-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2021 a las 14:46:35
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `id_padre` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `estado`, `fecha_alta`, `fecha_modificacion`, `fecha_baja`, `id_padre`) VALUES
(116, 'hola6@gmail.com', 'aG9sYTI=', 'Gisela', 'Molina', 1, '2021-02-24', '2021-02-25', '0000-00-00', 112),
(119, 'hola7@gmail.com', 'aG9sYQ==', 'Ramon', 'Molina', 1, '2021-02-25', '0000-00-00', '0000-00-00', 117),
(120, 'hola22@gmail.com', 'aG9sYQ==', 'Santiago', 'Rivero', 1, '2021-02-25', '0000-00-00', '0000-00-00', 117),
(121, 'hola8@gmail.com', 'aG9sYQ==', 'Aldana', 'Rivero', 1, '2021-02-25', '0000-00-00', '0000-00-00', 117),
(122, 'admin@gmail.com', 'aG9sYQ==', 'Pablo', 'Rivero', 1, '2021-02-25', '0000-00-00', '0000-00-00', 117);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
