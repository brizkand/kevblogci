-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 08:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_igniter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `category`, `created_at`) VALUES
(1, 1, 'Business', '2018-12-10 02:36:11'),
(2, 1, 'Technology', '2018-12-10 02:06:28'),
(4, 0, 'Environment', '2018-11-28 08:36:24'),
(5, 0, 'Industrial', '2018-11-28 08:42:41'),
(6, 0, 'Real State', '2018-12-04 05:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `created_at`) VALUES
(1, 'Kevin Garcia', 'kevin@genserv-ph.com', 'Nice post', 49, '2018-12-03 06:18:21'),
(2, 'Kevin Garcia', 'kevin@genserv-ph.com', 'Amazing post', 49, '2018-12-03 06:27:03'),
(3, 'Brizkand', 'kevin@genserv-ph.com', 'Wow it looks great!', 47, '2018-12-10 02:37:09'),
(4, 'Kevin Garcia', 'kevin@genserv-ph.com', 'i like it', 49, '2018-12-10 02:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` mediumtext NOT NULL,
  `post_image` varchar(191) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `body`, `post_image`, `category_id`, `created_at`) VALUES
(47, 1, 'This is post 1', 'this-is-post-1', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'elevator.png', 1, '2018-12-05 03:29:39'),
(49, 2, 'Post Two', 'post-two', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio magna, vestibulum sed ex nec, bibendum rutrum lectus. Donec consequat, urna vitae ornare suscipit, libero lacus ornare justo, vel auctor est urna a metus. Proin leo urna, aliquet eu sollicitudin et, condimentum vitae turpis. Praesent tortor turpis, efficitur non tristique ac, semper ac velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id placerat mauris. Maecenas dignissim convallis mi. Maecenas cursus nisl quis sapien egestas, eu lacinia leo lobortis. Morbi non sagittis elit. Nullam ullamcorper efficitur lacus ut accumsan. Quisque imperdiet sem quis lacus pharetra molestie. Nulla velit ligula, venenatis sed scelerisque ac, gravida vitae magna. Curabitur non eros urna.</p><p>Etiam malesuada mattis urna eget scelerisque. Morbi ultrices, diam in pellentesque porttitor, quam nibh dapibus nibh, non mollis nulla magna vel turpis. Donec ornare sem neque, ut dignissim elit congue sed. Nulla condimentum luctus odio eu viverra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse non tortor dui. Fusce tellus turpis, sollicitudin vitae finibus id, blandit in magna. Nunc nisl nisl, pulvinar quis convallis sed, aliquet at sapien. Etiam leo augue, finibus eget dolor quis, consectetur vulputate erat. Vivamus fringilla nisl sed egestas semper. Nam aliquam sapien vel lorem convallis luctus malesuada molestie augue. Quisque dolor urna, posuere ultricies eleifend eget, porttitor ut erat. Donec ac feugiat neque. Praesent egestas, risus sit amet vulputate molestie, arcu lacus sodales nibh, id sollicitudin felis ligula eget leo. Curabitur ut ornare tellus, nec dapibus purus.</p>', 'IMG-222ad51008eaf2e06a74a875a258cd84-V.jpg', 2, '2018-12-05 03:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `zipcode` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `zipcode`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'Kevin', 'Holgado', '1234', 'kevin@genserv-ph.com', 'brizkand', '$2y$10$UbKGhzf5Pp6LpoXEtpWvoOJ1UON41AO3e.RpfwtVpbNjmKOSHPsnG', '2018-12-04 02:49:22'),
(2, 'Beverly', 'Banaguas', '1234', 'bev@genserv.ph.com', 'bev', '$2y$10$Su/DatPLQ4AEajXgRPGB/eYd//9dhPPSZu5MCcmd/aAqJg2uPdZNG', '2018-12-04 05:39:16'),
(3, 'Santiago', 'Holgado', '4321', 'santiago@genserv-ph.com', 'santiago', '$2y$10$hKw6koJfUzCoPIgyclUsHuUpSIv6ZbquuUVVUerz3v6pKMbr8ST5a', '2018-12-04 05:50:56'),
(4, 'Duroy', 'Macunatan', '1111', 'duroy@genserv-ph.com', 'duroy', '$2y$10$IZA/xHBsngU5EGe7DkrHpu4e9pahRf2iAB98v2kMWA5QgjiqmDsb6', '2018-12-05 05:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
