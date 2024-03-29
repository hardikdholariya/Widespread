-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 03:07 PM
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
  `addTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', '2022-04-10 15:07:37'),
(2, 'dk_9089', 'widespread_.p.h_', '2022-04-10 15:07:37'),
(3, '_.i.m.h.a.r.d.i.k._', '_parth_', '2022-04-05 19:37:42'),
(5, 'dk_9089', '_.i.m.h.a.r.d.i.k._', '2022-04-05 19:47:19'),
(6, 'widespread_.p.h_', '_parth_', '2022-04-06 15:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `dk_7364followers`
--

CREATE TABLE `dk_7364followers` (
  `id` int(50) UNSIGNED NOT NULL,
  `followers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dk_7364following`
--

CREATE TABLE `dk_7364following` (
  `id` int(50) UNSIGNED NOT NULL,
  `following` varchar(200) NOT NULL,
  `openStory` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', 'GbI=', 1, 'April 2, 2022', '10:16 am', 0, '4f1fe4827534b42cd4a37cbf31526a01'),
(2, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', 'FPs=', 1, 'April 2, 2022', '10:17 am', 0, '84a02860b87d4617342b36ef506ebce8'),
(3, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', '/qn7Dw==', 1, 'April 2, 2022', '10:22 am', 0, '18ce4c8ba33b33b20d629d960ef0be12'),
(4, 'dk_9089', 'widespread_.p.h_', 'vmNUnzeP', 1, 'April 2, 2022', '10:31 am', 1, 'd8503d21c7409f0add1c0f70e15d7c5d'),
(5, '_.i.m.h.a.r.d.i.k._', '_parth_', 'GCFfBA==', 1, 'April 2, 2022', '10:53 am', 0, '2adc4319ced27cc946cd96d581305b1d'),
(6, '_parth_', '_.i.m.h.a.r.d.i.k._', 'EYI=', 1, 'April 2, 2022', '11:18 am', 0, '026950108526b6301e1af5f413f4b217'),
(7, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', '7GA=', 1, 'April 4, 2022', '12:25 pm', 0, '40afc407a6754eb3e7232740032921bd'),
(8, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'bmgBjfTq', 1, 'April 4, 2022', '12:27 pm', 0, 'b54300e91206cbbef6b8dce2ae4f042e'),
(11, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'Q+a4', 1, 'April 4, 2022', '5:08 pm', 0, 'c05f511cf90e2c74cce21cd21008ce02'),
(12, '_.i.m.h.a.r.d.i.k._', '_.i.m.h.a.r.d.i.k._', 'Oj64aMtPESs=', 1, 'April 5, 2022', '10:31 am', 0, 'c8c1a83b28ae815c26f4079fde400c61'),
(13, '_.i.m.h.a.r.d.i.k._', '_.i.m.h.a.r.d.i.k._', 'N/8qa+njtxk=', 1, 'April 5, 2022', '10:31 am', 0, '4c51c5c01af71fbfa4dee9768506d831'),
(14, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', '799KUw==', 1, 'April 5, 2022', '5:32 pm', 0, '520ee99f4928fd6be55e5be656f5e7b7'),
(15, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'EWe3Jlxi8QM8Y/1CzidOdZDLF9TZL6/tEa9iA5TxzyYLIDWMcH9ioA==', 0, 'April 5, 2022', '5:54 pm', 1, 'fcc0f6a093a98094c15eb01106cad8cb'),
(16, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'yzKl2HvaqFio0EYxk0rLSoIWNErzbJQRuU7xZdMVkbOLGOwR4DWOYQ==', 0, 'April 5, 2022', '5:54 pm', 0, '62445002e7a31ef050738de43ca438e6'),
(17, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'W4w=', 1, 'April 5, 2022', '6:10 pm', 0, '1366a4e2b2659f506a2f4245ba3891d1'),
(18, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'xeQ=', 1, 'April 5, 2022', '6:11 pm', 0, '185ac10d7413b1364fb693878504d279'),
(19, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', 'SshUQ7RvsRrjKB+tcr325iAYbMjELj5joJsQ3U5qhddpZzYxRpZAEg==', 0, 'April 5, 2022', '6:41 pm', 0, '67dcfb0eb671753bea4abd1efbcc161d'),
(20, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'DccRmsNhXHHMQNeVlqCEWC9pNNeE4JyieEy+HLbL4rByBLpxtgnzGw==', 0, 'April 5, 2022', '6:44 pm', 0, '497d01a8c73a4612eef38207bb6f8f52'),
(21, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'Z3SNvL8Is/urlmubZ/xJbIdsdHraiHrX0aBDaDY7lvUrxRUg0NzTvg==', 0, 'April 5, 2022', '6:45 pm', 0, 'a7082df74a2edd32829bb0a29997fa79'),
(22, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'Q0I558QpoP+NK/GoE8iQjyB0i014oNLWct5W5WGUn/w8t/Phb8LqXg==', 0, 'April 5, 2022', '6:48 pm', 0, '3b445709f48ec9fde20c90d19d980141'),
(23, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'enVSpQyYVVvTWT+fGSzOldkWQcjykpn86mI9GZm/AsP6r9NmtSXX7Q==', 0, 'April 5, 2022', '6:48 pm', 0, 'd7eb90e3eeaae2a67e5874ca64e8976a'),
(24, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'l00PPdSE52V9C0HiiqXewy0sNAPgW9q0DfPYM2e8sSHE8SzeMKKBVg==', 0, 'April 5, 2022', '6:49 pm', 0, 'a3aa13db2b2961d4468bdda0d5177953'),
(25, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'YkMys0h/M7wMs3hnyBz88V2TSYo+4sk3OSQx2Mlgtw5iPOyNnF9pzA==', 0, 'April 5, 2022', '7:35 pm', 0, '135cdc0f854a56df80be18b0f04331fc'),
(26, '_parth_', '_.i.m.h.a.r.d.i.k._', 'ZnJEp2IgWf3GJJN5herawpLJOrj+DA738N8astZRECVk3tj7Fm/SDg==', 0, 'April 5, 2022', '7:35 pm', 0, '5d4764edaa2907e24e1060c4f0d60401'),
(27, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 's7XGIj1diLMMD9XQxOUwybE1+xPMLjCrRpw66nmbs5v78BYgaRI3/Q==', 0, 'April 5, 2022', '7:35 pm', 0, 'f4dd82c78e802f7ae139e886ad9fd4ba'),
(28, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'fEVyu2dhf/5DW7Onzntm5gEZuhVaje5JIn+CZRb8uZM5d+1rXz2c3A==', 0, 'April 5, 2022', '7:36 pm', 0, 'adf488c3ceeb2682d6e318ad624721ce'),
(29, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', '1sXwDgud73RviIZ8rYPfTxM1/jZMVG3ohrTWGeEWdzm9WSBnbK+khg==', 0, 'April 5, 2022', '7:36 pm', 0, '22a58fb8431b338d21d2db1f01d08b7f'),
(30, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'r34q9YLZKhHg+WR7/EAC7jfspyK2KtbgK1U5Iwz26QMuHVq187Spvw==', 0, 'April 5, 2022', '7:36 pm', 1, '1c26d0c9efb8da987b488dbb291ba4ef'),
(31, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', '7jxG2I5bjyD6da8K3BBkpRS6mvtG4qCSowTjnintuoy2sKjG+VyzUg==', 0, 'April 5, 2022', '7:36 pm', 0, 'ebae789799c5017b5412e1d026116937'),
(32, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'biZ/PO44PmCalRqLHGR+CZZY+/AaqCQk8eoh9ndT/J3QaAn+Q8YudQ==', 0, 'April 5, 2022', '7:36 pm', 1, '979bb7c9ae5fd161d384d5842000510d'),
(33, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'bV/xinoXFNEPjGfbw8+h/2hGFUBHiHUGR0xW8NEY5QkxAvBELV7DpQ==', 0, 'April 5, 2022', '7:36 pm', 0, '6848cc5d282f18b3a0cdb8cc0796c3da'),
(34, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'UYFjbT/c1sBLVziFNGlGtWHa9V346iNR2e1N88I7zOmqDBfByQY9Xw==', 0, 'April 5, 2022', '7:36 pm', 1, '387a0d5721b3ea8d95846beeef4b4d69'),
(35, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'UnS8FDBaWobWTs1eGh1JDmOEzZew207qvp/869l1KYAFbFs6WVR6bA==', 0, 'April 5, 2022', '7:36 pm', 0, '76b799fa3c26f97d19f7426e7338b1f7'),
(36, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'BBSZX1fjrJuvBMPkda6L0Ny+1+FzUrTwwcgVEo4sQvqO9S0H46cj3g==', 0, 'April 5, 2022', '7:36 pm', 1, '11c2cd6191a45128ba0a643925732cab'),
(37, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'ZfUnYbnZOMmcUNe8tzTy0rJ3LvGCKzfOGhDJQ0CFkfHyNtEgRmEfhA==', 0, 'April 5, 2022', '7:36 pm', 0, 'cfbbf478ad3433674c066d313e8fb93a'),
(38, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'kre10ekoVeUgAPR5q96x6PmGW1+TB5PlhFOoIRPU0PwMJ7KK1eTu/w==', 0, 'April 5, 2022', '7:36 pm', 1, '33c2872184ee5105360be83ef4df98fa'),
(39, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', '+06Aw1DeD474vBG7d07KkM/Xp1YGmm4oEcoVRwKkncz6wvS1uNOC1A==', 0, 'April 5, 2022', '7:36 pm', 0, 'fa828b736c9758ff60216b9697400572'),
(40, 'dk_9089', '_.i.m.h.a.r.d.i.k._', '11v49J95lmX6kPqu47VBWfv4YVXCZRy1IPkhHJqg/Dr8sbTG4CbnJQ==', 0, 'April 5, 2022', '7:36 pm', 1, '6da2c4da0704e718d09295cfebf528db'),
(41, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'PSTyXpJcY0mIzJbuh0XNfYUzSK8LKkrTW2TpjxpS4bNIOx4N9t8X0A==', 0, 'April 5, 2022', '7:36 pm', 0, 'e928aa4152636a19ae88be9732a9410f'),
(42, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'Ut1uCAmcPy3AgWa96r9y3IEDiK6yZ9vc8OM4+D/cY9Ql71NUZaaiuA==', 0, 'April 5, 2022', '7:36 pm', 1, '5cb35c8f5862e389c86446ee2ae99834'),
(43, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'GXgpqYCwSeJoOUlFVWl6pWvV9M85W3mzzly0hyRR2Cu7CkPYLi9XWg==', 0, 'April 5, 2022', '7:36 pm', 0, '3ce1c7d4a5d9bcbf1b10982606e59fe5'),
(44, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'sXfzGStsL9L5bQd2p6TG5n0wXP1XD9LgyUxl9Xijf7BryAEUmAzNbA==', 0, 'April 5, 2022', '7:36 pm', 1, '85236bab9941e5f6c2852bbb1b277f74'),
(45, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'JecwGwVBBKusHZfjKk9MfH5usZujYFrVSb4Qmq7b75Ifyu/0jpDvWQ==', 0, 'April 5, 2022', '7:36 pm', 0, 'fc6d3fce37f84f2cfccd3e2ccf5ee38e'),
(46, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'Ptw4pp8G03dElImnHvNZChIwQPbUFXUX43fnN5kWC4qRF0zqYSD4dA==', 0, 'April 5, 2022', '7:36 pm', 1, 'af63535f19a05099bbad658a19f2f89e'),
(47, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'QX5AcqciUbFEf+sfv3V3X/g/OPZVSgag5QGhKbhAoriNxxNKHR5dpA==', 0, 'April 5, 2022', '7:36 pm', 0, 'a59baf31882bd16a93f213f941bf6a08'),
(48, 'dk_9089', '_.i.m.h.a.r.d.i.k._', '8O5GyCURE5iYYf3dwY2AehggVzbo3K9BpSiSWzME3hKBos/VSIOhtw==', 0, 'April 5, 2022', '7:36 pm', 1, 'f93b9f4cc6a15a0d3965f5ff635424f3'),
(49, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'utFEOI1jfC65vdpX4NlWvamETy3XMYYPjNAmjRPFRdmkp0NGYwfD3Q==', 0, 'April 5, 2022', '7:36 pm', 0, 'cec8050baf961fead76c7909e7c04a24'),
(50, 'dk_9089', '_.i.m.h.a.r.d.i.k._', '7cj/9s2m6UewcDz6l1mocjfjborWJ3w0wyg6RjfZmqZmScejbkUzVQ==', 0, 'April 5, 2022', '7:36 pm', 1, 'ad021effe24e7bbe03627bb0af384231'),
(51, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'AVfD0aYsMX4duqaYOTKlz8ZkXmCLVTmoUK4Ufb5AtP8TFhzE7HUzDQ==', 0, 'April 5, 2022', '7:37 pm', 0, '8e4a561b639c21702f1c11050f946a75'),
(52, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'BkXLvucO+RRGzre2jRtAEG+317GGaC1TJv5jLeCe6emlxqvbS4bgUA==', 0, 'April 5, 2022', '7:37 pm', 0, '85bde25d6a1144c039716d45efedc24a'),
(53, '_parth_', '_.i.m.h.a.r.d.i.k._', 'Yq58+UnuJJ6mMKd9qwoSfxKkVs4omExfL2alYh9K0u+GZanXlY0Jsw==', 0, 'April 5, 2022', '7:37 pm', 0, '4023b0a042f2340e827839cfeb6fff1c'),
(54, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'yZBYLUuNFoMq7UmsMoiWojxAlYY1nLBNDOFHLHrFi1/fQW0KJ+gCgg==', 0, 'April 5, 2022', '7:37 pm', 0, '57e2f25c5ff8d6ad832cdb721d78a3c1'),
(55, '_parth_', '_.i.m.h.a.r.d.i.k._', 'sdlxWsRJtgg3z6O+D0TMel3LPnOBB57IHM0qWDwnMUVDOkixOw8xbg==', 0, 'April 5, 2022', '7:37 pm', 0, 'fa72d9b07df97654dfd8ce6e3b9b6697'),
(56, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'uLWfZpBxpDUpUfT/GtTdUXRdlFEx1YhFz/Vn2QY8JSfP8PB2eTQCPw==', 0, 'April 5, 2022', '7:37 pm', 0, '7068a226818cf1e9239267a5517171cd'),
(57, '_parth_', '_.i.m.h.a.r.d.i.k._', 'EDPOdE+LGaca7UFjEmH0hfHpJrE6ID/dVwP3cVSshdRG0eEwflixVw==', 0, 'April 5, 2022', '7:37 pm', 0, '8bba8ac59652f7b398c43fda394b2a0e'),
(58, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'ODK5akHBJ1QP+Yf560aIOK0sfhWzyMaw/vfcbxygWj4tOZvuI2ePAA==', 0, 'April 5, 2022', '7:38 pm', 1, 'e9b63c6a2d74a9298744340d598c0293'),
(59, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'Lwts8UMyfkIGE9JM8db9hCFI4j+shP2O3iumYiB8yr66JU1DOFLwkw==', 0, 'April 5, 2022', '7:39 pm', 0, 'ed568890a3e073a8a304e315f377bed1'),
(60, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'WEuIRiiH1WCYQ6HA+LjhZsv7LaE/Ebk3S/r7ONgxofcJN+e6orn7dQ==', 0, 'April 5, 2022', '7:39 pm', 1, '379915f41987c4dfcdefdd20143d3dd2'),
(61, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'teRCVtDdk0tac9SPqddJPgV5DX3mRgUw9TPtO0lKeKcznTXRHsrStg==', 0, 'April 5, 2022', '7:39 pm', 0, 'f3f7fae77c0a60b3950f492e0c60b62e'),
(62, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'TFpm24wtQUBw+glz9B/OUML75UR8Jwa5b58llUYFWy+49V39oGOA2g==', 0, 'April 5, 2022', '7:39 pm', 1, '33c37408c35a400ad6a7c8ce3b76c56c'),
(63, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'dPf7sXmQuCMnAKwVIk+48nD5adPboZI6o7c5+TpQSqUFvlEyGtH15A==', 0, 'April 5, 2022', '7:40 pm', 0, '96bb3770179e4ec56ef33d3c8daaf9c6'),
(64, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'B9SvBX754Fj+/jDDJzLu37J7vb/nmeKF0DxIynmhYw1rtuL0V7nbsw==', 0, 'April 5, 2022', '7:40 pm', 1, '2a2b0fd9ea11965e0de1655e24c7ae3b'),
(65, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'VrvbX6DFqLTmTSqdOgJ0LhsdvNLOfDCVFLu2yLOgoEp+jf1Vd8yuyQ==', 0, 'April 5, 2022', '7:40 pm', 0, '7f9045c35d343575fe167fca18337fc4'),
(66, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'aykWYl+6nt4vJXHSVcvmjbDErykJ/H26W58q20f0cvoqy54/mUz7uw==', 0, 'April 5, 2022', '7:44 pm', 0, 'b3ad39fbbb69712b431d3ff02cf9391f'),
(67, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'EfdsPtL5DGW3JQEmqybEWPVlmPft7XE2HeFq1euIJljQgSy6MTNp8g==', 0, 'April 5, 2022', '7:44 pm', 1, '8253ebf0ce8210faeb61907e99cc0124'),
(68, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', '2cyy2FeuLuiFmxDVac+LEz5AeS/DVuGMT3Br+o+G6bT086IphvPiUg==', 0, 'April 5, 2022', '7:44 pm', 0, '5cd2b1be200bfa4d02da225884dfca2f'),
(69, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'S8YzzWyYSIunT4g9EF8hEhYNnJIHVSOmyZdz0Y6NrnM+zhBMFPSzUA==', 0, 'April 5, 2022', '7:44 pm', 1, '814c80e765181aa8d1464fc99818e454'),
(70, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', '5Xeth/cSo5P0PMsHDS9NKrZkyDJPLPmO5dR5oe5huLdYOHdRmcfwVA==', 0, 'April 5, 2022', '7:45 pm', 0, '1639892e21e101dfc24776a4fb48e2ec'),
(71, 'dk_9089', '_.i.m.h.a.r.d.i.k._', '8fmJ0la4Myzfo8FNYDLzp9NKQnUtTa1w8LXEpUmOWBpickrzVI3dDw==', 0, 'April 5, 2022', '7:45 pm', 1, '2b68673ef217448c4512b930c780ead0'),
(72, 'widespread_.p.h_', '_.i.m.h.a.r.d.i.k._', 'KfKqIvA6k71irEr6gCPXlOGjuX18XxG+tGRWUgYoZJYtt4MmHfk+jg==', 0, 'April 5, 2022', '7:45 pm', 0, '37744a6957baace9b485e89099c80c73'),
(73, 'dk_9089', '_.i.m.h.a.r.d.i.k._', '0fwG8biei0z/CdQmWiLaRLqEqivYqD2givZeVwV5g4jDBZ6v1fs/3Q==', 0, 'April 5, 2022', '7:45 pm', 1, 'e191bca256466daacfe2485be84580b8'),
(74, 'dk_9089', '_.i.m.h.a.r.d.i.k._', 'UcG1FRvD5w2zDjgqmuT+s5xqQch4StHf0QcTB2bHDj9iCGhsGA==', 0, 'April 5, 2022', '7:47 pm', 1, 'e3e4fd7d139d442f5d6343c827218311'),
(75, 'widespread_.p.h_', '_parth_', '9sVabE1EAl+gmRYOvdtvNictF0a7jdWyPesVuQEox7rCnv4mUBAHlQ==', 0, 'April 6, 2022', '3:01 pm', 0, '946f769015ac0f9cf5073ecd0f1215dd'),
(76, '_.i.m.h.a.r.d.i.k._', 'widespread_.p.h_', 'TsqsLQc+dS/E9buURKDtqK7pA0EcvnXHKipn9A==', 0, 'April 10, 2022', '3:07 pm', 1, 'b252fe67b845e3858fa8bc4c7d35feb1'),
(77, 'dk_9089', 'widespread_.p.h_', 'ii/KV2IPYR3DW3g6UCkgaqPcnO0X8MPU8Wrv7Q==', 0, 'April 10, 2022', '3:07 pm', 1, '9ca5a85b040ec15bfbad3ca8202ef5ec');

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
(6, 24, '🤩🤩', 'widespread_.p.h_', 0, 0),
(10, 8, '🤩', 'widespread_.p.h_', 0, 0);

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
(17, 30, 'widespread_.p.h_', 0, 0),
(24, 11, 'widespread_.p.h_', 0, 0),
(26, 8, 'widespread_.p.h_', 0, 0),
(56, 24, 'widespread_.p.h_', 0, 0),
(58, 10, 'widespread_.p.h_', 0, 0),
(59, 16, 'widespread_.p.h_', 0, 0),
(62, 17, 'widespread_.p.h_', 0, 0),
(64, 13, 'widespread_.p.h_', 0, 0),
(65, 22, 'widespread_.p.h_', 0, 0),
(72, 25, 'widespread_.p.h_', 0, 0),
(73, 32, 'widespread_.p.h_', 1, 1),
(74, 12, 'widespread_.p.h_', 0, 0),
(75, 1, 'widespread_.p.h_', 1, 0),
(76, 32, 'kd_9825590', 1, 1),
(77, 10, 'kd_9825590', 0, 0),
(78, 17, 'kd_9825590', 0, 0),
(79, 12, 'kd_9825590', 0, 0),
(80, 22, 'kd_9825590', 0, 0),
(81, 8, 'kd_9825590', 0, 0),
(82, 16, 'kd_9825590', 0, 0),
(83, 11, 'kd_9825590', 0, 0),
(84, 18, 'kd_9825590', 0, 0),
(85, 13, 'kd_9825590', 1, 1),
(86, 13, 'kd_9825590', 1, 1),
(93, 3, 'widespread_.p.h_', 1, 1),
(94, 2, 'widespread_.p.h_', 1, 1),
(95, 18, 'widespread_.p.h_', 1, 0);

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
  `profileImg` varchar(200) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `verify` int(1) NOT NULL,
  `otp_datetime` datetime NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `fullname`, `username`, `password`, `dob`, `profileImg`, `otp`, `verify`, `otp_datetime`, `add_time`) VALUES
(17, 'widespreadmedia2@gmail.com', 'widespread', 'widespread_.p.h_', '1f8d86dead8f5c5c31167c86c2338856', '2022-02-19', '996.png', 'w', 1, '2022-04-10 09:24:51', '2022-04-09 00:00:00'),
(38, 'mabibi4572@royins.com', 'dkkdl', 'dk_7364', '819453ba50d4fe52b1807449342dacb3', '2022-04-19', '', 'w', 1, '2022-04-10 17:42:27', '2022-04-10 17:38:36');

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
(8, 'widespread_.p.h_', 'apple-memoji-update-headwear-masks-hairstyles-41646310919.png', '', '0000-00-00 00:00:00'),
(10, 'widespread_.p.h_', 'password1646310996.png', '', '0000-00-00 00:00:00'),
(11, 'widespread_.p.h_', 'ios-15-stock-dark-mode-ipados-15-wwdc-21-hdr-5120x2880-55861646312964.jpg', '', '0000-00-00 00:00:00'),
(12, 'widespread_.p.h_', 'glass theme1646411803.png', '', '0000-00-00 00:00:00'),
(16, 'widespread_.p.h_', 'Group 41646467620.ico', '', '0000-00-00 00:00:00'),
(17, 'widespread_.p.h_', 'kd1646467805.png', '', '0000-00-00 00:00:00'),
(18, 'widespread_.p.h_', 'kd1646468037.png', '', '0000-00-00 00:00:00'),
(22, 'widespread_.p.h_', 'apple-memoji-update-headwear-masks-hairstyles-41647005452.png', '', '0000-00-00 00:00:00');

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
(28, '1649514844.png', 'widespread_.p.h_', '2022-04-09 20:04:04'),
(29, '1649515018.png', 'widespread_.p.h_', '2022-04-09 20:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `widespread_.p.h_followers`
--

CREATE TABLE `widespread_.p.h_followers` (
  `id` int(200) NOT NULL,
  `followers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `widespread_.p.h_following`
