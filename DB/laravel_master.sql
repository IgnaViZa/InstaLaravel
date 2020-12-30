-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2020 a las 19:55:22
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `image_id`, `content`, `created_at`, `updated_at`) VALUES
(7, 16, 13, 'Lindo Gato', '2020-12-22 16:11:25', '2020-12-22 16:11:33'),
(8, 16, 13, 'Hermso el gato', '2020-12-22 21:41:28', '2020-12-22 21:41:28'),
(9, 16, 13, 'Este es mi gato', '2020-12-22 21:42:12', '2020-12-22 21:42:12'),
(12, 14, 13, 'Buen pelaje rey', '2020-12-22 22:20:01', '2020-12-22 22:20:01'),
(14, 11, 14, 'Mi tía llevando a mi hermana jaja', '2020-12-28 17:23:36', '2020-12-28 17:23:36'),
(15, 14, 11, 'Flamencos de pico negro', '2020-12-30 18:52:15', '2020-12-30 18:52:15'),
(16, 16, 9, 'Shiny Skarmory', '2020-12-30 18:53:35', '2020-12-30 18:53:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `icons`
--

INSERT INTO `icons` (`id`, `icon_path`) VALUES
(1, 'heart-black.png'),
(2, 'heart-red.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `user_id`, `image_path`, `description`, `created_at`, `updated_at`) VALUES
(9, 14, '1608231665skarmory.png', 'Skarmory', '2020-12-17 19:01:05', '2020-12-17 19:01:05'),
(11, 14, '1608238470lugares-para-ver-flamencos-1.jpg', 'Flamencos clásicos del sudoeste', '2020-12-17 20:54:30', '2020-12-17 20:54:30'),
(12, 14, '1608238745Cóndor-planenado-de-frente.jpg', 'Cóndor Andino, también usado en el emblema del escudo nacional chileno', '2020-12-17 20:59:05', '2020-12-17 20:59:05'),
(13, 16, '1608660558gato.jpg', '#NuevaFotoDePerfil', '2020-12-22 18:09:18', '2020-12-22 18:09:18'),
(14, 11, '1609176179hormigas01.jpg', 'Comunidad de Hormigas del Congo trabajando en conjunto', '2020-12-28 17:22:59', '2020-12-28 17:22:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `image_id`, `created_at`, `updated_at`) VALUES
(11, 11, 11, '2020-12-28 17:55:17', '2020-12-28 17:55:17'),
(16, 11, 13, '2020-12-30 16:46:31', '2020-12-30 16:46:31'),
(30, 11, 14, '2020-12-30 17:32:47', '2020-12-30 17:32:47'),
(31, 11, 12, '2020-12-30 18:24:51', '2020-12-30 18:24:51'),
(32, 14, 14, '2020-12-30 18:51:12', '2020-12-30 18:51:12'),
(33, 14, 12, '2020-12-30 18:51:20', '2020-12-30 18:51:20'),
(34, 14, 11, '2020-12-30 18:51:46', '2020-12-30 18:51:46'),
(35, 16, 13, '2020-12-30 18:52:56', '2020-12-30 18:52:56'),
(36, 16, 11, '2020-12-30 18:53:11', '2020-12-30 18:53:11'),
(37, 16, 9, '2020-12-30 18:53:16', '2020-12-30 18:53:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `nick`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(9, 'user', 'Lorgen', 'Lil', 'Lorgen_', 'Lorgen@lorgen.cl', '$2y$10$KaNG73GKKYn.W75/ViFi5.GfvoRa7UhT9wm7iQ6I6PG.FxouQoOPe', NULL, '2020-12-16 18:27:18', '2020-12-16 18:27:18', NULL),
(10, 'user', 'Molly', 'MollyMolly', 'Molly_', 'Molly@molly.cl', '$2y$10$eCpIsivy8uBv31/eiCSon.eaF5p.bQwawXwE.4k50Qz3oLB1Jd9HK', NULL, '2020-12-16 18:34:25', '2020-12-16 18:34:25', NULL),
(11, 'user', 'Durant', 'StealBug', 'Durant_', 'Durant@durant.com', '$2y$10$Nu52sPWcO1flY4P4rULb6ueacglM9UT8QXTi3k42otcZtE6oGyj4m', '1609176082Durant.png', '2020-12-16 18:38:31', '2020-12-28 17:21:22', NULL),
(12, 'user', 'Treecko', 'Tre', 'Cko', 'Trecko@treecko', '$2y$10$0RcSJCSa4hFEp/jXMZ/HY.EpEAyW7XZFVF2jIds42vWGOHO/IcpLe', NULL, '2020-12-16 18:48:28', '2020-12-16 18:48:28', NULL),
(13, 'user', 'Torchick', 'Tor', 'chick', 'Torchick@tor.cl', '$2y$10$ff.FVp937l6CN5M4UBpabuvZh4ozkn/lytk31dzezXx6E71TvhJR.', NULL, '2020-12-16 18:52:27', '2020-12-16 18:52:27', NULL),
(14, 'user', 'Skarmory', 'Skar', 'Mory', 'Skarmory@Skar.cl', '$2y$10$Alk8jun1hqCIXIw3vjvheuVW7jyEUSsxu2BFtXzoTUSgIVZllise2', '1608155671skarmory.png', '2020-12-16 18:53:32', '2020-12-16 21:54:32', NULL),
(15, 'user', 'Muk', 'Alola', 'Muk_Alola', 'Muk@Alola', '$2y$10$ubRYKKvvGl7SorMxDjg7XuqyMtPUPGB7vJoDj.5n1opWYwjZ96R7O', NULL, '2020-12-16 18:57:33', '2020-12-16 18:57:33', NULL),
(16, 'user', 'Cucho', 'Cuchito', 'CuchitoCuchito', 'Cucho@cucho.cl', '$2y$10$mGgxoyPJIVp7/HvNdIOBM.j2/iASkEPcQ8lGLmyhh1qzSPyoTpfZW', '1608660522gato.jpg', '2020-12-22 16:54:08', '2020-12-22 18:08:42', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users` (`user_id`),
  ADD KEY `fk_comments_images` (`image_id`);

--
-- Indices de la tabla `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_users` (`user_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_likes_users` (`user_id`),
  ADD KEY `fk_likes_images` (`image_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
