-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2022 a las 01:12:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_mysql_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `title`, `description`) VALUES
(2, 'create a website', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task2`
--

CREATE TABLE `task2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `appaterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apmaterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numerodeempleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `task2`
--

INSERT INTO `task2` (`id`, `nombre`, `appaterno`, `apmaterno`, `numerodeempleado`) VALUES
(2, 'Rosendo', 'Vazques', 'w', '12313');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task3`
--

CREATE TABLE `task3` (
  `id` int(11) NOT NULL,
  `nombremateria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `materiasemestre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `task3`
--

INSERT INTO `task3` (`id`, `nombremateria`, `materiasemestre`) VALUES
(5, 'Calculo Aplicada', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task4`
--

CREATE TABLE `task4` (
  `id` int(11) NOT NULL,
  `programaacademico` varchar(255) NOT NULL,
  `unidaddeaprendizaje` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `vigencia` date NOT NULL,
  `proposito` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `task4`
--

INSERT INTO `task4` (`id`, `programaacademico`, `unidaddeaprendizaje`, `semestre`, `vigencia`, `proposito`) VALUES
(11, 'Ingenieria en Sistemas Computacionales', 'Calculo Aplicado', '', '2022-11-24', 'sadasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'felix@outlook.com', '$2y$10$vfUJNsYjhCKacZdMHsimsO.zOGBiORObFODZRcCI7iRY0/cV5z3xu'),
(2, 'felix@outlook.com', '$2y$10$QCWxYVZso3YhB5MMC.7u/.KIQnTsOsYwW7CHmCfX6JO.R0rUMI.Um'),
(3, 'axel@hotmail.com', '$2y$10$JXmVl34jPM0IhNsv2K0BdeDRrb49qDPW/yhsKVYUk1OAHJkKYIJJy'),
(4, 'brandon@caca.com', '$2y$10$Ij.YSQq/DkZFjG/u3yRRUO.92iib7peNXrKtlgiKlZS/MYFz8NUO2'),
(5, 'luis@ui.com', '$2y$10$fSbz5J6DnJ4jFBTUqq.rtuZJM3xsbL8hbm.nLV.RNl4GPyoRYedBu'),
(6, 'dedede', '$2y$10$z49W9fdhB0pBdxbAXXR8O.oOqeJ6LPgZxqHmEXGB1dXf.tidwMEZO'),
(7, 'alo@c.com', '$2y$10$fiR.eFTNL3RQ8jrPQfxsfOVrqxkWbbGv95hp4ChngX6ISYzWagQba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_ususario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_usu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task2`
--
ALTER TABLE `task2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task3`
--
ALTER TABLE `task3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task4`
--
ALTER TABLE `task4`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_ususario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `task2`
--
ALTER TABLE `task2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `task3`
--
ALTER TABLE `task3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `task4`
--
ALTER TABLE `task4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_ususario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