--

CREATE TABLE `widespread_.p.h_following` (
  `id` int(200) NOT NULL,
  `following` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `widespread_.p.h_following`
--

INSERT INTO `widespread_.p.h_following` (`id`, `following`) VALUES
(151, 'kd_9825590');

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
-- Indexes for table `dk_7364followers`
--
ALTER TABLE `dk_7364followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `followers` (`followers`);

--
-- Indexes for table `dk_7364following`
--
ALTER TABLE `dk_7364following`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following` (`following`);

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
  ADD UNIQUE KEY `followers_2` (`followers`),
  ADD KEY `followers` (`followers`);

--
-- Indexes for table `widespread_.p.h_following`
--
ALTER TABLE `widespread_.p.h_following`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following_2` (`following`),
  ADD KEY `following` (`following`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dk_7364followers`
--
ALTER TABLE `dk_7364followers`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dk_7364following`
--
ALTER TABLE `dk_7364following`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `postlike`
--
ALTER TABLE `postlike`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `sendcheckbox`
--
ALTER TABLE `sendcheckbox`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `userstroy`
--
ALTER TABLE `userstroy`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `widespread_.p.h_followers`
--
ALTER TABLE `widespread_.p.h_followers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `widespread_.p.h_following`
--
ALTER TABLE `widespread_.p.h_following`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
