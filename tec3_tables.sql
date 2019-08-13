-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2019 a las 19:38:20
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tec3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `author` varchar(40) NOT NULL,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`article_id`, `author`, `title`, `content`, `date`, `img`) VALUES
(4, 'Virginia', 'Nueva Ley', 'A partir del aÃ±o prÃ³ximo los alumnos de tercer aÃ±o de escuelas secundarias pÃºblicas y privadas prometerÃ¡n lealtad a la ConstituciÃ³n, segÃºn una nueva ceremonia escolar creada por una ley que fue promulgada este jueves en el BoletÃ­n Oficial.\r\nMas informacion en <a href= \"https://www.0223.com.ar/nota/2019-6-13-15-27-0-por-una-nueva-ley-los-alumnos-de-tercer-ano-deberan-jurar-lealtad-a-la-constitucion\" target=\"_blank\">0223.com</a>', '2019-06-16', 'C:/xampp/htdocs/tec3/tmp_img/1464706668280.jpg'),
(5, 'Virginia', 'Alerta meteorolÃ³gico', 'Desde el Servicio MeteorolÃ³gico Nacional (SMN) renovaron el alerta meteorolÃ³gico que rige para Mar del Plata desde el viernes, y que anticipa por un perÃ­odo signado por \"viento fuerte\" y lluvias acompaÃ±adas de actividad elÃ©ctrica.\r\nMas informaciÃ³n en <a href=\"https://www.0223.com.ar/nota/2019-6-15-11-22-0-se-vuelve-a-renovar-el-alerta-meteorologico-para-la-ciudad-por-viento-fuerte-y-tormentas\" target=\"_blank\">0223.com</a>', '2019-06-16', 'C:/xampp/htdocs/tec3/tmp_img/FUERTESVIENTOS28-1024x681.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `categorie` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie`) VALUES
(1, 'Director/a'),
(2, 'Preceptor/a'),
(3, 'Secretario/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(80) NOT NULL,
  `autoridad` varchar(80) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `user`, `autoridad`, `pass`) VALUES
(1, 'nicolasbaez@hotmail.es', 'Virginia', 'Director/a', '$2y$10$4sL8RUMMSl/k8PonyTH/PO9ANyq1z789WP7LT.HPksn/yCzhFrapm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `categorie` (`categorie`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_dev` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
