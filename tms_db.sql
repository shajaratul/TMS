-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 09:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `duration` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `tour` int(11) NOT NULL,
  `rentcar` int(11) NOT NULL,
  `rentbike` int(11) NOT NULL,
  `rentswimgear` int(11) NOT NULL,
  `rentboat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `requests` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packageid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `bookingid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `placeid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`placeid`, `name`, `division`) VALUES
(1, 'Cox\'s Bazar', 'Chittagong'),
(3, 'Rangamati', 'Chittagong'),
(4, 'Habiganj', 'Sylhet'),
(5, 'Moulovibazar', 'Sylhet'),
(6, 'Sreemangal', 'Sylhet'),
(7, 'Rajshahi', 'Rajshahi'),
(8, 'Rangpur', 'Rangpur');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomid` int(11) NOT NULL,
  `placeid` int(11) NOT NULL,
  `bookingid` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `host` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `details` text,
  `capacity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `placeid`, `bookingid`, `name`, `host`, `description`, `details`, `capacity`, `price`) VALUES
(1, 1, NULL, 'Standard', 'Ocean Paradise Hotel & Resort', 'Size\r\n265 sq.ft\r\n\r\nBeds\r\nKing or Twin Size', 'Room Features:\r\n\r\nAir Conditioning\r\nFire Sprinklers \r\nLCD TV \r\nBroadband internet \r\nPersonal safe \r\nWeight scale \r\nMinibar\r\nElectric kettle \r\nToilet telephone \r\nWriting table \r\nShaver point\r\nHairdryer \r\nSlippers', 2, 6325),
(2, 1, NULL, 'Standard with Balcony', 'Ocean Paradise Hotel & Resort', 'Size\r\n315 sq.ft\r\n\r\nBeds\r\nKing or Twin Size', 'Room Features:\r\n\r\nAir Conditioning\r\nFire Sprinklers \r\nLCD TV \r\nBroadband internet \r\nPersonal safe \r\nWeight scale \r\nMinibar\r\nElectric kettle \r\nToilet telephone \r\nWriting table \r\nShaver point\r\nHairdryer \r\nSlippers', 2, 6640),
(3, 1, NULL, 'Deluxe Suite - Sea View', 'Ocean Paradise Hotel & Resort', 'Size\r\n265 sq.ft\r\n\r\nBeds\r\nKing or Twin Size', 'Our Deluxe Sea View Rooms are furnished in contemporary style with clean lines and elegant colors, adorned with modern amenities. They offer the surroundings for a truly relaxing seaside getaway. While the soothing modern interiors of the rooms tempt you to relax inside, Cox\'s Bazar adventures await just outside your door. Retreat to an enchanting tropical paradise.\r\n\r\nRoom Features\r\nAir Conditioning\r\nLCD TV \r\nBroadband internet \r\nPersonal safe \r\nWeight scale \r\nMinibar\r\nToilet telephone \r\nWriting table \r\nShaver point\r\nHairdryer', 2, 6640),
(4, 1, NULL, 'Deluxe Suite - Sea View with Balcony', 'Ocean Paradise Hotel & Resort', 'Size\r\n315 sq.ft\r\n\r\nBeds\r\nKing or Twin Size', 'Your sea-view private balcony is perfect for watching the sun dip into the clear waters of the Bay of Bengal at the end of the day. These rooms are the ideal accommodation to make your Cox\'s Bazar vacation absolutely enchanting.\r\n\r\nRoom Features:\r\n\r\nAir Conditioning\r\nLCD TV \r\nBroadband internet \r\nPersonal safe \r\nWeight scale \r\nMinibar\r\nToilet telephone \r\nWriting table \r\nShaver point\r\nHairdryer', 2, 7115),
(5, 1, NULL, 'Superior Deluxe - Sea View with Balcony', 'Ocean Paradise Hotel & Resort', 'Size\r\n390 sq.ft\r\n\r\nBeds\r\nKing or Twin Size', 'Cheerfully bright and full of sunshine, our charming Superior Rooms feature private balconies with stunning views to greet you each morning. Relax after a long day at the beach by watching satellite TV, or by taking a nap on your wonderfully soft king-sized bed.\r\n\r\nRoom Features:\r\n\r\nAir Conditioning\r\nFire Sprinklers\r\nLCD TV \r\nBroadband internet \r\nPersonal safe \r\nWeight scale \r\nMinibar\r\nToilet telephone \r\nWriting table \r\nShaver point\r\nHairdryer\r\nBathtubs\r\nSlippers', 2, 7906),
(6, 1, NULL, 'Superior Deluxe - Mountain View', 'Ocean Paradise Hotel & Resort', 'Size\r\n420 sq.ft \r\n\r\nBeds\r\nKing or Twin Size', 'The green hills beckon you as you look out your window. You watch hikers climb up to the Buddhist monasteries on the hilltop, and you see holidaymakers laze on the sun beds by the delightfully landscaped pool area, sipping cocktails as their kids frolic in the baby pool.\r\n\r\nRoom Features:\r\n\r\nAir Conditioning\r\nFire Sprinklers\r\nLCD TV \r\nBroadband internet \r\nPersonal safe \r\nWeight scale \r\nMinibar\r\nToilet telephone \r\nWriting table \r\nShaver point\r\nHairdryer\r\nBathtubs\r\nSlippers', 2, 6957);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL,
  `response` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(14) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingid`),
  ADD UNIQUE KEY `bookingid` (`bookingid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packageid`),
  ADD UNIQUE KEY `packageid` (`packageid`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`placeid`),
  ADD UNIQUE KEY `placeid` (`placeid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomid`),
  ADD UNIQUE KEY `roomid` (`roomid`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketid`),
  ADD UNIQUE KEY `ticketid` (`ticketid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packageid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `placeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
