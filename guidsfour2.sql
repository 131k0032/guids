-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2019 a las 20:10:46
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
(1, '2019-04-26', 15, 0, 'ff', 'ff', 'as', '131k0032@itscarrillopuerto.edu.mx', NULL, NULL, '2019-04-26', NULL, 1, 1),
(7, '2019-04-29', 14, 0, 'xx', 'xx', 's', '1@ffh.com', NULL, NULL, '2019-04-27', NULL, 3, 2),
(8, '2019-04-27', 18, 0, 'asd', 'asd', 'asd', '1@ffh.com', NULL, NULL, '2019-04-27', NULL, 3, 2),
(9, '2019-04-20', 14, 0, 'asd', 'asd', 'asd', 'sad', NULL, NULL, '2019-04-27', NULL, 3, 2),
(16, '2019-04-28', 5, 0, 'X', 'X', 'X', '1@ffh.com', NULL, NULL, '2019-04-28', NULL, 3, 2),
(17, '2019-04-28', 12, 0, 'asd', 'asd', 'asd', '1@ffh.com', NULL, NULL, '2019-04-28', NULL, 3, 2),
(18, '2019-04-28', 12, 0, 'asd', 'asd', 'asd', '1@ffh.com', NULL, NULL, '2019-04-28', NULL, 3, 2),
(22, '2019-05-20', 14, 0, 'xD', 'xD', 'ss', '131k0032@itscarrillopuerto.edu.mx', NULL, NULL, '2019-05-01', NULL, 39, 30);

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
-- Estructura de tabla para la tabla `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `review`
--

INSERT INTO `review` (`id`, `rating`, `comment`, `created_at`, `updated_at`, `tour_id`, `user_id`) VALUES
(1, 0, 'xD', '2019-04-28', NULL, 1, 1),
(2, 3, 'jghg', '2019-04-28', NULL, 1, 1),
(3, 2, 'xD', '2019-04-28', NULL, 1, 1),
(4, 0, 'xD', '2019-04-28', NULL, 2, 1),
(5, 2, 'xD', '2019-04-28', NULL, 2, 1),
(6, 0, 'xD', '2019-04-28', NULL, 3, 1),
(7, 3, 'xD', '2019-04-28', NULL, 3, 1),
(8, 0, 'xD', '2019-04-28', NULL, 4, 1),
(9, 0, 'xD', '2019-04-28', NULL, 5, 1),
(10, 0, 'xD', '2019-04-28', NULL, 6, 1),
(11, 5, 'j', '2019-04-28', NULL, 6, 1),
(12, 2, 'xD', '2019-04-28', NULL, 4, 1),
(13, 3, 'xD', '2019-04-28', NULL, 5, 1),
(14, 2, 'xD', '2019-04-28', NULL, 6, 1),
(15, 3, 'xD', '2019-04-28', NULL, 5, 1),
(16, 0, 'xD', '2019-04-28', NULL, 7, 1),
(17, 0, 'xD', '2019-04-28', NULL, 8, 1),
(18, 0, 'xD', '2019-04-28', NULL, 9, 1),
(19, 5, 'xD', '2019-04-28', NULL, 9, 1),
(22, 0, 'xD', '2019-04-28', NULL, 12, 1),
(23, 0, 'xD', '2019-04-28', NULL, 13, 1),
(24, 5, 'xD', '2019-04-28', NULL, 13, 1),
(25, 0, 'xD', '2019-04-28', NULL, 14, 1),
(26, 0, 'xD', '2019-04-28', NULL, 15, 1),
(27, 2, 'xD', '2019-04-28', NULL, 15, 1),
(28, 1, 'xD', '2019-04-28', NULL, 15, 1),
(29, 0, 'xD', '2019-04-28', NULL, 16, 1),
(31, 4, 'xD', '2019-04-28', NULL, 16, 1),
(32, 0, 'xD', '2019-04-28', NULL, 17, 1),
(33, 3, 'xD', '2019-04-28', NULL, 17, 1),
(34, 0, 'xD', '2019-04-28', NULL, 18, 1),
(35, 1, 'xD', '2019-04-28', NULL, 18, 1),
(36, 0, 'xD', '2019-04-28', NULL, 19, 1),
(37, 1, 'xD', '2019-04-28', NULL, 19, 1),
(38, 0, 'xD', '2019-04-28', NULL, 20, 1),
(39, 5, 'xD', '2019-04-28', NULL, 20, 1),
(40, 0, 'xD', '2019-04-28', NULL, 21, 1),
(41, 2, 'xD', '2019-04-28', NULL, 21, 1),
(42, 0, 'xD', '2019-04-28', NULL, 22, 1),
(43, 4, 'xD', '2019-04-28', NULL, 22, 1),
(44, 0, 'xD', '2019-04-28', NULL, 23, 1),
(45, 5, 'xD', '2019-04-28', NULL, 23, 1),
(46, 0, 'xD', '2019-04-28', NULL, 24, 1),
(47, 1, 'xD', '2019-04-28', NULL, 24, 1),
(48, 2, 'xD', '2019-04-28', NULL, 24, 1),
(49, 0, 'xD', '2019-04-28', NULL, 25, 1),
(50, 3, 'xD', '2019-04-28', NULL, 25, 1),
(51, 0, NULL, '2019-04-28', '2019-04-28', 10, 1),
(52, 0, 'Buen tour', NULL, NULL, 11, 2),
(53, 5, 'el mejor pasoe en bicileta de chemumal', NULL, NULL, 15, 1),
(54, 5, 'best tour in holbox', NULL, NULL, 16, 2),
(55, 3, 'muy buenos cenotes', NULL, NULL, 17, 2),
(56, 3, 'buen tour, algo chabos pero si sabem maya', NULL, NULL, 18, 3),
(57, 4, 'la mejor playa de playa del carmen', NULL, NULL, 19, 1),
(58, 5, 'que rico dormi hoy', NULL, NULL, 20, 1),
(59, 0, NULL, '2019-05-01', NULL, 30, 1),
(60, 0, NULL, '2019-05-01', NULL, 31, 1),
(61, 5, 'Bastante bien el tour increible el reccorrido joms asi machin recomendado ampliamente', '2019-05-01', NULL, 30, 1),
(62, 2, 'xD', '2019-05-01', NULL, 30, 1),
(63, 1, '', '2019-05-01', NULL, 30, 1),
(64, 5, 'muy buen compa xD', '2019-05-01', NULL, 31, 1),
(65, 5, 'Super tour', '2019-05-01', NULL, 31, 1),
(66, 5, 'xD', '2019-05-01', NULL, 31, 1),
(67, 5, 'xD', '2019-05-01', NULL, 31, 1),
(68, 5, 'xD', '2019-05-01', NULL, 31, 1),
(69, 5, '', '2019-05-01', NULL, 31, 1),
(70, 0, NULL, '2019-05-01', NULL, 32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `find_guide` text NOT NULL,
  `start_in` text,
  `location` varchar(80) NOT NULL,
  `duration` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tour`
