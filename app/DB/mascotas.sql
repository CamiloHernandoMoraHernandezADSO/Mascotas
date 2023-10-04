-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-09-2023 a las 17:47:31
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Perro', '2023-09-26 20:28:18', '2023-09-26 20:28:18'),
(2, 'Gato', '2023-09-26 20:28:18', '2023-09-26 20:28:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Macho', '2023-09-26 20:28:18', '2023-09-26 20:28:18'),
(2, 'Hembra', '2023-09-26 20:28:18', '2023-09-26 20:28:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE `pets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `race_id` bigint UNSIGNED NOT NULL,
  `categorie_id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `name`, `race_id`, `categorie_id`, `photo`, `gender_id`, `created_at`, `updated_at`) VALUES
(7, 'Aniya Bechtelar DVM', 1, 1, 'assets/images/karsten.png', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(8, 'Dr. Mazie Gaylord', 3, 1, 'assets/images/ivana.png', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(9, 'Mr. Arnoldo Schoen III', 5, 1, 'assets/images/reigner.png', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(10, 'Prof. Godfrey Zemlak', 1, 1, 'assets/images/karsten.png', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(11, 'Ms. Augusta Cronin', 3, 1, 'assets/images/reigner.png', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(12, 'Elva Bernhard', 4, 1, 'assets/images/reigner.png', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(14, 'Miss Margarete Farrell', 4, 1, 'assets/images/karsten.png', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(16, 'Maurice Raynor', 1, 1, 'assets/images/karsten.png', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(17, 'Dr. Susanna Pollich PhD', 3, 1, 'assets/images/karsten.png', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(18, 'Keven Mante I', 4, 1, 'assets/images/reigner.png', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(19, 'Mae Stark MD', 2, 1, 'assets/images/reigner.png', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(25, 'viejo beto', 5, 1, 'assets/images/WhatsApp Image 2023-09-27 at 8.56.04 AM.jpeg', 1, '2023-09-27 13:56:43', '2023-09-27 13:56:43'),
(27, 'michi', 4, 2, 'assets/images/images.jpg', 1, '2023-09-27 16:34:49', '2023-09-27 16:34:49'),
(28, 'chucho4', 1, 2, 'assets/images/WhatsApp Image 2023-09-27 at 8.56.04 AM.jpeg', 2, '2023-09-27 17:37:50', '2023-09-27 17:37:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `races`
--

CREATE TABLE `races` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Volcado de datos para la tabla `races`
--

INSERT INTO `races` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Camden McClure', '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(2, 'Mrs. Chanel Jaskolski', '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(3, 'Jany Gerlach Sr.', '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(4, 'Kaela Cummerata Jr.', '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(5, 'Brandon Veum', '2023-09-15 20:36:40', '2023-09-15 20:36:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2023-09-15 20:36:39', '2023-09-15 20:36:39'),
(2, 'Administrador', '2023-09-15 20:36:39', '2023-09-15 20:36:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol_id`, `created_at`, `updated_at`) VALUES
(1, 'Buford Hirthe', 'beahan.ramiro@example.com', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(2, 'Mr. Orland Crona DDS', 'dkoss@example.com', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(3, 'Will Larson', 'cary.mohr@example.com', '12345678', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(4, 'Prof. Jayce Dibbert', 'nella56@example.net', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(5, 'Mrs. Asa Ward', 'mtoy@example.net', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(6, 'Blanche Cremin', 'abshire.rossie@example.org', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(7, 'Ms. Mariah Lind', 'reyes.gaylord@example.net', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(8, 'Mr. Lance Herzog II', 'lera.crona@example.net', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(9, 'Kathleen Wolf', 'ayden.pacocha@example.com', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(10, 'Vanessa Wuckert', 'padberg.felicia@example.org', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(11, 'Xzavier Corkery', 'delpha51@example.org', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(12, 'Mrs. Madeline Boyer', 'hillary51@example.org', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(13, 'Hermina Cole', 'amara43@example.com', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(14, 'Mr. Doyle McDermott', 'hailee34@example.net', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(15, 'Marianna Marvin', 'dulce.macejkovic@example.org', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 1, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(16, 'Bennie Kohler', 'whessel@example.net', '$2y$10$W7nlkN/k5jyt6BB/mjYyaOGC1vVzWnRz5dj3Qn0zM9YGKxP6c6pGS', 2, '2023-09-15 20:36:40', '2023-09-15 20:36:40'),
(17, 'Jose', 'joslrey@misena.edu.co', '$2y$10$d89JQIM9poLwPfv1fSbujufVJTEvbi/fyqKUS7SuK4uO/4Pbousha', 2, '2023-09-15 20:37:16', '2023-09-15 20:37:16'),
(37, 'chuchoadmin', 'chucho@gmail.com', '69385ba6f01cb1a4561ef221a25c1d97b294397fe8bb253307', 1, '2023-09-26 14:00:58', '2023-09-26 14:01:23'),
(38, 'chucho4', 'chucho2@gmail.com', '69385ba6f01cb1a4561ef221a25c1d97b294397fe8bb253307', 2, '2023-09-26 14:01:47', '2023-09-26 14:01:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pets_race_id_foreign` (`race_id`),
  ADD KEY `pets_categorie_id_foreign` (`categorie_id`),
  ADD KEY `pets_gender_id_foreign` (`gender_id`);

--
-- Indices de la tabla `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `pets_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
