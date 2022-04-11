-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 09:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12
CREATE database widespread;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
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
  `addTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `admin`
--
INSERT INTO `admin` (`id`, `username`, `password`, `email`, `addTime`)
VALUES (
    1,
    'admin',
    '21232f297a57a5a743894a0e4a801fc3',
    '30575beccd252e27bf0a1126bf5f5d5c',
    '2022-04-11 10:54:33'
  );
-- --------------------------------------------------------
--
-- Table structure for table `conversations`
--
CREATE TABLE `conversations` (
  `id` int(50) NOT NULL,
  `user_1` varchar(200) NOT NULL,
  `user_2` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `user`
--
INSERT INTO `user` (
    `id`,
    `email`,
    `fullname`,
    `username`,
    `password`,
    `dob`,
    `wish`,
    `profileImg`,
    `otp`,
    `verify`,
    `otp_datetime`,
    `add_time`
  )
VALUES (
    1,
    'widespreadmedia2@gmail.com',
    'widespread',
    'widespread_.p.h_',
    '1f8d86dead8f5c5c31167c86c2338856',
    '2022-04-11',
    0,
    '',
    'f1290186a5d0b1ceab27f4e77c0c5d68',
    1,
    '2022-04-11 10:33:20',
    '2022-04-11 10:33:16'
  );
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `userstroy`
--
CREATE TABLE `userstroy` (
  `sid` int(50) NOT NULL,
  `story` varchar(500) NOT NULL,
  `postStoryUsername` varchar(200) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `widespread_.p.h_followers`
--
CREATE TABLE `widespread_.p.h_followers` (
  `id` int(50) UNSIGNED NOT NULL,
  `followers` varchar(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `widespread_.p.h_following`
--
CREATE TABLE `widespread_.p.h_following` (
  `id` int(50) UNSIGNED NOT NULL,
  `following` varchar(200) NOT NULL,
  `openStory` varchar(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Indexes for dumped tables
--
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY (`id`);
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
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `msg_id` int(200) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postlike`
--
ALTER TABLE `postlike`
MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sendcheckbox`
--
ALTER TABLE `sendcheckbox`
MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userstroy`
--
ALTER TABLE `userstroy`
MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `widespread_.p.h_followers`
--
ALTER TABLE `widespread_.p.h_followers`
MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `widespread_.p.h_following`
--
ALTER TABLE `widespread_.p.h_following`
MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;