--

INSERT INTO `tour` (`id`, `name`, `description`, `find_guide`, `start_in`, `location`, `duration`, `capacity`, `status`, `is_active`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Laguna de 10 colores', 'Será poca madre', 'Con mi bici negra', 'En la gasolinera del centro', 'Felipe Carrillo Puerto', '3:00-h', 5, 0, 1, '2019-04-26', NULL, 1),
(2, 'La quinta avenida', 'Muy bueno', 'Con mi bici', 'En mi casa', 'Playa del carmen', '1-h', 3, 0, 1, '2019-04-27', NULL, 1),
(3, 'pedaleada en cancun', 'Muy bueno', 'Cancun', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(4, 'pedaleada en tulum', 'Muy bueno', 'Tulum', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(5, 'casa de campaña en la playa', 'Muy bueno', 'Playa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(6, 'el misionero en la jungla', 'Muy bueno', 'Jungla', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(7, 'ruta de cenotes', 'Muy bueno', 'Cenotes', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(8, 'playa con sol y tecate', 'Muy bueno', 'En la playa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(9, 'musica de locos', 'Muy bueno', 'en el cuarto', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(10, 'Museo de frida kahlo', 'Paseo en el museo de Frida Kahlo en donde los visitantes podrán conocerla y tambien a paulo cohelo', 'En el museo de frida kahlo', 'En la entrada del museo de frida kahlo en playa del carmen', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(11, 'Acuario de peces marinos en la quinta avenida', 'Paseo por el acuario museo de peces marinos estrellas de mar y otros atractivos en la quinta avenida de playa del carmen', 'En el acuario de playa en la 5 avenida', 'Acuario de plaza las estrellas', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(12, 'Malecon de cancun', 'Un breve paseo en canoa en el malecon de cancun en donde podras disfrutar de un hermoso paisaje y algunos cocodrilos', 'En el malecon de cancún con una canoa y una gorra verde', 'En el malecon de cancun en la entrada sur por el inicio de la zona hotelera', 'Cancun', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(13, 'Mall en la quinta avenida', 'Un paseo muy breve sobre la quinta avenida, en donde podrías hacer terapia de peces y caminar toda la 5 av.', 'quinta avenida del ado con una maleta en mano', 'quinta avenida', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(14, 'paseo en lancha siijil nolha', 'Hermoso paseo en lanche en la orilla de la laguna siijil nol ha en donde podrás ver algunos animalitos muy bonitos', 'En la entrada de Siijil nol ha con una camioneta blanca', 'En la carretera federal, para iniciar el recorrido', 'Carrillo Puerto', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(15, 'Paseo en el parque de chetumal', 'Paseo en bicicleta por el malecon y el parque de chetumal', 'persona mayor de 40 años en bicicleta', 'En el inicio del malecon', 'Chetumal', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(16, 'Tour Holbox', 'Un tour bastante completo en donde podrás pasear en lancha y hacer nado con la ballena', 'En el muelle parado en una lancha', 'en el muelle', 'Holbox', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 2),
(17, 'Cenotes de Valladolid', 'Tour en varios de los cenotes de valladolid', 'Con un flotador verde en el inicio del cenote', 'En el cenote keken', 'Valladolid', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 2),
(18, 'Cenotes de chemuyil', 'Un paseo en bicicleta por los 3 cenotes que hay en chemuyil', 'Con una gorra verde sosforesente', 'En Chemuyil', 'Cuidad chemuyil', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 2),
(19, 'Playa mamitas', 'Un dia completo para asolearse en la playa mamitas de playa del carmen', 'Con un paraguas en la mano', 'En la playa mamitas', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 3),
(20, 'Cabañas en Puerto aventuras', 'Este es un tour de una noche en donde podras asistir con tu pareja y quedarte en una cabaña ecologica haciendo zampin con tu pareja', 'En la misma cabaña', 'En las cabañas de puerto abrigo', 'Puerto aventuras', '12:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 2),
(21, 'La quinta avenida 19', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(22, 'La quinta avenida 20', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(23, 'La quinta avenida 21', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(24, 'La quinta avenida 22', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(25, 'La quinta avenida 23', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(26, 'La quinta avenida 24', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(27, 'La quinta avenida 25', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(28, 'La quinta avenida 26', 'Muy bueno', 'En su casa', 'En su casa', 'Playa del carmen', '2:00 h', 12, 0, 1, '2019-04-28', '2019-04-28', 1),
(29, 'Visita al parque dos aguas', 'Este es un tour rÃ¡pido que permite realizar un recorrido maravilloso por el parque de tulum en donde la mayoria de gente extrangera puede visitar lo mejor del parque, pasear en familia, comer esquites y una marquesita.', 'Con mucha ropa', 'Parque principal del Tulum', 'Tulum', '1:30-h', 10, 0, 1, '2019-04-30', NULL, 2),
(30, 'Super tour la laguna azul', 'Bien chido', 'Con una mochila roja', 'En mi casa, ya saben', 'Senior', '1-h', 9, 0, 1, '2019-05-01', NULL, 1),
(31, 'Super laguna de 7 colores', 'Muy bueno', 'Asi con mi gorrita', 'En mi casa', 'Senior', '1-h', 2, 0, 1, '2019-05-01', NULL, 1),
(32, 'xD', 'xD', 'xD', 'xD', 'xD', '1-h', 0, 0, 0, '2019-05-01', NULL, 1);

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
(1, 'view/images/tours/', 'lagunazul.jpg', 1),
(2, 'view/images/tours/', 'quintaavenida.jpg', 2),
(3, 'view/images/tours/', 'quintaavenida.jpg', 3),
(4, 'view/images/tours/', 'quintaavenida.jpg', 4),
(5, 'view/images/tours/', 'quintaavenida.jpg', 5),
(6, 'view/images/tours/', 'quintaavenida.jpg', 6),
(7, 'view/images/tours/', 'quintaavenida.jpg', 7),
(8, 'view/images/tours/', 'quintaavenida.jpg', 8),
(9, 'view/images/tours/', 'quintaavenida.jpg', 9),
(10, 'view/images/tours/', 'quintaavenida.jpg', 10),
(11, 'view/images/tours/', 'quintaavenida.jpg', 11),
(12, 'view/images/tours/', 'quintaavenida.jpg', 12),
(13, 'view/images/tours/', 'quintaavenida.jpg', 13),
(14, 'view/images/tours/', 'quintaavenida.jpg', 14),
(15, 'view/images/tours/', 'quintaavenida.jpg', 15),
(16, 'view/images/tours/', 'quintaavenida.jpg', 16),
(17, 'view/images/tours/', 'quintaavenida.jpg', 17),
(18, 'view/images/tours/', 'quintaavenida.jpg', 18),
(19, 'view/images/tours/', 'quintaavenida.jpg', 19),
(20, 'view/images/tours/', 'quintaavenida.jpg', 20),
(21, 'view/images/tours/', 'quintaavenida.jpg', 21),
(22, 'view/images/tours/', 'quintaavenida.jpg', 22),
(23, 'view/images/tours/', 'quintaavenida.jpg', 23),
(24, 'view/images/tours/', 'quintaavenida.jpg', 24),
(25, 'view/images/tours/', 'quintaavenida.jpg', 25),
(26, 'view/images/tours/', 'quintaavenida.jpg', 26),
(27, 'view/images/tours/', 'quintaavenida.jpg', 27),
(28, 'view/images/tours/', 'quintaavenida.jpg', 28),
(29, 'view/images/tours/', 'quintaavenida.jpg', 29),
(30, 'view/images/tours/', 'lagunazul_1.jpg', 30),
(31, 'view/images/tours/', 'lagunazul_2.jpg', 31),
(32, 'view/images/tours/', 'tulum.jpg', 32);

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
(1, '8:15 am', 1, 1, 1),
(2, '12:15 pm', 2, 2, 1),
(3, '11:15 am', 3, 3, 1),
(4, '11:15 am', 3, 4, 1),
(5, '11:15 am', 4, 5, 1),
(6, '11:15 am', 4, 6, 1),
(7, '11:15 am', 4, 7, 1),
(8, '11:15 am', 5, 8, 1),
(9, '11:15 am', 5, 9, 1),
(10, '11:15 am', 5, 10, 1),
(11, '11:15 am', 6, 11, 1),
(12, '11:15 am', 6, 12, 1),
(13, '11:15 am', 7, 13, 1),
(14, '11:15 am', 7, 14, 1),
(15, '11:15 am', 7, 15, 1),
(16, '11:15 am', 1, 16, 1),
(17, '11:15 am', 1, 17, 1),
(18, '11:15 am', 1, 18, 1),
(19, '11:15 am', 2, 19, 1),
(20, '11:15 am', 2, 20, 1),
(21, '11:15 am', 2, 21, 1),
(22, '11:15 am', 2, 22, 1),
(23, '11:15 am', 2, 23, 1),
(24, '11:15 am', 4, 24, 1),
(25, '11:15 am', 4, 25, 1),
(26, '11:15 am', 4, 26, 1),
(27, '11:15 am', 4, 27, 1),
(28, '11:15 am', 4, 28, 1),
(29, '11:15 am', 4, 29, 1),
(30, '11:15 am', 4, 29, 1),
(31, '11:15 am', 7, 29, 1),
(32, '18:00 pm', 7, 29, 1),
(33, '18:00 pm', 7, 29, 1),
(34, '18:00 pm', 7, 29, 1),
(35, '18:00 pm', 7, 29, 1),
(36, '18:00 pm', 5, 29, 1),
(37, '18:00 pm', 6, 29, 1),
(38, '18:00 pm', 7, 29, 1),
(39, '11:00 am', 1, 30, 1),
(40, '8:00 am', 1, 31, 1),
(41, '8:15 am', 1, 32, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `code` text,
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
  `src` varchar(45) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `review` int(11) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `code`, `name`, `lastname`, `phone`, `email`, `password`, `state`, `town`, `age`, `grade`, `personality`, `ability`, `src`, `picture`, `review`, `is_admin`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '85f52cd59036b27fb77e9a8b6a1601ab61a5349f', 'Bernabe', 'Cituk Caamal', '999999', '131k0032@itscarrillopuerto.edu.mx', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Quintanaroo', 'José María Morelos', '1910-03-11', 'Superior', 'Muy bueno', 'Muy bueno', NULL, NULL, NULL, 0, 1, '2019-04-26', NULL),
(2, '59d5171829cffde31fca087a64f5c99ef58e2430', 'Ernesto Valentin', 'Caamal Peech', '9841735022', 'ernesto.valen.t@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aupHaYEpzh6IziL5qf.asNQvG.zGL.oGK', 'Quintanaroo', 'Tulum', '1995-02-14', 'Superior', 'Siempre la conquisto cuando me lo propongo', 'Mantener la verga parada por horas', NULL, NULL, NULL, 0, 1, NULL, NULL),
(3, '526c656a63aeb993c9c59c2780b097e221ded194', 'Desarrollador', 'Jr', 'administra', 'admin@admin.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Quintanaroo', 'Cozumel', '1900-01-01', 'Diplomadosycursos', 'Administrador: user admin@admin.com password admin', 'administrador', NULL, NULL, NULL, 1, 1, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tour_image`
--
ALTER TABLE `tour_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
