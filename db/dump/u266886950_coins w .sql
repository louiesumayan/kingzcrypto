-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 09:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u266886950_coins`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_discount`
--

CREATE TABLE `ads_discount` (
  `id` int(11) NOT NULL,
  `days` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `pdiscount` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads_discount`
--

INSERT INTO `ads_discount` (`id`, `days`, `discount`, `pdiscount`) VALUES
(1, '3', '15', '10'),
(2, '7', '25', '20'),
(3, '14', '40', '25');

-- --------------------------------------------------------

--
-- Table structure for table `ads_list`
--

CREATE TABLE `ads_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `pos_image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads_list`
--

INSERT INTO `ads_list` (`id`, `name`, `desc`, `price`, `pos_image`) VALUES
(1, 'Banner Ad', 'A medium-sized banner shown on all pages. Rotates with other banners.', '15', NULL),
(2, 'Promoted Spot', 'Your project in the promoted coins section on top of our homepage. These are the most prominent places for projects.', '30', NULL),
(3, 'Premium Banner', 'A large sticky banner shown on the bottom of the screen. It’s a dedicated spot, only one banner runs at the same time.', '17', NULL),
(4, 'Search Ad', 'A dedicated spot on top of all search results. Whenever a user searches for a coin, your ad will show.', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boosts`
--

CREATE TABLE `boosts` (
  `id` int(11) NOT NULL,
  `package` varchar(255) DEFAULT NULL,
  `boost` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `uid` varchar(45) DEFAULT NULL,
  `reg_date` varchar(45) DEFAULT 'current_timestamp()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boosts_list`
--

CREATE TABLE `boosts_list` (
  `id` int(11) NOT NULL,
  `package` int(11) DEFAULT NULL,
  `boosts` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boosts_list`
--

INSERT INTO `boosts_list` (`id`, `package`, `boosts`, `price`, `bonus`) VALUES
(1, 1, 1, 10, 0),
(2, 2, 5, 50, 1),
(3, 3, 10, 100, 2),
(4, 4, 25, 250, 5),
(5, 5, 50, 500, 15),
(6, 6, 100, 1000, 40),
(7, 7, 250, 2500, 100),
(8, 8, 500, 5000, 250),
(9, 9, 1000, 10000, 600);

-- --------------------------------------------------------

--
-- Table structure for table `boost_pay`
--

CREATE TABLE `boost_pay` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `add` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `postal` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `bpack` varchar(45) DEFAULT NULL,
  `boosts` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `tprice` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `reg_date` varchar(45) DEFAULT 'current_timestamp()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buy_ads`
--

CREATE TABLE `buy_ads` (
  `id` int(11) NOT NULL,
  `dates_banners` text DEFAULT NULL,
  `dates_promoted` text DEFAULT NULL,
  `dates_premium` text DEFAULT NULL,
  `dates_search` text DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `userid` varchar(25) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `pid` varchar(45) DEFAULT NULL,
  `bprice` varchar(45) DEFAULT NULL,
  `proprice` varchar(45) DEFAULT NULL,
  `preprice` varchar(45) DEFAULT NULL,
  `sprice` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `tprice` varchar(45) DEFAULT NULL,
  `bdays` varchar(45) DEFAULT NULL,
  `prodays` varchar(45) DEFAULT NULL,
  `predays` varchar(45) DEFAULT NULL,
  `sdays` varchar(45) DEFAULT NULL,
  `tdays` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy_ads`
--

INSERT INTO `buy_ads` (`id`, `dates_banners`, `dates_promoted`, `dates_premium`, `dates_search`, `status`, `userid`, `reg_date`, `pid`, `bprice`, `proprice`, `preprice`, `sprice`, `discount`, `type`, `tprice`, `bdays`, `prodays`, `predays`, `sdays`, `tdays`) VALUES
(2, '', ' 23 July 2023', '', ' ', 'PAID', '1', '2023-07-23 06:44:28', 'C4CDE70B', '15', '30', '17', '15', '0', ', promoted', '30', '0', '1', '0', '0', '1'),
(3, '', ' ', '23 July 2023', ' ', 'PAID', '1', '2023-07-23 06:44:44', 'C5C7A177', '15', '30', '17', '15', '0', ', premium', '17', '0', '0', '1', '0', '1'),
(4, '', ' ', '', '25 July 2023 ', 'PAID', '1', '2023-07-23 06:45:02', 'C6E1BE24', '15', '30', '17', '15', '0', ', search', '17', '0', '0', '0', '1', '1'),
(7, '23 July 2023,25 July 2023', ' ', '', ' ', 'PAID', '1', '2023-07-23 08:38:37', '70D2F65D', '15', '30', '17', '15', '0', ', banner', '30', '2', '0', '0', '0', '2'),
(8, '24 July 2023', ' ', '', ' ', 'PAID', '1', '2023-07-23 14:10:51', '4EB1ED4D', '15', '30', '17', '15', '0', ', banner', '15', '1', '0', '0', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `buy_ads_one`
--

CREATE TABLE `buy_ads_one` (
  `id` int(11) NOT NULL,
  `ads` varchar(255) DEFAULT NULL,
  `date` text DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buy_boosts`
--

CREATE TABLE `buy_boosts` (
  `id` int(11) NOT NULL,
  `package` varchar(45) DEFAULT NULL,
  `totalboosts` int(11) DEFAULT NULL,
  `totalprice` varchar(45) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `userid` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `pid` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy_boosts`
--

INSERT INTO `buy_boosts` (`id`, `package`, `totalboosts`, `totalprice`, `reg_date`, `userid`, `status`, `pid`) VALUES
(1, '1', 1, '10', '2023-07-19 07:03:23', '1', NULL, '#4F2C8C59E6'),
(2, '1', 1, '10', '2023-07-19 07:18:40', '1', NULL, '#A899C22692'),
(3, '2', 6, '50', '2023-07-19 07:57:38', '1', 'complete', '#EA8A80D97B'),
(4, '1', 1, '10', '2023-07-23 14:36:38', '1', NULL, '#0EFBE965FF'),
(5, '1', 1, '10', '2023-07-23 14:37:35', '1', NULL, '#F72F2DF3D5'),
(6, '1', 1, '10', '2023-07-23 14:38:42', '1', NULL, '#AF787306B5'),
(7, '1', 1, '10', '2023-07-23 14:39:00', '1', NULL, '#35D2E8D77F'),
(8, '1', 1, '10', '2023-07-23 14:44:49', '1', NULL, '#5C54A1FDBB');

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `presale` varchar(255) DEFAULT NULL,
  `fairlaunch` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `cap_network` varchar(255) DEFAULT NULL,
  `hardcap` varchar(255) DEFAULT NULL,
  `customswaplink` varchar(255) DEFAULT NULL,
  `presale_start_day` varchar(45) DEFAULT NULL,
  `presale_start_month` varchar(255) DEFAULT NULL,
  `presale_start_year` varchar(255) DEFAULT NULL,
  `presale_end_day` varchar(255) DEFAULT NULL,
  `presale_end_month` varchar(45) DEFAULT NULL,
  `presale_end_year` varchar(255) DEFAULT NULL,
  `bsc_contract_address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `launch_date` varchar(255) DEFAULT NULL,
  `date_created_day` varchar(255) DEFAULT NULL,
  `date_created_month` varchar(255) DEFAULT NULL,
  `date_created_year` varchar(255) DEFAULT NULL,
  `custom_dex_link` varchar(255) DEFAULT NULL,
  `custom_swap_link` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `telegram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `discord_link` varchar(255) DEFAULT NULL,
  `whitepaper_link` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_telegram` varchar(255) DEFAULT NULL,
  `terms` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `vote` varchar(45) DEFAULT NULL,
  `softcap` varchar(255) DEFAULT NULL,
  `boosts` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `image_url`, `photo`, `name`, `symbol`, `network`, `presale`, `fairlaunch`, `desc`, `cap_network`, `hardcap`, `customswaplink`, `presale_start_day`, `presale_start_month`, `presale_start_year`, `presale_end_day`, `presale_end_month`, `presale_end_year`, `bsc_contract_address`, `description`, `launch_date`, `date_created_day`, `date_created_month`, `date_created_year`, `custom_dex_link`, `custom_swap_link`, `website_link`, `telegram_link`, `twitter_link`, `discord_link`, `whitepaper_link`, `contact_email`, `contact_telegram`, `terms`, `reg_date`, `vote`, `softcap`, `boosts`, `status`, `user`) VALUES
(1, '/upload/coin/abll.png   \r\n', '', '3GX Corporation', 'T1', 'bsc', 'No', 'No', NULL, 'eth', '', NULL, '', '', '', '', '', '', 'sdfgsdgfdagfd', 'dfgaadfgfdg', 'No', '', '', '', 'https://github.com/140053?tab=repositories', 'https://github.com/140053?tab=repositories', 'https://github.com/140053?tab=repositories', 'https://github.com/140053?tab=repositories', 'https://github.com/140053?tab=repositories', 'https://github.com/140053?tab=repositories', 'https://github.com/140053?tab=repositories', 'admin@local.a', '@ken', '', '2023-07-15 02:32:38', '1', '', 6, 'approve', '1'),
(3, '/upload/coin/abll.png   \r\n', '', 'demo1', 'DEMO', 'bsc', 'No', 'No', NULL, 'eth', '', NULL, '', '', '', '', '', '', 'adadasd', 'none', 'No', '2', '4', '1997', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'admin@local.a', '@admin', 'on', '2023-07-17 07:25:27', NULL, '', NULL, 'approve', NULL),
(4, '/upload/coin/abll.png   \r\n', '', 'DEMO1', 'DM1', 'bsc', 'No', 'No', NULL, 'eth', '', NULL, '', '', '', '', '', '', 'dasdasdasd', 'none', 'No', '2', '4', '1997', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'http://localhost/submit.php', 'admin@local.a', '@demo', 'on', '2023-07-19 08:25:16', NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `auth` varchar(255) DEFAULT NULL,
  `boosts` int(11) DEFAULT NULL,
  `aflink` varchar(255) DEFAULT NULL,
  `eaddress` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `ticket` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `reg_date`, `auth`, `boosts`, `aflink`, `eaddress`, `network`, `ticket`) VALUES
(1, 'demo0', 'admin@local.a', '$2y$10$oPVAEdqJ82zyucCgBLnAze/1JMI8QAoY2knenUG7eWuwF1w7v9zZe', '2023-07-13 06:37:25', 'admin', 0, 'http://localhost/dashboard/', '0x000000000000000000000000000000000000000000000', 'BN2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voteduser`
--

CREATE TABLE `voteduser` (
  `id` int(11) NOT NULL,
  `coin_id` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voteduser`
--

INSERT INTO `voteduser` (`id`, `coin_id`, `user_id`, `reg_date`) VALUES
(1, '1', '1', '2023-07-19 07:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads_discount`
--
ALTER TABLE `ads_discount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `ads_list`
--
ALTER TABLE `ads_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `boosts`
--
ALTER TABLE `boosts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `boosts_list`
--
ALTER TABLE `boosts_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `boost_pay`
--
ALTER TABLE `boost_pay`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `buy_ads`
--
ALTER TABLE `buy_ads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `buy_ads_one`
--
ALTER TABLE `buy_ads_one`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `buy_boosts`
--
ALTER TABLE `buy_boosts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `voteduser`
--
ALTER TABLE `voteduser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads_discount`
--
ALTER TABLE `ads_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ads_list`
--
ALTER TABLE `ads_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boosts`
--
ALTER TABLE `boosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boosts_list`
--
ALTER TABLE `boosts_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `boost_pay`
--
ALTER TABLE `boost_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buy_ads`
--
ALTER TABLE `buy_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buy_ads_one`
--
ALTER TABLE `buy_ads_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buy_boosts`
--
ALTER TABLE `buy_boosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voteduser`
--
ALTER TABLE `voteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
