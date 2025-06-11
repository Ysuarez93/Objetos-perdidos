-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2025 a las 05:57:24
-- Versión del servidor: 11.7.2-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `objetosperdidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos_perdidos`
--

CREATE TABLE `objetos_perdidos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `tamaño` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen_ruta` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetos_perdidos`
--

INSERT INTO `objetos_perdidos` (`id`, `categoria`, `nombre`, `color`, `tamaño`, `descripcion`, `imagen_ruta`, `fecha_registro`, `tipo`, `estado`) VALUES
(1, 'tecnología', 'Telefono Iphone 15', 'Azul', 'No aplica', 'Se ha encontrado telefono en las inmediaciones de la cafeteria a las 12 pm', '../img/publicaciones/publicacion-1.jpg', '2025-06-04 10:37:50', 'Objeto pérdido', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `objetos_perdidos`
--
ALTER TABLE `objetos_perdidos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
