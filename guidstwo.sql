-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2019 a las 15:09:44
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
-- Base de datos: `guidstwo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `tourist_quantyty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `tourist_id` int(11) NOT NULL,
  `tour_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`id`, `date`, `tourist_quantyty`, `status`, `tourist_id`, `tour_schedule_id`) VALUES
(1, '2019-04-15', 5, 1, 1, 1);

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
(1, 'Super ruinas', 'cc', 'Con una bici negra', 'Tulum', '1:30-h', 16, 0, '2019-04-20', NULL, 1),
(2, 'La quinta avenida', 'cc', 'Con una bici roja', 'Playa del carmen', '1:15-h', 17, 0, '2019-04-20', NULL, 1),
(3, 'Laguna Azul', 'Genial tour', 'Con mi abuela', 'Señor', '3:00-h', 19, 0, '2019-04-20', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tourist`
--

CREATE TABLE `tourist` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tourist`
--

INSERT INTO `tourist` (`id`, `name`, `lastname`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Connor', 'jon@gmail.com', '11', '2019-04-02', '2019-04-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour_image`
--

CREATE TABLE `tour_image` (
  `id` int(11) NOT NULL,
  `src` varchar(45) NOT NULL,
  `file_name` varchar(45) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tour_image`
--

INSERT INTO `tour_image` (`id`, `src`, `file_name`, `tour_id`) VALUES
(1, 'view/images/tours/', 'tulum.jpg', 1),
(2, 'view/images/tours/', 'quintaavenida.jpg', 2),
(3, 'view/images/tours/', 'lagunazul.jpg', 3);

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
(1, '11:15 am', 1, 1, 2),
(2, '10:15 am', 1, 2, 2),
(3, '10:15 am', 1, 3, 1),
(4, '12:00 pm', 2, 3, 1);

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
(1, 'Bernabe', 'Cituk Caamal', '9831000000', '131k0032@itscarrillopuerto.edu.mx', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'bacalar', 'Felipe Carrillo Puerto', '2019-04-20', 'Superior', 'Muy amable', 'Facilidad de palabra', 'photo.png', 0, 0, 1, '2019-04-20', '2019-04-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_language`
--

CREATE TABLE `user_language` (
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`,`tourist_id`,`tour_schedule_id`),
  ADD UNIQUE KEY `idreservas_UNIQUE` (`id`),
  ADD KEY `fk_reservas_turistas1_idx` (`tourist_id`),
  ADD KEY `fk_reservas_horario_tour1_idx` (`tour_schedule_id`);

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
-- Indices de la tabla `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idturistas_UNIQUE` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `tourist`
--
ALTER TABLE `tourist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_reservas_horario_tour1` FOREIGN KEY (`tour_schedule_id`) REFERENCES `tour_schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservas_turistas1` FOREIGN KEY (`tourist_id`) REFERENCES `tourist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
