-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2022 a las 19:37:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `nombre_actividad` varchar(50) NOT NULL,
  `objetivo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_actividad` date NOT NULL,
  `recurso_defecto` varchar(50) NOT NULL,
  `recurso_extra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_has_alumno`
--

CREATE TABLE `actividades_has_alumno` (
  `Actividades_idActividades` int(11) NOT NULL,
  `Alumno_idAlumno` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombre_alumno` varchar(45) DEFAULT NULL,
  `contrasena_alumno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idGrupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoymateria`
--

CREATE TABLE `grupoymateria` (
  `idGrupoYMateria` int(11) NOT NULL,
  `lista_asistencia` varchar(100) NOT NULL,
  `Grupo_idGrupo` varchar(5) NOT NULL,
  `Materias_idMaterias` int(11) NOT NULL,
  `Maestro_idMaestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `idMaestro` int(11) NOT NULL,
  `nombre_maestro` varchar(45) DEFAULT NULL,
  `contrasena_maestro` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`idMaestro`, `nombre_maestro`, `contrasena_maestro`) VALUES
(1, 'Julia_EHR', 'Julia_EHR'),
(2, 'Oliver_MGM', 'Oliver_MGM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idMaterias` int(11) NOT NULL,
  `nombre_materia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_has_alumno`
--

CREATE TABLE `materias_has_alumno` (
  `Materias_idMaterias` int(11) NOT NULL,
  `Alumno_idAlumno` int(11) NOT NULL,
  `calificacion_parcial1` decimal(4,2) DEFAULT NULL,
  `calificacion_parcial2` decimal(4,2) DEFAULT NULL,
  `calificacion_parcial3` decimal(4,2) DEFAULT NULL,
  `calificacion_final` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `idPadre` int(11) NOT NULL,
  `nombre_padre` varchar(45) DEFAULT NULL,
  `contrasena_padre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorado`
--

CREATE TABLE `tutorado` (
  `Alumno_idAlumno` int(11) NOT NULL,
  `Padre_idPadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividades`);

--
-- Indices de la tabla `actividades_has_alumno`
--
ALTER TABLE `actividades_has_alumno`
  ADD KEY `fk_ActividadesHasAlumno_Actividades` (`Actividades_idActividades`),
  ADD KEY `fk_ActividadesHasAlumno_Alumno` (`Alumno_idAlumno`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indices de la tabla `grupoymateria`
--
ALTER TABLE `grupoymateria`
  ADD PRIMARY KEY (`idGrupoYMateria`),
  ADD KEY `fk_GrupoYMateria_Grupo` (`Grupo_idGrupo`),
  ADD KEY `fk_GrupoYMateria_Materias` (`Materias_idMaterias`),
  ADD KEY `fk_GrupoYMateria_Maestro` (`Maestro_idMaestro`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`idMaestro`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idMaterias`);

--
-- Indices de la tabla `materias_has_alumno`
--
ALTER TABLE `materias_has_alumno`
  ADD PRIMARY KEY (`Materias_idMaterias`,`Alumno_idAlumno`),
  ADD KEY `fk_Materias_has_Alumno_Alumno1_idx` (`Alumno_idAlumno`),
  ADD KEY `fk_Materias_has_Alumno_Materias1_idx` (`Materias_idMaterias`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`idPadre`);

--
-- Indices de la tabla `tutorado`
--
ALTER TABLE `tutorado`
  ADD PRIMARY KEY (`Alumno_idAlumno`,`Padre_idPadre`),
  ADD KEY `fk_Alumno_has_Padre_Padre1_idx` (`Padre_idPadre`),
  ADD KEY `fk_Alumno_has_Padre_Alumno1_idx` (`Alumno_idAlumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupoymateria`
--
ALTER TABLE `grupoymateria`
  MODIFY `idGrupoYMateria` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades_has_alumno`
--
ALTER TABLE `actividades_has_alumno`
  ADD CONSTRAINT `fk_ActividadesHasAlumno_Actividades` FOREIGN KEY (`Actividades_idActividades`) REFERENCES `actividades` (`idActividades`),
  ADD CONSTRAINT `fk_ActividadesHasAlumno_Alumno` FOREIGN KEY (`Alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`);

--
-- Filtros para la tabla `grupoymateria`
--
ALTER TABLE `grupoymateria`
  ADD CONSTRAINT `fk_GrupoYMateria_Grupo` FOREIGN KEY (`Grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`),
  ADD CONSTRAINT `fk_GrupoYMateria_Maestro` FOREIGN KEY (`Maestro_idMaestro`) REFERENCES `maestro` (`idMaestro`),
  ADD CONSTRAINT `fk_GrupoYMateria_Materias` FOREIGN KEY (`Materias_idMaterias`) REFERENCES `materias` (`idMaterias`);

--
-- Filtros para la tabla `materias_has_alumno`
--
ALTER TABLE `materias_has_alumno`
  ADD CONSTRAINT `fk_Materias_has_Alumno_Alumno1` FOREIGN KEY (`Alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Materias_has_Alumno_Materias1` FOREIGN KEY (`Materias_idMaterias`) REFERENCES `materias` (`idMaterias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tutorado`
--
ALTER TABLE `tutorado`
  ADD CONSTRAINT `fk_Alumno_has_Padre_Alumno1` FOREIGN KEY (`Alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumno_has_Padre_Padre1` FOREIGN KEY (`Padre_idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
