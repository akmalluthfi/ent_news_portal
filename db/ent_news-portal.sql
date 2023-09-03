-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2023 at 03:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ent_news-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(17, '2023_09_01_113348_profil_neko.jpg', 'Example Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur obcaecati odio asperiores iste natus porro alias rem. Mollitia culpa porro exercitationem, aperiam quam minima, perspiciatis odio nam doloribus eligendi error iure eum optio sunt nesciunt fugit corrupti maxime laborum ducimus saepe voluptatibus officia odit. Pariatur enim et nemo inventore quis quasi mollitia. Neque nisi in adipisci error tempore labore dolore esse, repudiandae libero ratione enim voluptatem reprehenderit aliquid, ipsam pariatur unde consectetur! Sit totam accusantium obcaecati dignissimos consectetur excepturi velit maxime expedita vitae a mollitia cum adipisci nostrum repellat numquam quo, omnis quibusdam quasi est id? Culpa quod itaque consequatur!', 5, '2023-09-01 04:33:48', '2023-09-01 04:33:48'),
(18, '2023_09_02_022655_wallpaper23.png', 'Test post 2', 'Hello Input', 5, '2023-09-01 19:15:40', '2023-09-01 19:26:55'),
(19, '2023_09_02_022709_wallpaper11.jpg', 'tetst posts 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates veritatis eum laborum nobis fuga reiciendis odit excepturi. Officia odit optio quis minima libero natus. Eligendi non possimus eum assumenda ipsa eveniet accusantium saepe earum molestiae quam? Iure reprehenderit optio magni enim quae, qui pariatur expedita, ex porro eligendi quo id blanditiis? Veniam veritatis nisi dolores dolorum exercitationem repellendus. Itaque, quod? Tenetur molestias nesciunt ex magnam corrupti pariatur iste rem accusamus vel voluptatem commodi sed maiores harum illum delectus, placeat dolorem laudantium repudiandae necessitatibus? Ab hic aspernatur odit totam iste pariatur, unde praesentium ut molestiae! Optio ullam molestias numquam aspernatur pariatur?', 5, '2023-09-01 19:16:08', '2023-09-01 19:27:09'),
(20, '2023_09_02_022723_wallpaper4.jpg', 'Tets posts 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates veritatis eum laborum nobis fuga reiciendis odit excepturi. Officia odit optio quis minima libero natus. Eligendi non possimus eum assumenda ipsa eveniet accusantium saepe earum molestiae quam? Iure reprehenderit optio magni enim quae, qui pariatur expedita, ex porro eligendi quo id blanditiis? Veniam veritatis nisi dolores dolorum exercitationem repellendus. Itaque, quod? Tenetur molestias nesciunt ex magnam corrupti pariatur iste rem accusamus vel voluptatem commodi sed maiores harum illum delectus, placeat dolorem laudantium repudiandae necessitatibus? Ab hic aspernatur odit totam iste pariatur, unde praesentium ut molestiae! Optio ullam molestias numquam aspernatur pariatur?', 5, '2023-09-01 19:16:28', '2023-09-01 19:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'alfi', '$2y$10$uF6elnZsG9uskTnS8ipAee6lD4MMxVmctOoc518PtAPLo9fiUMFl2'),
(2, 'admin', '$2y$10$J2Rbk6UdHR8B2TItdJJSuOh0GV1o8fgLAt88aFSPVwwgV8V1266jC'),
(3, 'akmalluthfi', '$2y$10$fsyPQfbwDMiRizkBRv95oeZ5P8qKqQfCEsM4RXdeP896JrU.wcDCq'),
(4, 'testing', '$2y$10$s9LqkN4xaVbaaRmksMXJg.IY.Aa1mOjomCkxa4iv3rf/S2n8XsMcG'),
(5, 'pensent', '$2y$10$8ofIxGjHBS9oyZ4950HNieIk24Yzx30MxlVbgR7ImektT0neGelIy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
