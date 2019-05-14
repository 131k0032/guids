-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 23:25:41
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guidsfour`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--
CREATE SCHEMA IF NOT EXISTS `guidsfour` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `guidsfour` ;


CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `tour_date` date NOT NULL,
  `tourist_quantyty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `tour_schedule_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `day`
--

INSERT INTO `day` (`id`, `name`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Español'),
(2, 'Maya'),
(3, 'Inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `find_guide` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `start_in` mediumtext COLLATE utf8_unicode_ci,
  `location` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour_image`
--

CREATE TABLE `tour_image` (
  `id` int(11) NOT NULL,
  `src` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour_schedule`
--

CREATE TABLE `tour_schedule` (
  `id` int(11) NOT NULL,
  `start_at` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `day_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8,
  `name` varchar(65) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(75) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `state` varchar(70) CHARACTER SET utf8 NOT NULL,
  `town` varchar(50) CHARACTER SET utf8 NOT NULL,
  `age` date NOT NULL,
  `grade` varchar(45) CHARACTER SET utf8 NOT NULL,
  `personality` text CHARACTER SET utf8,
  `ability` text CHARACTER SET utf8,
  `src` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `picture` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `review` int(11) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `code`, `name`, `lastname`, `phone`, `email`, `password`, `state`, `town`, `age`, `grade`, `personality`, `ability`, `src`, `picture`, `review`, `is_admin`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '85f52cd59036b27fb77e9a8b6a1601ab61a5349f', 'Bernabe', 'Cituk Caamal', '999999', '131k0032@itscarrillopuerto.edu.mx', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Quintanaroo', 'José María Morelos', '1910-03-11', 'Superior', 'Muy bueno', 'Muy bueno', NULL, NULL, NULL, 0, 1, '2019-04-26', NULL),
(2, '59d5171829cffde31fca087a64f5c99ef58e2430', 'Ernesto Valentin', 'Caamal Peech', '9841735022', 'ernesto.valen.t@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aupHaYEpzh6IziL5qf.asNQvG.zGL.oGK', 'Quintanaroo', 'Tulum', '1995-02-14', 'Superior', 'Siempre la conquisto cuando me lo propongo', 'Mantener la verga parada por horas', NULL, NULL, NULL, 0, 1, '2019-04-26', NULL),
(3, '526c656a63aeb993c9c59c2780b097e221ded194', 'Desarrollador', 'Jr', 'administra', 'admin@admin.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Quintanaroo', 'Cozumel', '1900-01-01', 'Diplomadosycursos', 'Administrador: user admin@admin.com password admin', 'administrador', NULL, NULL, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_language`
--

CREATE TABLE `user_language` (
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_language`
--

INSERT INTO `user_language` (`user_id`, `language_id`) VALUES
(1, 1),
(2, 1),
(3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`,`tour_schedule_id`,`tour_id`),
  ADD UNIQUE KEY `idreservas_UNIQUE` (`id`),
  ADD KEY `fk_reservas_horario_tour1_idx` (`tour_schedule_id`),
  ADD KEY `fk_booking_tour1_idx` (`tour_id`);

--
-- Indices de la tabla `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idday_UNIQUE` (`id`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idlanguage_UNIQUE` (`id`);

--
-- Indices de la tabla `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`,`tour_id`,`user_id`),
  ADD KEY `fk_review_tour1_idx` (`tour_id`),
  ADD KEY `fk_review_user1_idx` (`user_id`);

--
-- Indices de la tabla `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD UNIQUE KEY `idtour_UNIQUE` (`id`),
  ADD KEY `fk_tour_user1_idx` (`user_id`);

--
-- Indices de la tabla `tour_image`
--
ALTER TABLE `tour_image`
  ADD PRIMARY KEY (`id`,`tour_id`),
  ADD UNIQUE KEY `idimagenes_UNIQUE` (`id`),
  ADD KEY `fk_imagenes_tour_idx` (`tour_id`);

--
-- Indices de la tabla `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD PRIMARY KEY (`id`,`day_id`,`tour_id`,`language_id`),
  ADD UNIQUE KEY `idhorario_tour_UNIQUE` (`id`),
  ADD KEY `fk_horario_tour_tour1_idx` (`tour_id`),
  ADD KEY `fk_horario_tour_day1_idx` (`day_id`),
  ADD KEY `fk_horario_tour_language1_idx` (`language_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idguide_UNIQUE` (`id`);

--
-- Indices de la tabla `user_language`
--
ALTER TABLE `user_language`
  ADD PRIMARY KEY (`user_id`,`language_id`),
  ADD KEY `fk_user_has_language_language1_idx` (`language_id`),
  ADD KEY `fk_user_has_language_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `day`
--
ALTER TABLE `day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tour_image`
--
ALTER TABLE `tour_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_tour1` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservas_horario_tour1` FOREIGN KEY (`tour_schedule_id`) REFERENCES `tour_schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_tour1` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_review_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `fk_tour_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tour_image`
--
ALTER TABLE `tour_image`
  ADD CONSTRAINT `fk_imagenes_tour` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD CONSTRAINT `fk_horario_tour_day1` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_tour_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_tour_tour1` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_language`
--
ALTER TABLE `user_language`
  ADD CONSTRAINT `fk_user_has_language_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_language_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
