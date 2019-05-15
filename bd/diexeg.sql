-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2019 a las 01:37:36
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diexeg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `usuario_id`, `descripcion`) VALUES
(8, 55, 'Registro de una nueva cita'),
(9, 55, 'Elimino una cita'),
(10, 55, 'Actualizo los datos de un paciente'),
(11, 55, 'Registro ha un paciente'),
(12, 55, 'Elimino un personal'),
(13, 55, 'Actualizo los datos de un personal'),
(14, 55, 'Registro un personal nuevo'),
(15, 55, 'Elimino un usuario'),
(16, 55, 'Bloqueo a un usuario'),
(17, 55, 'Bloqueo a un usuario'),
(18, 55, 'Modifico el acceso de un usuario'),
(19, 55, 'Modifico el acceso de un usuario'),
(20, 55, 'Registro a un usuario nuevo'),
(21, 55, 'Modifico el acceso de un usuario'),
(22, 55, 'Modifico el acceso de un usuario'),
(23, 55, 'Registro un personal nuevo'),
(24, 55, 'Registro un personal nuevo'),
(25, 55, 'Actualizo los datos de un personal'),
(26, 55, 'Elimino un personal'),
(27, 55, 'Elimino un personal'),
(28, 55, 'Registro de una nueva cita'),
(29, 55, 'Registro de una nueva cita'),
(30, 55, 'Registro de una nueva cita'),
(31, 55, 'Registro de una nueva cita'),
(32, 55, 'Registro de una nueva cita'),
(33, 55, 'Registro de una nueva cita'),
(34, 55, 'Registro de una nueva cita'),
(35, 55, 'Registro a un usuario nuevo'),
(36, 55, 'Actualizo los datos de un paciente'),
(37, 55, 'Actualizo los datos de un paciente'),
(38, 55, 'Registro ha un paciente nuevo'),
(39, 55, 'Modifico el acceso de un usuario'),
(40, 55, 'Modifico el acceso de un usuario'),
(41, 55, 'Actualizo los datos de un paciente'),
(42, 55, 'Registro de una nueva cita'),
(43, 55, 'Registro de una nueva cita'),
(44, 55, 'Registro de una nueva cita'),
(45, 55, 'Registro a un usuario nuevo'),
(46, 60, 'Modifico el acceso de un usuario'),
(47, 60, 'Registro a un usuario nuevo'),
(48, 60, 'Registro a un usuario nuevo'),
(49, 55, 'Registro de una nueva cita'),
(50, 55, 'Registro de una nueva cita'),
(51, 55, 'Registro de una nueva cita'),
(52, 55, 'Modifico el acceso de un usuario'),
(53, 55, 'Modifico el acceso de un usuario'),
(54, 55, 'Modifico el acceso de un usuario'),
(55, 55, 'Modifico el acceso de un usuario'),
(56, 55, 'Modifico el acceso de un usuario'),
(57, 55, 'Modifico el acceso de un usuario'),
(58, 55, 'Modifico el acceso de un usuario'),
(59, 55, 'Modifico el acceso de un usuario'),
(60, 55, 'Modifico el acceso de un usuario'),
(61, 55, 'Modifico el acceso de un usuario'),
(62, 55, 'Actualizo los datos de un personal'),
(63, 55, 'Actualizo los datos de un personal'),
(64, 55, 'Elimino un personal'),
(65, 55, 'Registro un personal nuevo'),
(66, 55, 'Actualizo los datos de un personal'),
(67, 55, 'Actualizo los datos de un personal'),
(68, 55, 'Actualizo los datos de un paciente'),
(69, 55, 'Actualizo los datos de un paciente'),
(70, 55, 'Actualizo los datos de un paciente'),
(71, 55, 'Registro un personal nuevo'),
(72, 55, 'Actualizo los datos de un personal'),
(73, 55, 'Actualizo los datos de un personal'),
(74, 55, 'Modifico el acceso de un usuario'),
(75, 55, 'Modifico el acceso de un usuario'),
(76, 55, 'Registro a un usuario nuevo'),
(77, 55, 'Elimino un usuario'),
(78, 55, 'Registro a un usuario nuevo'),
(79, 55, 'Registro a un usuario nuevo'),
(80, 55, 'Registro a un usuario nuevo'),
(81, 55, 'Registro un personal nuevo'),
(82, 55, 'Registro un personal nuevo'),
(83, 55, 'Actualizo los datos de un personal'),
(84, 55, 'Actualizo los datos de un paciente'),
(85, 55, 'Registro de una nueva cita'),
(86, 55, 'Registro de una nueva cita'),
(87, 55, 'Elimino un personal'),
(88, 55, 'Elimino un usuario'),
(89, 55, 'Modifico el acceso de un usuario'),
(90, 55, 'Modifico el acceso de un usuario'),
(91, 55, 'Modifico el acceso de un usuario'),
(92, 55, 'Modifico el acceso de un usuario'),
(93, 55, 'Registro ha un paciente nuevo'),
(94, 55, 'Modifico el acceso de un usuario'),
(95, 55, 'Modifico el acceso de un usuario'),
(96, 55, 'Registro de una nueva cita'),
(97, 55, 'Registro de una nueva cita'),
(98, 55, 'Registro de una nueva cita'),
(99, 55, 'Registro de una nueva cita'),
(100, 55, 'Registro de una nueva cita'),
(101, 55, 'Elimino una cita'),
(102, 55, 'Registro de una nueva cita'),
(103, 55, 'Registro de una nueva cita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `estatus` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `paciente_id`, `medico_id`, `estatus`) VALUES
(15, '2019-01-01', '01:00:00', 5, 1, 0),
(16, '2019-01-01', '13:00:00', 5, 1, 0),
(17, '2019-01-01', '01:00:00', 5, 1, 0),
(18, '2019-01-01', '01:00:00', 4, 1, 0),
(19, '2019-01-01', '01:00:00', 4, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_sintoma`
--

CREATE TABLE `cita_sintoma` (
  `id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL,
  `sintoma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cita_sintoma`
--

INSERT INTO `cita_sintoma` (`id`, `cita_id`, `sintoma_id`) VALUES
(56, 16, 3),
(57, 16, 4),
(58, 16, 1),
(59, 16, 2),
(60, 19, 1),
(61, 19, 2),
(62, 19, 3),
(63, 19, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL,
  `enfermedad_id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `enfermedad_id`, `cita_id`) VALUES
(29, 1, 16),
(30, 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`) VALUES
(1, 'Reflujo Gastroesofágico'),
(2, 'Cálculos Biliares'),
(3, 'Enfermedad Celíaca'),
(4, 'Enfermedad de Crohn'),
(5, 'Colitis Ulcerosa'),
(6, 'Síndrome del Intestino Irritable'),
(7, 'Hemorroides'),
(8, 'Diverticulitis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_sintoma`
--

CREATE TABLE `enfermedad_sintoma` (
  `id` int(11) NOT NULL,
  `sintoma_id` int(11) NOT NULL,
  `enfermedad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermedad_sintoma`
--

INSERT INTO `enfermedad_sintoma` (`id`, `sintoma_id`, `enfermedad_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `Profesion` varchar(120) NOT NULL DEFAULT 'Gastroenterologo',
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `apellido`, `Profesion`, `estatus`) VALUES
(1, 'Luis Gabriel José', 'Lozada Frasca', 'Gastroenterologo', 1),
(2, 'Pedro', 'Fuentes', 'Gastroenterologo', 1),
(3, 'Deudelis', 'Navarro', 'Gastroenterologo', 1),
(4, 'Henry', 'Montalvos', 'Gastroenterologo', 1),
(5, 'pedro', 'carreno', 'doctor', 1),
(6, 'njnkj', 'njknjk', 'njknjk', 0),
(7, 'Luis Gabriel', 'Lozada', 'No se', 0),
(8, 'fskfndskj', 'njknjk', 'fdfdsf', 0),
(9, 'Juan', 'Perez', 'Gastroenterologo', 1),
(10, 'nuevo', 'nuevo 2', 'Secretaria', 1),
(11, 'ndsa', 'nsdfsd', 'Secretaria', 1),
(12, 'fsdf', 'fsdfds', 'Secretaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_usuario`
--

CREATE TABLE `medico_usuario` (
  `id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medico_usuario`
--

INSERT INTO `medico_usuario` (`id`, `medico_id`, `usuario_id`) VALUES
(14, 1, 55),
(17, 2, 60),
(18, 4, 61),
(20, 10, 64),
(21, 9, 65),
(22, 3, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `cedula` varchar(13) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `peso` float NOT NULL,
  `talla` float NOT NULL,
  `direccion` text NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `cedula`, `nombre`, `apellido`, `fecha_nacimiento`, `sexo`, `peso`, `talla`, `direccion`, `descripcion`, `estatus`) VALUES
(1, '20375761', 'Luis', 'Lozada', '2018-06-27', 'm', 0, 1.8, 'Carupano', 'Alto', 1),
(2, '23568741', 'jose', 'Paez', '2018-06-27', 'm', 75, 1.74, 'maturin', 'bajo', 1),
(3, '25854753', 'Juan', 'Perez', '2018-12-31', 'm', 2, 15616, 'Carupano', 'no posee descripcion', 1),
(4, '5872205', 'Lucia', 'Frasca', '1965-12-21', 'f', 65, 1.7, 'Carupano', 'Alta, blanca de ojos claros, cabello castaño claronjk', 1),
(5, '456456', 'Juan', 'Adeyan', '2019-01-01', 'm', 65, 155, 'vdnsjdsnjkdsf', 'sdsd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `oficio` varchar(120) NOT NULL DEFAULT 'Secretaria',
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `apellido`, `oficio`, `estatus`) VALUES
(1, 'Maria', 'Sifuentes', 'Secretaria', 1),
(2, 'Carolina', 'martinez', 'Secretaria', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_usuario`
--

CREATE TABLE `personal_usuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal_usuario`
--

INSERT INTO `personal_usuario` (`id`, `usuario_id`, `personal_id`) VALUES
(12, 62, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar`
--

CREATE TABLE `recuperar` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(120) NOT NULL,
  `respuesta` varchar(120) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id`, `nombre`) VALUES
(1, 'acidez estomacal'),
(2, 'mal aliento'),
(3, 'erosión en los dientes'),
(4, 'dolor en el pecho'),
(6, 'problemas para tragar'),
(7, 'problemas para respirar'),
(8, 'dolor agudo en la parte superior derecha del abdomen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `numero` varchar(14) NOT NULL,
  `paciente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nivel` varchar(120) NOT NULL DEFAULT 'Secretaria',
  `imagen` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nivel`, `imagen`, `estatus`) VALUES
(55, 'l.lozada', '$2y$10$vryPogUXyalC7w7h9/Qn4e824z.0f1caORY/9WgDjuaDtUigUJJZu', 'Administrador', '1555027329.png', 1),
(60, 'pedrof', '$2y$10$2mz7hSQgBS.icxKuJyOPKuc/y4TZoUH36WvrxZa3TMPwPMjzqgAlG', 'Administrador', 'emptyUser.png', 1),
(61, 'montalvo', '$2y$10$PHdGwA.Xp77u4UeVAR84Wu58zU28hX0sTdI3MlmK18oNuWAH1r4Hm', 'Administrador', 'emptyUser.png', 1),
(62, 'carolina', '$2y$10$vut17ckd7AjdjF8Y6fPNq.rah3ZGzwMy/IX/Ou/eB5825MEe.p1uK', 'Secretaria', 'emptyUser.png', 1),
(64, 'dsfsd', '$2y$10$EnWj7koJHJomnxp..8GqQuaJIEtsdHme/PbRPB4gqRig1d/I0uOBi', 'Administrador', '1552524677.jpg', 1),
(65, 'dg', '$2y$10$lEdhiBqnFZgfyBJ/yEs2Ce9BAguyuTUQe4W5ZNNU4KsbI5kOxMoOu', 'Administrador', '1552525254.png', 1),
(66, 'fdsfsd', '$2y$10$2dUKueHia1i9HpS.igZKKOyBa.xWNZR.b/WBcDRdE4iVulqOgmc.y', 'Administrador', 'emptyUser.png', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_id` (`medico_id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- Indices de la tabla `cita_sintoma`
--
ALTER TABLE `cita_sintoma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cita_id` (`cita_id`),
  ADD KEY `sintoma_id` (`sintoma_id`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfermedad_id` (`enfermedad_id`),
  ADD KEY `cita_id` (`cita_id`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enfermedad_sintoma`
--
ALTER TABLE `enfermedad_sintoma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfermedad_id` (`enfermedad_id`),
  ADD KEY `sintoma_id` (`sintoma_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medico_usuario`
--
ALTER TABLE `medico_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_id` (`medico_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedua` (`cedula`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_usuario`
--
ALTER TABLE `personal_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_id` (`personal_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfermedad_id` (`enfermedad_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `cita_sintoma`
--
ALTER TABLE `cita_sintoma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `enfermedad_sintoma`
--
ALTER TABLE `enfermedad_sintoma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `medico_usuario`
--
ALTER TABLE `medico_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_usuario`
--
ALTER TABLE `personal_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita_sintoma`
--
ALTER TABLE `cita_sintoma`
  ADD CONSTRAINT `cita_sintoma_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_sintoma_ibfk_2` FOREIGN KEY (`sintoma_id`) REFERENCES `sintomas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnosticos_ibfk_2` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `enfermedad_sintoma`
--
ALTER TABLE `enfermedad_sintoma`
  ADD CONSTRAINT `enfermedad_sintoma_ibfk_1` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enfermedad_sintoma_ibfk_2` FOREIGN KEY (`sintoma_id`) REFERENCES `sintomas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medico_usuario`
--
ALTER TABLE `medico_usuario`
  ADD CONSTRAINT `medico_usuario_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medico_usuario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_usuario`
--
ALTER TABLE `personal_usuario`
  ADD CONSTRAINT `personal_usuario_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_usuario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recuperar`
--
ALTER TABLE `recuperar`
  ADD CONSTRAINT `recuperar_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD CONSTRAINT `tratamientos_ibfk_1` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
