-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2024 a las 21:19:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barbershop-pp4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `host` varchar(46) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'audit:created', 1, 'App\\Models\\Cliente#1', 3, '{\"nombre_cliente\":\"test\",\"correo_cliente\":\"test@test.com\",\"telefono_cliente\":\"123654\",\"created_by_id\":3,\"updated_at\":\"2024-06-12 22:16:13\",\"created_at\":\"2024-06-12 22:16:13\",\"id\":1}', '127.0.0.1', '2024-06-13 01:16:13', '2024-06-13 01:16:13'),
(2, 'audit:created', 2, 'App\\Models\\Cliente#2', 2, '{\"nombre_cliente\":\"test2\",\"correo_cliente\":\"test2@test.com\",\"telefono_cliente\":\"456854\",\"created_by_id\":2,\"updated_at\":\"2024-06-12 22:16:50\",\"created_at\":\"2024-06-12 22:16:50\",\"id\":2}', '127.0.0.1', '2024-06-13 01:16:50', '2024-06-13 01:16:50'),
(3, 'audit:created', 1, 'App\\Models\\Barbershop#1', 1, '{\"nombre_barbershop\":\"King Size\",\"direccion_barbershop\":\"Nicaragua 5000\",\"telefono_barbershop\":\"1158745685\",\"updated_at\":\"2024-06-19 00:26:02\",\"created_at\":\"2024-06-19 00:26:02\",\"id\":1}', '127.0.0.1', '2024-06-19 03:26:02', '2024-06-19 03:26:02'),
(4, 'audit:created', 1, 'App\\Models\\Servicio#1', 1, '{\"nombre_servicio\":\"Corte\",\"precio_servicio\":\"2000\",\"duracion_servicio\":\"00:40:00\",\"updated_at\":\"2024-06-19 00:26:24\",\"created_at\":\"2024-06-19 00:26:24\",\"id\":1}', '127.0.0.1', '2024-06-19 03:26:24', '2024-06-19 03:26:24'),
(5, 'audit:created', 1, 'App\\Models\\Barbero#1', 1, '{\"nombre_barbero\":\"Martin Valor\",\"correo_barbero\":\"martin@barbershop.com\",\"telefono_barbero\":\"1145874684\",\"updated_at\":\"2024-06-19 00:27:02\",\"created_at\":\"2024-06-19 00:27:02\",\"id\":1,\"foto_barbero\":null,\"media\":[]}', '127.0.0.1', '2024-06-19 03:27:02', '2024-06-19 03:27:02'),
(6, 'audit:created', 1, 'App\\Models\\Turno#1', 2, '{\"cliente_turno_id\":\"2\",\"barbershop_turno_id\":\"1\",\"barbero_turno_id\":\"1\",\"servicio_turno_id\":\"1\",\"fecha_turno\":\"18\\/06\\/2024 21:27:33\",\"created_by_id\":2,\"updated_at\":\"2024-06-19 00:27:37\",\"created_at\":\"2024-06-19 00:27:37\",\"id\":1}', '127.0.0.1', '2024-06-19 03:27:37', '2024-06-19 03:27:37'),
(7, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-19 00:29:12\"}', '127.0.0.1', '2024-06-19 03:29:12', '2024-06-19 03:29:12'),
(8, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-20 21:27:33\",\"updated_at\":\"2024-06-19 00:29:44\"}', '127.0.0.1', '2024-06-19 03:29:44', '2024-06-19 03:29:44'),
(9, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-17 21:27:33\",\"updated_at\":\"2024-06-19 00:31:03\"}', '127.0.0.1', '2024-06-19 03:31:03', '2024-06-19 03:31:03'),
(10, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-20 21:27:33\",\"updated_at\":\"2024-06-19 00:32:13\"}', '127.0.0.1', '2024-06-19 03:32:13', '2024-06-19 03:32:13'),
(11, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-19 00:36:09\"}', '127.0.0.1', '2024-06-19 03:36:09', '2024-06-19 03:36:09'),
(12, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-18 21:27:33\",\"updated_at\":\"2024-06-19 00:37:05\"}', '127.0.0.1', '2024-06-19 03:37:05', '2024-06-19 03:37:05'),
(13, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-06 21:27:33\",\"updated_at\":\"2024-06-19 00:37:26\"}', '127.0.0.1', '2024-06-19 03:37:26', '2024-06-19 03:37:26'),
(14, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-19 00:37:59\"}', '127.0.0.1', '2024-06-19 03:37:59', '2024-06-19 03:37:59'),
(15, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-15 21:27:33\",\"updated_at\":\"2024-06-19 00:38:15\"}', '127.0.0.1', '2024-06-19 03:38:15', '2024-06-19 03:38:15'),
(16, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-20 21:27:33\",\"updated_at\":\"2024-06-19 00:38:56\"}', '127.0.0.1', '2024-06-19 03:38:56', '2024-06-19 03:38:56'),
(17, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-19 00:41:24\"}', '127.0.0.1', '2024-06-19 03:41:24', '2024-06-19 03:41:24'),
(18, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-19 00:42:54\"}', '127.0.0.1', '2024-06-19 03:42:54', '2024-06-19 03:42:54'),
(19, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-04 21:27:33\",\"updated_at\":\"2024-06-19 00:45:55\"}', '127.0.0.1', '2024-06-19 03:45:55', '2024-06-19 03:45:55'),
(20, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-14 21:27:33\",\"updated_at\":\"2024-06-19 00:48:34\"}', '127.0.0.1', '2024-06-19 03:48:34', '2024-06-19 03:48:34'),
(21, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-20 21:27:33\",\"updated_at\":\"2024-06-19 00:50:48\"}', '127.0.0.1', '2024-06-19 03:50:48', '2024-06-19 03:50:48'),
(22, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-19 00:51:20\"}', '127.0.0.1', '2024-06-19 03:51:20', '2024-06-19 03:51:20'),
(23, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-29 21:27:33\",\"updated_at\":\"2024-06-19 00:56:29\"}', '127.0.0.1', '2024-06-19 03:56:29', '2024-06-19 03:56:29'),
(24, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-19 00:57:26\"}', '127.0.0.1', '2024-06-19 03:57:26', '2024-06-19 03:57:26'),
(25, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-19 01:01:13\"}', '127.0.0.1', '2024-06-19 04:01:13', '2024-06-19 04:01:13'),
(26, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-20 21:27:33\",\"updated_at\":\"2024-06-19 01:01:54\"}', '127.0.0.1', '2024-06-19 04:01:54', '2024-06-19 04:01:54'),
(27, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-19 01:04:45\"}', '127.0.0.1', '2024-06-19 04:04:45', '2024-06-19 04:04:45'),
(28, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-22 21:27:33\",\"updated_at\":\"2024-06-19 01:05:23\"}', '127.0.0.1', '2024-06-19 04:05:23', '2024-06-19 04:05:23'),
(29, 'audit:updated', 1, 'App\\Models\\Turno#1', 2, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-19 01:06:07\"}', '127.0.0.1', '2024-06-19 04:06:07', '2024-06-19 04:06:07'),
(30, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-22 21:27:33\",\"updated_at\":\"2024-06-21 15:50:19\"}', '127.0.0.1', '2024-06-21 18:50:19', '2024-06-21 18:50:19'),
(31, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-23 21:27:33\",\"updated_at\":\"2024-06-21 15:53:36\"}', '127.0.0.1', '2024-06-21 18:53:36', '2024-06-21 18:53:36'),
(32, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-21 15:54:51\"}', '127.0.0.1', '2024-06-21 18:54:51', '2024-06-21 18:54:51'),
(33, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-21 16:02:16\"}', '127.0.0.1', '2024-06-21 19:02:16', '2024-06-21 19:02:16'),
(34, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-21 21:27:33\",\"updated_at\":\"2024-06-21 16:17:58\"}', '127.0.0.1', '2024-06-21 19:17:58', '2024-06-21 19:17:58'),
(35, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-19 21:27:33\",\"updated_at\":\"2024-06-21 16:18:48\"}', '127.0.0.1', '2024-06-21 19:18:48', '2024-06-21 19:18:48'),
(36, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-20 21:27:33\",\"updated_at\":\"2024-06-21 16:19:25\"}', '127.0.0.1', '2024-06-21 19:19:25', '2024-06-21 19:19:25'),
(37, 'audit:updated', 1, 'App\\Models\\Turno#1', 1, '{\"fecha_turno\":\"2024-06-23 21:27:33\",\"updated_at\":\"2024-06-21 16:24:40\"}', '127.0.0.1', '2024-06-21 19:24:40', '2024-06-21 19:24:40'),
(38, 'audit:updated', 1, 'App\\Models\\Servicio#1', 1, '{\"nombre_servicio\":\"Corte de Pelo\",\"precio_servicio\":\"3500\",\"updated_at\":\"2024-06-21 18:41:21\"}', '127.0.0.1', '2024-06-21 21:41:21', '2024-06-21 21:41:21'),
(39, 'audit:created', 2, 'App\\Models\\Servicio#2', 1, '{\"nombre_servicio\":\"Corte de Barba\",\"precio_servicio\":\"3000\",\"duracion_servicio\":\"00:30:00\",\"updated_at\":\"2024-06-21 18:42:01\",\"created_at\":\"2024-06-21 18:42:01\",\"id\":2}', '127.0.0.1', '2024-06-21 21:42:01', '2024-06-21 21:42:01'),
(40, 'audit:created', 3, 'App\\Models\\Servicio#3', 1, '{\"nombre_servicio\":\"Corte de Navaja\",\"precio_servicio\":\"2800\",\"duracion_servicio\":\"00:30:00\",\"updated_at\":\"2024-06-21 18:42:30\",\"created_at\":\"2024-06-21 18:42:30\",\"id\":3}', '127.0.0.1', '2024-06-21 21:42:30', '2024-06-21 21:42:30'),
(41, 'audit:created', 4, 'App\\Models\\Servicio#4', 1, '{\"nombre_servicio\":\"Afeitado\",\"precio_servicio\":\"3000\",\"duracion_servicio\":\"00:30:00\",\"updated_at\":\"2024-06-21 18:42:51\",\"created_at\":\"2024-06-21 18:42:51\",\"id\":4}', '127.0.0.1', '2024-06-21 21:42:51', '2024-06-21 21:42:51'),
(42, 'audit:created', 5, 'App\\Models\\Servicio#5', 1, '{\"nombre_servicio\":\"Coloracion\",\"precio_servicio\":\"2800\",\"duracion_servicio\":\"00:50:00\",\"updated_at\":\"2024-06-21 18:43:22\",\"created_at\":\"2024-06-21 18:43:22\",\"id\":5}', '127.0.0.1', '2024-06-21 21:43:22', '2024-06-21 21:43:22'),
(43, 'audit:created', 6, 'App\\Models\\Servicio#6', 1, '{\"nombre_servicio\":\"Corte de Pelo + Barba\",\"precio_servicio\":\"7000\",\"duracion_servicio\":\"00:50:00\",\"updated_at\":\"2024-06-21 18:43:47\",\"created_at\":\"2024-06-21 18:43:47\",\"id\":6}', '127.0.0.1', '2024-06-21 21:43:47', '2024-06-21 21:43:47'),
(44, 'audit:created', 2, 'App\\Models\\Barbershop#2', 1, '{\"nombre_barbershop\":\"West Cut\",\"direccion_barbershop\":\"Olazabal 854\",\"telefono_barbershop\":\"115487562\",\"updated_at\":\"2024-06-21 18:44:32\",\"created_at\":\"2024-06-21 18:44:32\",\"id\":2}', '127.0.0.1', '2024-06-21 21:44:32', '2024-06-21 21:44:32'),
(45, 'audit:created', 2, 'App\\Models\\Barbero#2', 1, '{\"nombre_barbero\":\"Matias Perez\",\"correo_barbero\":\"matias@barbershop.com\",\"telefono_barbero\":\"1147895623\",\"updated_at\":\"2024-06-21 18:45:17\",\"created_at\":\"2024-06-21 18:45:17\",\"id\":2,\"foto_barbero\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 21:45:17', '2024-06-21 21:45:17'),
(46, 'audit:deleted', 1, 'App\\Models\\Turno#1', 1, '{\"id\":1,\"fecha_turno\":\"23\\/06\\/2024 21:27:33\",\"created_at\":\"2024-06-19 00:27:37\",\"updated_at\":\"2024-06-21 18:45:45\",\"deleted_at\":\"2024-06-21 18:45:45\",\"cliente_turno_id\":2,\"barbershop_turno_id\":1,\"barbero_turno_id\":1,\"servicio_turno_id\":1,\"created_by_id\":2}', '127.0.0.1', '2024-06-21 21:45:45', '2024-06-21 21:45:45'),
(47, 'audit:created', 1, 'App\\Models\\Herramientum#1', 1, '{\"nombre_herramienta\":\"Cortapelos El\\u00e9ctrico\",\"unidad_herramienta\":\"10\",\"lugar_herramienta_id\":\"1\",\"updated_at\":\"2024-06-21 18:50:06\",\"created_at\":\"2024-06-21 18:50:06\",\"id\":1,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 21:50:06', '2024-06-21 21:50:06'),
(48, 'audit:created', 2, 'App\\Models\\Herramientum#2', 1, '{\"nombre_herramienta\":\"Afeitadora El\\u00e9ctrica\",\"unidad_herramienta\":\"5\",\"lugar_herramienta_id\":\"1\",\"updated_at\":\"2024-06-21 19:01:18\",\"created_at\":\"2024-06-21 19:01:18\",\"id\":2,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:01:18', '2024-06-21 22:01:18'),
(49, 'audit:created', 3, 'App\\Models\\Herramientum#3', 1, '{\"nombre_herramienta\":\"Afeitadora El\\u00e9ctrica\",\"unidad_herramienta\":\"7\",\"lugar_herramienta_id\":\"2\",\"updated_at\":\"2024-06-21 19:01:30\",\"created_at\":\"2024-06-21 19:01:30\",\"id\":3,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:01:30', '2024-06-21 22:01:30'),
(50, 'audit:created', 4, 'App\\Models\\Herramientum#4', 1, '{\"nombre_herramienta\":\"Cortapelos El\\u00e9ctrico\",\"unidad_herramienta\":\"8\",\"lugar_herramienta_id\":\"2\",\"updated_at\":\"2024-06-21 19:01:43\",\"created_at\":\"2024-06-21 19:01:43\",\"id\":4,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:01:43', '2024-06-21 22:01:43'),
(51, 'audit:created', 5, 'App\\Models\\Herramientum#5', 1, '{\"nombre_herramienta\":\"Tijeras de Corte\",\"unidad_herramienta\":\"7\",\"lugar_herramienta_id\":\"1\",\"updated_at\":\"2024-06-21 19:03:12\",\"created_at\":\"2024-06-21 19:03:12\",\"id\":5,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:03:12', '2024-06-21 22:03:12'),
(52, 'audit:created', 6, 'App\\Models\\Herramientum#6', 1, '{\"nombre_herramienta\":\"Tijeras de Corte\",\"unidad_herramienta\":\"6\",\"lugar_herramienta_id\":\"2\",\"updated_at\":\"2024-06-21 19:03:21\",\"created_at\":\"2024-06-21 19:03:21\",\"id\":6,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:03:21', '2024-06-21 22:03:21'),
(53, 'audit:created', 7, 'App\\Models\\Herramientum#7', 1, '{\"nombre_herramienta\":\"Peines de Corte\",\"unidad_herramienta\":\"4\",\"lugar_herramienta_id\":\"1\",\"updated_at\":\"2024-06-21 19:03:40\",\"created_at\":\"2024-06-21 19:03:40\",\"id\":7,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:03:40', '2024-06-21 22:03:40'),
(54, 'audit:created', 8, 'App\\Models\\Herramientum#8', 1, '{\"nombre_herramienta\":\"Peines de Corte\",\"unidad_herramienta\":\"6\",\"lugar_herramienta_id\":\"2\",\"updated_at\":\"2024-06-21 19:03:51\",\"created_at\":\"2024-06-21 19:03:51\",\"id\":8,\"foto_herramienta\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:03:51', '2024-06-21 22:03:51'),
(55, 'audit:created', 1, 'App\\Models\\Insumo#1', 1, '{\"nombre_insumo\":\"Crema de Afeitar\",\"unidad_insumo\":\"2\",\"lugar_insumo_id\":\"1\",\"updated_at\":\"2024-06-21 19:04:28\",\"created_at\":\"2024-06-21 19:04:28\",\"id\":1,\"foto_insumo\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:04:28', '2024-06-21 22:04:28'),
(56, 'audit:created', 2, 'App\\Models\\Insumo#2', 1, '{\"nombre_insumo\":\"Crema de Afeitar\",\"unidad_insumo\":\"3\",\"lugar_insumo_id\":\"2\",\"updated_at\":\"2024-06-21 19:04:37\",\"created_at\":\"2024-06-21 19:04:37\",\"id\":2,\"foto_insumo\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:04:37', '2024-06-21 22:04:37'),
(57, 'audit:created', 3, 'App\\Models\\Insumo#3', 1, '{\"nombre_insumo\":\"Gel de Afeitar\",\"unidad_insumo\":\"3\",\"lugar_insumo_id\":\"1\",\"updated_at\":\"2024-06-21 19:04:54\",\"created_at\":\"2024-06-21 19:04:54\",\"id\":3,\"foto_insumo\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:04:54', '2024-06-21 22:04:54'),
(58, 'audit:created', 4, 'App\\Models\\Insumo#4', 1, '{\"nombre_insumo\":\"Gel de Afeitar\",\"unidad_insumo\":\"4\",\"lugar_insumo_id\":\"2\",\"updated_at\":\"2024-06-21 19:05:00\",\"created_at\":\"2024-06-21 19:05:00\",\"id\":4,\"foto_insumo\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:05:00', '2024-06-21 22:05:00'),
(59, 'audit:created', 5, 'App\\Models\\Insumo#5', 1, '{\"nombre_insumo\":\"Cera\",\"unidad_insumo\":\"3\",\"lugar_insumo_id\":\"1\",\"updated_at\":\"2024-06-21 19:05:15\",\"created_at\":\"2024-06-21 19:05:15\",\"id\":5,\"foto_insumo\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:05:15', '2024-06-21 22:05:15'),
(60, 'audit:created', 6, 'App\\Models\\Insumo#6', 1, '{\"nombre_insumo\":\"Cera\",\"unidad_insumo\":\"4\",\"lugar_insumo_id\":\"2\",\"updated_at\":\"2024-06-21 19:05:21\",\"created_at\":\"2024-06-21 19:05:21\",\"id\":6,\"foto_insumo\":null,\"media\":[]}', '127.0.0.1', '2024-06-21 22:05:21', '2024-06-21 22:05:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barberos`
--

CREATE TABLE `barberos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_barbero` varchar(255) NOT NULL,
  `correo_barbero` varchar(255) NOT NULL,
  `telefono_barbero` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `barberos`
--

INSERT INTO `barberos` (`id`, `nombre_barbero`, `correo_barbero`, `telefono_barbero`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`) VALUES
(1, 'Martin Valor', 'martin@barbershop.com', 1145874684, '2024-06-19 03:27:02', '2024-06-19 03:27:02', NULL, NULL),
(2, 'Matias Perez', 'matias@barbershop.com', 1147895623, '2024-06-21 21:45:17', '2024-06-21 21:45:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barbero_servicio`
--

CREATE TABLE `barbero_servicio` (
  `barbero_id` bigint(20) UNSIGNED NOT NULL,
  `servicio_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `barbero_servicio`
--

INSERT INTO `barbero_servicio` (`barbero_id`, `servicio_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barbershops`
--

CREATE TABLE `barbershops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_barbershop` varchar(255) NOT NULL,
  `direccion_barbershop` varchar(255) NOT NULL,
  `telefono_barbershop` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `barbershops`
--

INSERT INTO `barbershops` (`id`, `nombre_barbershop`, `direccion_barbershop`, `telefono_barbershop`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`) VALUES
(1, 'King Size', 'Nicaragua 5000', 1158745685, '2024-06-19 03:26:02', '2024-06-19 03:26:02', NULL, NULL),
(2, 'West Cut', 'Olazabal 854', 115487562, '2024-06-21 21:44:32', '2024-06-21 21:44:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `correo_cliente` varchar(255) NOT NULL,
  `telefono_cliente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cliente`, `correo_cliente`, `telefono_cliente`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`) VALUES
(1, 'test', 'test@test.com', 123654, '2024-06-13 01:16:13', '2024-06-13 01:16:13', NULL, 3),
(2, 'test2', 'test2@test.com', 456854, '2024-06-13 01:16:50', '2024-06-13 01:16:50', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_herramienta` varchar(255) NOT NULL,
  `unidad_herramienta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lugar_herramienta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`id`, `nombre_herramienta`, `unidad_herramienta`, `created_at`, `updated_at`, `deleted_at`, `lugar_herramienta_id`, `created_by_id`) VALUES
(1, 'Cortapelos Eléctrico', 10, '2024-06-21 21:50:06', '2024-06-21 21:50:06', NULL, 1, NULL),
(2, 'Afeitadora Eléctrica', 5, '2024-06-21 22:01:18', '2024-06-21 22:01:18', NULL, 1, NULL),
(3, 'Afeitadora Eléctrica', 7, '2024-06-21 22:01:30', '2024-06-21 22:01:30', NULL, 2, NULL),
(4, 'Cortapelos Eléctrico', 8, '2024-06-21 22:01:43', '2024-06-21 22:01:43', NULL, 2, NULL),
(5, 'Tijeras de Corte', 7, '2024-06-21 22:03:12', '2024-06-21 22:03:12', NULL, 1, NULL),
(6, 'Tijeras de Corte', 6, '2024-06-21 22:03:21', '2024-06-21 22:03:21', NULL, 2, NULL),
(7, 'Peines de Corte', 4, '2024-06-21 22:03:40', '2024-06-21 22:03:40', NULL, 1, NULL),
(8, 'Peines de Corte', 6, '2024-06-21 22:03:51', '2024-06-21 22:03:51', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_insumo` varchar(255) NOT NULL,
  `unidad_insumo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lugar_insumo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `nombre_insumo`, `unidad_insumo`, `created_at`, `updated_at`, `deleted_at`, `lugar_insumo_id`, `created_by_id`) VALUES
(1, 'Crema de Afeitar', 2, '2024-06-21 22:04:28', '2024-06-21 22:04:28', NULL, 1, NULL),
(2, 'Crema de Afeitar', 3, '2024-06-21 22:04:37', '2024-06-21 22:04:37', NULL, 2, NULL),
(3, 'Gel de Afeitar', 3, '2024-06-21 22:04:54', '2024-06-21 22:04:54', NULL, 1, NULL),
(4, 'Gel de Afeitar', 4, '2024-06-21 22:05:00', '2024-06-21 22:05:00', NULL, 2, NULL),
(5, 'Cera', 3, '2024-06-21 22:05:15', '2024-06-21 22:05:15', NULL, 1, NULL),
(6, 'Cera', 4, '2024-06-21 22:05:21', '2024-06-21 22:05:21', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_05_11_000001_create_audit_logs_table', 1),
(4, '2024_05_11_000002_create_media_table', 1),
(5, '2024_05_11_000003_create_permissions_table', 1),
(6, '2024_05_11_000004_create_roles_table', 1),
(7, '2024_05_11_000005_create_users_table', 1),
(8, '2024_05_11_000006_create_servicios_table', 1),
(9, '2024_05_11_000007_create_barbershops_table', 1),
(10, '2024_05_11_000008_create_clientes_table', 1),
(11, '2024_05_11_000009_create_barberos_table', 1),
(12, '2024_05_11_000010_create_turnos_table', 1),
(13, '2024_05_11_000011_create_herramienta_table', 1),
(14, '2024_05_11_000012_create_insumos_table', 1),
(15, '2024_05_11_000013_create_permission_role_pivot_table', 1),
(16, '2024_05_11_000014_create_role_user_pivot_table', 1),
(17, '2024_05_11_000015_create_barbero_servicio_pivot_table', 1),
(18, '2024_05_11_000016_add_relationship_fields_to_servicios_table', 1),
(19, '2024_05_11_000017_add_relationship_fields_to_barbershops_table', 1),
(20, '2024_05_11_000018_add_relationship_fields_to_clientes_table', 1),
(21, '2024_05_11_000019_add_relationship_fields_to_barberos_table', 1),
(22, '2024_05_11_000020_add_relationship_fields_to_turnos_table', 1),
(23, '2024_05_11_000021_add_relationship_fields_to_herramienta_table', 1),
(24, '2024_05_11_000022_add_relationship_fields_to_insumos_table', 1),
(25, '2024_05_11_000023_add_verification_fields', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'servicio_create', NULL, NULL, NULL),
(18, 'servicio_edit', NULL, NULL, NULL),
(19, 'servicio_show', NULL, NULL, NULL),
(20, 'servicio_delete', NULL, NULL, NULL),
(21, 'servicio_access', NULL, NULL, NULL),
(22, 'barbershop_create', NULL, NULL, NULL),
(23, 'barbershop_edit', NULL, NULL, NULL),
(24, 'barbershop_show', NULL, NULL, NULL),
(25, 'barbershop_delete', NULL, NULL, NULL),
(26, 'barbershop_access', NULL, NULL, NULL),
(27, 'cliente_create', NULL, NULL, NULL),
(28, 'cliente_edit', NULL, NULL, NULL),
(29, 'cliente_show', NULL, NULL, NULL),
(30, 'cliente_delete', NULL, NULL, NULL),
(31, 'cliente_access', NULL, NULL, NULL),
(32, 'gestionar_barbershop_access', NULL, NULL, NULL),
(33, 'gestionar_servicio_access', NULL, NULL, NULL),
(34, 'gestionar_empleado_access', NULL, NULL, NULL),
(35, 'gestionar_cliente_access', NULL, NULL, NULL),
(36, 'gestionar_inventario_access', NULL, NULL, NULL),
(37, 'audit_log_show', NULL, NULL, NULL),
(38, 'audit_log_access', NULL, NULL, NULL),
(39, 'barbero_create', NULL, NULL, NULL),
(40, 'barbero_edit', NULL, NULL, NULL),
(41, 'barbero_show', NULL, NULL, NULL),
(42, 'barbero_delete', NULL, NULL, NULL),
(43, 'barbero_access', NULL, NULL, NULL),
(44, 'gestionar_turno_access', NULL, NULL, NULL),
(45, 'turno_create', NULL, NULL, NULL),
(46, 'turno_edit', NULL, NULL, NULL),
(47, 'turno_show', NULL, NULL, NULL),
(48, 'turno_delete', NULL, NULL, NULL),
(49, 'turno_access', NULL, NULL, NULL),
(50, 'herramientum_create', NULL, NULL, NULL),
(51, 'herramientum_edit', NULL, NULL, NULL),
(52, 'herramientum_show', NULL, NULL, NULL),
(53, 'herramientum_delete', NULL, NULL, NULL),
(54, 'herramientum_access', NULL, NULL, NULL),
(55, 'insumo_create', NULL, NULL, NULL),
(56, 'insumo_edit', NULL, NULL, NULL),
(57, 'insumo_show', NULL, NULL, NULL),
(58, 'insumo_delete', NULL, NULL, NULL),
(59, 'insumo_access', NULL, NULL, NULL),
(60, 'profile_password_edit', NULL, NULL, NULL),
(61, 'view_dashboard', '2024-06-13 01:05:23', '2024-06-13 01:05:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 35),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 60),
(1, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_servicio` varchar(255) NOT NULL,
  `precio_servicio` decimal(15,2) NOT NULL,
  `duracion_servicio` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre_servicio`, `precio_servicio`, `duracion_servicio`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`) VALUES
(1, 'Corte de Pelo', 3500.00, '00:40:00', '2024-06-19 03:26:24', '2024-06-21 21:41:21', NULL, NULL),
(2, 'Corte de Barba', 3000.00, '00:30:00', '2024-06-21 21:42:01', '2024-06-21 21:42:01', NULL, NULL),
(3, 'Corte de Navaja', 2800.00, '00:30:00', '2024-06-21 21:42:30', '2024-06-21 21:42:30', NULL, NULL),
(4, 'Afeitado', 3000.00, '00:30:00', '2024-06-21 21:42:51', '2024-06-21 21:42:51', NULL, NULL),
(5, 'Coloracion', 2800.00, '00:50:00', '2024-06-21 21:43:22', '2024-06-21 21:43:22', NULL, NULL),
(6, 'Corte de Pelo + Barba', 7000.00, '00:50:00', '2024-06-21 21:43:47', '2024-06-21 21:43:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_turno` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cliente_turno_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barbershop_turno_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barbero_turno_id` bigint(20) UNSIGNED DEFAULT NULL,
  `servicio_turno_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `fecha_turno`, `created_at`, `updated_at`, `deleted_at`, `cliente_turno_id`, `barbershop_turno_id`, `barbero_turno_id`, `servicio_turno_id`, `created_by_id`) VALUES
(1, '2024-06-23 21:27:33', '2024-06-19 03:27:37', '2024-06-21 21:45:45', '2024-06-21 21:45:45', 2, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `verified`, `verified_at`, `verification_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$SbaDAUfD2Eq4/MBpH4gDfeNMYRNszorjboOLZ1VQVY6.BAtxTWpSG', 1, '2024-05-11 00:06:25', '', NULL, NULL, NULL, NULL),
(2, 'usertest', 'user@user.com', NULL, '$2y$10$rKk/kqyTMLz2crQU/KgEAO67hJZOK.e7WY3bXkMqB77Fcm/IikY0K', 1, '2024-06-12 22:10:51', NULL, NULL, '2024-06-13 01:10:51', '2024-06-13 01:10:51', NULL),
(3, 'usertest2', 'user2@user.com', NULL, '$2y$10$wWSHrBzkiEwxAR7vy68MouJubB.4pVKKjIb9emgA3ODiHoYG5oQDG', 1, '2024-06-12 22:14:44', NULL, NULL, '2024-06-13 01:14:44', '2024-06-13 01:14:44', NULL),
(4, 'usertest3', 'user3@user.com', NULL, '$2y$10$BR9pIW0itU09/MDPZF4xnOP5z.7GAkhKO46B4kk2ushQcjhO.tyXu', 1, '2024-06-21 16:13:05', NULL, NULL, '2024-06-21 19:11:08', '2024-06-21 19:13:05', NULL),
(5, 'usertest4', 'user4@user.com', NULL, '$2y$10$trXptxx0ZT4z4bPm9c401eUtUUoFH9n95nnYawX3knQ13OZi.7mlq', 1, '2024-06-21 16:17:18', NULL, NULL, '2024-06-21 19:13:30', '2024-06-21 19:17:18', NULL),
(6, 'usertest5', 'user5@user.com', NULL, '$2y$10$9gwaOad/gsKrV.pTiPRGTuQXiMTFH8BOkV00MAio.F70xNY2pvj8C', 1, '2024-06-21 16:26:03', NULL, NULL, '2024-06-21 19:25:37', '2024-06-21 19:26:03', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `barberos`
--
ALTER TABLE `barberos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_9730504` (`created_by_id`);

--
-- Indices de la tabla `barbero_servicio`
--
ALTER TABLE `barbero_servicio`
  ADD KEY `barbero_id_fk_9730500` (`barbero_id`),
  ADD KEY `servicio_id_fk_9730500` (`servicio_id`);

--
-- Indices de la tabla `barbershops`
--
ALTER TABLE `barbershops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_9730155` (`created_by_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_9675821` (`created_by_id`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lugar_herramienta_fk_9735893` (`lugar_herramienta_id`),
  ADD KEY `created_by_fk_9735782` (`created_by_id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lugar_insumo_fk_9735950` (`lugar_insumo_id`),
  ADD KEY `created_by_fk_9735955` (`created_by_id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_9675521` (`role_id`),
  ADD KEY `permission_id_fk_9675521` (`permission_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_9675530` (`user_id`),
  ADD KEY `role_id_fk_9675530` (`role_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_9730194` (`created_by_id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_turno_fk_9735405` (`cliente_turno_id`),
  ADD KEY `barbershop_turno_fk_9735561` (`barbershop_turno_id`),
  ADD KEY `barbero_turno_fk_9735657` (`barbero_turno_id`),
  ADD KEY `servicio_turno_fk_9735892` (`servicio_turno_id`),
  ADD KEY `created_by_fk_9735409` (`created_by_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `barberos`
--
ALTER TABLE `barberos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `barbershops`
--
ALTER TABLE `barbershops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barberos`
--
ALTER TABLE `barberos`
  ADD CONSTRAINT `created_by_fk_9730504` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `barbero_servicio`
--
ALTER TABLE `barbero_servicio`
  ADD CONSTRAINT `barbero_id_fk_9730500` FOREIGN KEY (`barbero_id`) REFERENCES `barberos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `servicio_id_fk_9730500` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `barbershops`
--
ALTER TABLE `barbershops`
  ADD CONSTRAINT `created_by_fk_9730155` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `created_by_fk_9675821` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `created_by_fk_9735782` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lugar_herramienta_fk_9735893` FOREIGN KEY (`lugar_herramienta_id`) REFERENCES `barbershops` (`id`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `created_by_fk_9735955` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lugar_insumo_fk_9735950` FOREIGN KEY (`lugar_insumo_id`) REFERENCES `barbershops` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_9675521` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_9675521` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_9675530` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_9675530` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `created_by_fk_9730194` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `barbero_turno_fk_9735657` FOREIGN KEY (`barbero_turno_id`) REFERENCES `barberos` (`id`),
  ADD CONSTRAINT `barbershop_turno_fk_9735561` FOREIGN KEY (`barbershop_turno_id`) REFERENCES `barbershops` (`id`),
  ADD CONSTRAINT `cliente_turno_fk_9735405` FOREIGN KEY (`cliente_turno_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `created_by_fk_9735409` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `servicio_turno_fk_9735892` FOREIGN KEY (`servicio_turno_id`) REFERENCES `servicios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
