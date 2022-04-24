-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `widespread`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `profile` varchar(11) NOT NULL,
  `addTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `profile`, `addTime`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'bdbb87d82bebd41d7f7864980a72d2b8', '675.jpg', '2022-04-11 10:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(50) NOT NULL,
  `user_1` varchar(200) NOT NULL,
  `user_2` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_1`, `user_2`, `time`) VALUES
(3, '_.i.m.h.a.r.d.i.k._d', 'widespread_.p.h_', '2022-04-14 11:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(200) NOT NULL,
  `incoming_msg_id` varchar(200) NOT NULL,
  `outgoing_msg_id` varchar(200) NOT NULL,
  `text_message` text NOT NULL,
  `link` int(11) NOT NULL DEFAULT 1,
  `curr_date` varchar(50) NOT NULL,
  `curr_time` varchar(50) NOT NULL,
  `open` int(1) NOT NULL DEFAULT 1,
  `vi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `text_message`, `link`, `curr_date`, `curr_time`, `open`, `vi`) VALUES
(3, '_.i.m.h.a.r.d.i.k._d', 'widespread_.p.h_', 'LSM=', 1, 'April 14, 2022', '9:34 am', 0, '556de3ac5fed0aaa348aa62dec9e0af9'),
(9, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._d', 'MCg=', 1, 'April 14, 2022', '11:41 am', 1, '01ca267e4b37499aba1d77293d88c499');

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE `postcomment` (
  `id` int(50) NOT NULL,
  `postId` int(50) NOT NULL,
  `comment` text NOT NULL,
  `usernames` varchar(200) NOT NULL,
  `open` int(1) NOT NULL DEFAULT 1,
  `notify` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`id`, `postId`, `comment`, `usernames`, `open`, `notify`) VALUES
(1, 3, '😇😇😇', '_parth_', 0, 0),
(2, 3, '👐', '_.i.m.h.a.r.d.i.k._d', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `postlike`
--

CREATE TABLE `postlike` (
  `id` int(50) UNSIGNED NOT NULL,
  `postId` int(50) NOT NULL,
  `likes` varchar(200) NOT NULL,
  `open` int(1) NOT NULL DEFAULT 1,
  `notify` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postlike`
--

INSERT INTO `postlike` (`id`, `postId`, `likes`, `open`, `notify`) VALUES
(4, 3, 'widespread_.p.h_', 0, 0),
(5, 2, 'widespread_.p.h_', 0, 0),
(8, 3, '_parth_', 0, 0),
(9, 2, '_parth_', 1, 0),
(30, 3, '_.i.m.h.a.r.d.i.k._d', 0, 0),
(31, 2, '_.i.m.h.a.r.d.i.k._d', 1, 1),
(32, 9, '_.i.m.h.a.r.d.i.k._d', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sendcheckbox`
--

CREATE TABLE `sendcheckbox` (
  `cid` int(50) NOT NULL,
  `checked` int(1) NOT NULL DEFAULT 1,
  `checkName` varchar(200) NOT NULL,
  `sendUser` varchar(200) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `dob` date NOT NULL,
  `wish` int(11) NOT NULL DEFAULT 0,
  `profileImg` varchar(200) NOT NULL,
  `otp` varchar(60) NOT NULL,
  `verify` int(1) NOT NULL,
  `otp_datetime` datetime NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `fullname`, `username`, `password`, `dob`, `wish`, `profileImg`, `otp`, `verify`, `otp_datetime`, `add_time`) VALUES
(4, 'vilam98518@bamibi.com', 'goti parth', '_parth_', 'cb53d67a5193ab2510bcff5da8cf0b2a', '2022-04-14', 0, '', 'f1290186a5d0b1ceab27f4e77c0c5d68', 1, '2022-04-11 19:32:11', '2022-04-11 19:32:08'),
(5, 'ziltohudre@vusra.com', 'widespread', 'widespread_.p.h_', '1f8d86dead8f5c5c31167c86c2338856', '2022-04-11', 0, '', 'f1290186a5d0b1ceab27f4e77c0c5d68', 1, '2022-04-11 19:37:59', '2022-04-11 19:37:56'),
(6, 'ratretifyi@vusra.com', 'Hardikd dholairy', '_.i.m.h.a.r.d.i.k._d', '9cf2e9937405bb7bbbca3475717e1dfa', '2022-04-23', 0, '519.jpg', 'f1290186a5d0b1ceab27f4e77c0c5d68', 1, '2022-04-11 19:39:47', '2022-04-11 19:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `userpost`
--

CREATE TABLE `userpost` (
  `id` int(100) NOT NULL,
  `usernames` varchar(200) NOT NULL,
  `posts` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `posttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpost`
--

INSERT INTO `userpost` (`id`, `usernames`, `posts`, `caption`, `posttime`) VALUES
(2, '_parth_', 'apple-memoji-update-headwear-masks-hairstyles-41649685775.png', '', '2022-04-11 16:02:55'),
(3, '_.i.m.h.a.r.d.i.k._d', 'm9tu4obwww7711649731246.png', 'this wallpaper is so beautiful.', '2022-04-12 04:40:46'),
(4, '_.i.m.h.a.r.d.i.k._d', 'Spiderman Far From Home suit1650726433.jpg', '', '2022-04-23 17:07:13'),
(5, '_.i.m.h.a.r.d.i.k._d', 'Spiderman wallpaper by amitverma786 - Download on ZEDGE™ _ 36971650726443.jpg', '', '2022-04-23 17:07:23'),
(6, '_.i.m.h.a.r.d.i.k._d', 'Spiderman Illustration 4k Wallpapers _ hdqwalls_com1650726453.jpg', '', '2022-04-23 17:07:33'),
(7, '_.i.m.h.a.r.d.i.k._d', 'Spiderman wallpaper by amitverma786 - Download on ZEDGE™ _ 36971650727550.jpg', '', '2022-04-23 17:25:50'),
(8, '_.i.m.h.a.r.d.i.k._d', '3d98b954-6501-481a-af23-c79f66aea3c11650727557.jpg', '', '2022-04-23 17:25:57'),
(9, '_.i.m.h.a.r.d.i.k._d', '3d98b954-6501-481a-af23-c79f66aea3c11650727564.jpg', '', '2022-04-23 17:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `userstroy`
--

CREATE TABLE `userstroy` (
  `sid` int(50) NOT NULL,
  `story` varchar(500) NOT NULL,
  `postStoryUsername` varchar(200) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstroy`
--

INSERT INTO `userstroy` (`sid`, `story`, `postStoryUsername`, `add_time`) VALUES
(5, '1650772906.jpg', '_.i.m.h.a.r.d.i.k._d', '2022-04-24 09:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `widespread_.p.h_followers`
--

CREATE TABLE `widespread_.p.h_followers` (
  `id` int(50) UNSIGNED NOT NULL,
  `followers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `widespread_.p.h_followers`
--

INSERT INTO `widespread_.p.h_followers` (`id`, `followers`) VALUES
(83, '_.i.m.h.a.r.d.i.k._d');

-- --------------------------------------------------------

--
-- Table structure for table `widespread_.p.h_following`
--

CREATE TABLE `widespread_.p.h_following` (
  `id` int(50) UNSIGNED NOT NULL,
  `following` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `widespread_.p.h_following`
--

INSERT INTO `widespread_.p.h_following` (`id`, `following`) VALUES
(19, '_.i.m.h.a.r.d.i.k._d'),
(20, '_parth_');

-- --------------------------------------------------------

--
-- Table structure for table `_.i.m.h.a.r.d.i.k._dfollowers`
--

CREATE TABLE `_.i.m.h.a.r.d.i.k._dfollowers` (
  `id` int(50) UNSIGNED NOT NULL,
  `followers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_.i.m.h.a.r.d.i.k._dfollowers`
--

INSERT INTO `_.i.m.h.a.r.d.i.k._dfollowers` (`id`, `followers`) VALUES
(10, 'widespread_.p.h_'),
(11, '_parth_');

-- --------------------------------------------------------

--
-- Table structure for table `_.i.m.h.a.r.d.i.k._dfollowing`
--

CREATE TABLE `_.i.m.h.a.r.d.i.k._dfollowing` (
  `id` int(50) UNSIGNED NOT NULL,
  `following` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_.i.m.h.a.r.d.i.k._dfollowing`
--

INSERT INTO `_.i.m.h.a.r.d.i.k._dfollowing` (`id`, `following`) VALUES
(161, 'widespread_.p.h_');

-- --------------------------------------------------------

--
-- Table structure for table `_parth_followers`
--

CREATE TABLE `_parth_followers` (
  `id` int(50) UNSIGNED NOT NULL,
  `followers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_parth_followers`
--

INSERT INTO `_parth_followers` (`id`, `followers`) VALUES
(44, 'widespread_.p.h_');

-- --------------------------------------------------------

--
-- Table structure for table `_parth_following`
--

CREATE TABLE `_parth_following` (
  `id` int(50) UNSIGNED NOT NULL,
  `following` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_parth_following`
--

INSERT INTO `_parth_following` (`id`, `following`) VALUES
(1, '_.i.m.h.a.r.d.i.k._d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postlike`
--
ALTER TABLE `postlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sendcheckbox`
--
ALTER TABLE `sendcheckbox`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `pass` (`password`),
  ADD KEY `role` (`verify`),
  ADD KEY `dob` (`dob`),
  ADD KEY `otp` (`otp`),
  ADD KEY `verify` (`verify`),
  ADD KEY `profileImg` (`profileImg`),
  ADD KEY `fullname` (`fullname`),
  ADD KEY `otp_datetime` (`otp_datetime`);

--
-- Indexes for table `userpost`
--
ALTER TABLE `userpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usernames` (`usernames`),
  ADD KEY `posts` (`posts`),
  ADD KEY `posttime` (`posttime`),
  ADD KEY `caption` (`caption`) USING BTREE;

--
-- Indexes for table `userstroy`
--
ALTER TABLE `userstroy`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `story` (`story`);

--
-- Indexes for table `widespread_.p.h_followers`
--
ALTER TABLE `widespread_.p.h_followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `followers` (`followers`);

--
-- Indexes for table `widespread_.p.h_following`
--
ALTER TABLE `widespread_.p.h_following`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following` (`following`);

--
-- Indexes for table `_.i.m.h.a.r.d.i.k._dfollowers`
--
ALTER TABLE `_.i.m.h.a.r.d.i.k._dfollowers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `followers` (`followers`);

--
-- Indexes for table `_.i.m.h.a.r.d.i.k._dfollowing`
--
ALTER TABLE `_.i.m.h.a.r.d.i.k._dfollowing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following` (`following`);

--
-- Indexes for table `_parth_followers`
--
ALTER TABLE `_parth_followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `followers` (`followers`);

--
-- Indexes for table `_parth_following`
--
ALTER TABLE `_parth_following`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following` (`following`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postlike`
--
ALTER TABLE `postlike`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sendcheckbox`
--
ALTER TABLE `sendcheckbox`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userstroy`
--
ALTER TABLE `userstroy`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `widespread_.p.h_followers`
--
ALTER TABLE `widespread_.p.h_followers`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `widespread_.p.h_following`
--
ALTER TABLE `widespread_.p.h_following`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `_.i.m.h.a.r.d.i.k._dfollowers`
--
ALTER TABLE `_.i.m.h.a.r.d.i.k._dfollowers`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `_.i.m.h.a.r.d.i.k._dfollowing`
--
ALTER TABLE `_.i.m.h.a.r.d.i.k._dfollowing`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `_parth_followers`
--
ALTER TABLE `_parth_followers`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `_parth_following`
--
ALTER TABLE `_parth_following`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
