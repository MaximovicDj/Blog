-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 11:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `time`) VALUES
(19, 'Sports', '2022-04-01 10:39:04'),
(20, 'Games', '2022-04-01 10:39:08'),
(21, 'Pets and Animals', '2022-04-01 10:39:13'),
(22, 'Home and Garden', '2022-04-01 10:39:18'),
(23, 'Health', '2022-04-01 10:43:11'),
(24, 'Travel and Tourism', '2022-04-06 12:41:41'),
(25, 'Vehicles', '2022-04-06 12:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `post_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `time`, `post_id`) VALUES
(25, 'Mark', '', 'Awesome post, the truth is the sport is our health!', '2022-04-06 13:00:09', 75),
(26, 'Joh', '', 'Love gamess!!!', '2022-04-06 13:00:31', 74),
(27, 'Simon', 'email@exc.om', 'No man, thath the wasing time', '2022-04-06 13:00:51', 74);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `text`, `time`, `seen`) VALUES
(4, 'Milos', 'milos@email.com', 'Ovo je pitanje za admian', '2022-04-05 17:49:40', 1),
(5, 'Dragan', 'dragan@email.com', 'Ovo je drugo pitanje za Administratora stranice', '2022-04-05 17:51:24', 0),
(6, 'Britney', 'brit@email.com', 'This is message For Admin!', '2022-04-06 12:35:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `post_id` int(3) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `post_id`, `time`) VALUES
(189, '1649241492.0584.jpg', 67, '2022-04-06 12:38:12'),
(191, '1649241492.0633.jpg', 67, '2022-04-06 12:38:12'),
(192, '1649241492.0652.jpg', 67, '2022-04-06 12:38:12'),
(194, '1649242057.8106.jpg', 69, '2022-04-06 12:47:37'),
(195, '1649242057.8122.webp', 69, '2022-04-06 12:47:37'),
(196, '1649242057.8138.webp', 69, '2022-04-06 12:47:37'),
(197, '1649242057.8154.webp', 69, '2022-04-06 12:47:37'),
(198, '1649242057.8167.webp', 69, '2022-04-06 12:47:37'),
(199, '1649242170.6345.webp', 70, '2022-04-06 12:49:30'),
(200, '1649242170.6361.webp', 70, '2022-04-06 12:49:30'),
(201, '1649242170.6376.webp', 70, '2022-04-06 12:49:30'),
(202, '1649242170.6392.jpg', 70, '2022-04-06 12:49:30'),
(203, '1649242170.6413.webp', 70, '2022-04-06 12:49:30'),
(204, '1649242266.4904.webp', 71, '2022-04-06 12:51:06'),
(205, '1649242266.4922.webp', 71, '2022-04-06 12:51:06'),
(206, '1649242266.4942.webp', 71, '2022-04-06 12:51:06'),
(207, '1649242266.4958.webp', 71, '2022-04-06 12:51:06'),
(208, '1649242266.4975.webp', 71, '2022-04-06 12:51:06'),
(209, '1649242266.4991.webp', 71, '2022-04-06 12:51:06'),
(210, '1649242336.5267.jpg', 72, '2022-04-06 12:52:16'),
(211, '1649242336.5283.webp', 72, '2022-04-06 12:52:16'),
(212, '1649242336.53.webp', 72, '2022-04-06 12:52:16'),
(213, '1649242336.5321.jpg', 72, '2022-04-06 12:52:16'),
(214, '1649242336.5339.jpg', 72, '2022-04-06 12:52:16'),
(215, '1649242336.5351.webp', 72, '2022-04-06 12:52:16'),
(216, '1649242550.1079.webp', 73, '2022-04-06 12:55:50'),
(217, '1649242550.1094.webp', 73, '2022-04-06 12:55:50'),
(218, '1649242550.1113.webp', 73, '2022-04-06 12:55:50'),
(219, '1649242550.1131.webp', 73, '2022-04-06 12:55:50'),
(220, '1649242550.1146.webp', 73, '2022-04-06 12:55:50'),
(221, '1649242550.116.webp', 73, '2022-04-06 12:55:50'),
(222, '1649242647.5801.webp', 74, '2022-04-06 12:57:27'),
(223, '1649242647.5817.webp', 74, '2022-04-06 12:57:27'),
(224, '1649242647.5836.webp', 74, '2022-04-06 12:57:27'),
(225, '1649242647.585.webp', 74, '2022-04-06 12:57:27'),
(226, '1649242647.5866.webp', 74, '2022-04-06 12:57:27'),
(227, '1649242761.0699.webp', 75, '2022-04-06 12:59:21'),
(228, '1649242761.0717.jpg', 75, '2022-04-06 12:59:21'),
(229, '1649242761.0736.webp', 75, '2022-04-06 12:59:21'),
(230, '1649242761.075.jpg', 75, '2022-04-06 12:59:21'),
(231, '1649242761.0764.webp', 75, '2022-04-06 12:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(3) NOT NULL,
  `seen` int(6) DEFAULT 0,
  `category_id` int(3) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `time`, `user_id`, `seen`, `category_id`, `image`) VALUES
(67, 'Lorem Ipsum lorem ', '<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Curabitur vel eros in quam pretium dignissim.</li>\r\n<li>Vestibulum tempor diam in turpis condimentum, id convallis metus ultrices.</li>\r\n<li>Vestibulum imperdiet est in blandit tempus.</li>\r\n<li>Nulla venenatis metus ac nisi placerat, non dignissim mauris ornare.</li>\r\n<li>Suspendisse elementum sem vitae ligula bibendum, eget aliquet lorem accumsan.</li>\r\n<li>Praesent ac felis auctor, feugiat em imperdiet, dapibus nibh.</li>\r\n<li>Etiam cursus turpis in dolor commodo, eget egestas elit vulputate.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Aliquam nec mi ut tellus tristique blandit at in tortor.</li>\r\n<li>Nullam sodales odio sit amet enim consectetur, sed eleifend nunc fringilla.</li>\r\n<li>Nam sed ex nec magna maximus rutrum.</li>\r\n<li>Pellentesque sit amet felis vitae sapien tristique euismod nec ut nisi.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Sed iaculis nisi ac bibendum pretium.</li>\r\n<li>Sed vitae felis nec ex sagittis facilisis vitae et justo.</li>\r\n<li>Integer tincidunt mauris vitae commodo condimentum.</li>\r\n<li>Nam eget lorem sed lacus elementum mollis.</li>\r\n</ul>', '2022-04-06 12:38:12', 34, 2, 22, '1649241492.0488.jpg'),
(69, 'Great vehicles worth a look!', '<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Suspendisse pretium ligula id rhoncus porta.</li>\r\n<li>Cras et mi sed erat vulputate convallis.</li>\r\n<li>Nunc vitae tellus et sapien posuere consectetur at ut nulla.</li>\r\n<li>Aenean quis augue finibus velit vehicula dapibus quis ac tellus.</li>\r\n</ul>', '2022-04-06 12:47:37', 32, 1, 25, '1649242057.8084.webp'),
(70, 'The most beautiful places to visit!', '<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Suspendisse pretium ligula id rhoncus porta.</li>\r\n<li>Cras et mi sed erat vulputate convallis.</li>\r\n<li>Nunc vitae tellus et sapien posuere consectetur at ut nulla.</li>\r\n<li>Aenean quis augue finibus velit vehicula dapibus quis ac tellus.</li>\r\n</ul>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2022-04-06 12:49:30', 32, 0, 24, '1649242170.6325.webp'),
(71, 'Health is more important then u think...', '<h2>Why do we use it?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2022-04-06 12:51:06', 32, 0, 23, '1649242266.4803.webp'),
(72, 'Home is Where you live!', '<h2>Why do we use it?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Fusce nec ante vestibulum, laoreet leo non, auctor magna.</li>\r\n<li>Nam euismod tellus vel dictum tincidunt.</li>\r\n<li>Nunc ut nibh eu libero rhoncus ultricies.</li>\r\n<li>Sed sagittis neque non velit maximus facilisis.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Proin ut libero eu tellus facilisis gravida eget ut lectus.</li>\r\n<li>In et nunc ut erat faucibus convallis.</li>\r\n<li>Sed ullamcorper massa sollicitudin, gravida turpis ut, bibendum tortor.</li>\r\n<li>Nunc tincidunt elit non enim consectetur, eu facilisis lectus bibendum.</li>\r\n<li>Duis aliquam massa non ullamcorper convallis.</li>\r\n</ul>', '2022-04-06 12:52:16', 32, 0, 22, '1649242336.5163.webp'),
(73, 'Mans best friend is dog', '<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Fusce nec ante vestibulum, laoreet leo non, auctor magna.</li>\r\n<li>Nam euismod tellus vel dictum tincidunt.</li>\r\n<li>Nunc ut nibh eu libero rhoncus ultricies.</li>\r\n<li>Sed sagittis neque non velit maximus facilisis.</li>\r\n<li>Proin ut libero eu tellus facilisis gravida eget ut lectus.</li>\r\n<li>In et nunc ut erat faucibus convallis.</li>\r\n<li>Sed ullamcorper massa sollicitudin, gravida turpis ut, bibendum tortor.</li>\r\n<li>Nunc tincidunt elit non enim consectetur, eu facilisis lectus bibendum.</li>\r\n<li>Duis aliquam massa non ullamcorper convallis.</li>\r\n<li>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompan</p>\r\n</li>\r\n</ul>', '2022-04-06 12:55:50', 35, 0, 21, '1649242550.0984.webp'),
(74, 'The game is our fun', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>', '2022-04-06 12:57:27', 35, 3, 20, '1649242647.5781.webp'),
(75, 'Sport is health!', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>', '2022-04-06 12:59:21', 35, 3, 19, '1649242761.0665.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Admin','User') NOT NULL DEFAULT 'User',
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `time`) VALUES
(32, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$pKC78yXgX5VHmREXlUAowONCTNSVPV6T1zLkoHGRk56A.8hO9cUJ.', 'Admin', '2022-04-05 10:10:51'),
(35, 'User', 'User', 'user@user3.com', '$2y$10$t81uLiaLBiwWNzcwEOznW.GINtrEzzT2MFWXlOEFVwieD/wh1.h3a', 'User', '2022-04-06 12:39:53');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewposts`
-- (See below for the actual view)
--
CREATE TABLE `viewposts` (
`id` int(3) unsigned
,`title` varchar(255)
,`text` text
,`time` datetime
,`user_id` int(3)
,`seen` int(6)
,`category_id` int(3)
,`image` varchar(255)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`email` varchar(255)
,`status` enum('Admin','User')
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `viewposts`
--
DROP TABLE IF EXISTS `viewposts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewposts`  AS SELECT `posts`.`id` AS `id`, `posts`.`title` AS `title`, `posts`.`text` AS `text`, `posts`.`time` AS `time`, `posts`.`user_id` AS `user_id`, `posts`.`seen` AS `seen`, `posts`.`category_id` AS `category_id`, `posts`.`image` AS `image`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`email` AS `email`, `users`.`status` AS `status`, `category`.`name` AS `name` FROM ((`posts` join `users` on(`users`.`id` = `posts`.`user_id`)) join `category` on(`category`.`id` = `posts`.`category_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
