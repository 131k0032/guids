-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2019 a las 18:24:21
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
-- Base de datos: `guidsthree`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `tour_date` date NOT NULL,
  `tourist_quantyty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `src` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `tour_schedule_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`id`, `tour_date`, `tourist_quantyty`, `status`, `name`, `lastname`, `phone`, `email`, `src`, `file_name`, `created_at`, `updated_at`, `tour_schedule_id`, `tour_id`) VALUES
(1, '0000-00-00', 4, 1, 'Jon', 'Know Seen', '111', 'jon@gmail.com', NULL, NULL, '2019-04-22', NULL, 4, 3),
(3, '0000-00-00', 13, 0, 'Peter', 'Smith Orton', '1111111311', 'orton@ceo.com', NULL, NULL, '2019-04-22', NULL, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Español'),
(2, 'Maya'),
(3, 'Inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `find_guide` text NOT NULL,
  `location` varchar(80) NOT NULL,
  `duration` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tour`
--

INSERT INTO `tour` (`id`, `name`, `description`, `find_guide`, `location`, `duration`, `capacity`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'La quinta avenida', 'Muy bueno', 'Con una bici roja', 'Playa del carmen', '1-h', 5, 0, '2019-04-21', NULL, 1),
(2, 'Laguna Azul', 'Muy bueno', 'Con mi auto negro', 'Senior', '1-h', 10, 0, '2019-04-21', NULL, 1),
(3, 'Ruinas de Tulum', 'Muy bueno', 'Con mi motocicleta', 'Tulum', '1:45-h', 10, 0, '2019-04-21', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour_image`
--

CREATE TABLE `tour_image` (
  `id` int(11) NOT NULL,
  `src` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tour_image`
--

INSERT INTO `tour_image` (`id`, `src`, `file_name`, `tour_id`) VALUES
(1, 'view/images/tours/', 'quintaavenida.jpg', 1),
(2, 'view/images/tours/', 'lagunazul.jpg', 2),
(3, 'view/images/tours/', 'tulum.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour_schedule`
--

CREATE TABLE `tour_schedule` (
  `id` int(11) NOT NULL,
  `start_at` varchar(45) NOT NULL,
  `day_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tour_schedule`
--

INSERT INTO `tour_schedule` (`id`, `start_at`, `day_id`, `tour_id`, `language_id`) VALUES
(1, '10:00 am', 1, 1, 1),
(2, '9:00 am', 1, 2, 2),
(3, '11:00 am', 2, 2, 2),
(4, '11:45 am', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `state` varchar(70) NOT NULL,
  `town` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `grade` varchar(45) NOT NULL,
  `personality` text,
  `ability` text,
  `picture` varchar(200) NOT NULL,
  `review` int(11) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `phone`, `email`, `password`, `state`, `town`, `age`, `grade`, `personality`, `ability`, `picture`, `review`, `is_admin`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bernabe', 'Cituk Caaamal', '111', '131k0032@itscarrillopuerto.edu.mx', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Quintanaroo', 'Felipe Carrillo Puerto', '1915-09-15', 'Mediosuperior', 'cc', 'cc', '', NULL, 0, 0, NULL, NULL),
(2, 'Juan', 'Perez cano', '1111', '131k0033@itscarrillopuerto.edu.mx', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Quintanaroo', 'JosÃ© MarÃ­a Morelos', '1909-12-15', 'Superior', 'cc', 'cc', '', NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_language`
--

CREATE TABLE `user_language` (
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_language`
--

INSERT INTO `user_language` (`user_id`, `language_id`) VALUES
(1, 1),
(2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`,`tour_schedule_id`,`tour_id`),
  ADD UNIQUE KEY `idreservas_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD UNIQUE KEY `phone` (`phone`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tour_image`
--
ALTER TABLE `tour_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
