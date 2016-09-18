-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 01:05 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `consumerID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `status` varchar(9) NOT NULL DEFAULT 'requested',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `consumerID`, `propertyID`, `status`, `startDate`, `endDate`, `period`) VALUES
(1414, 1111, 1212, 'requested', '2016-02-03', '2016-02-10', 7),
(2525, 2222, 2323, 'requested', '2016-02-06', '2016-02-13', 7),
(3636, 3343, 3434, 'rejected', '2016-02-01', '2016-02-08', 7),
(5642, 1111, 3434, 'Confirmed', '2016-03-25', '2016-04-01', 7),
(6664, 3340, 1212, 'requested', '2016-03-02', '2016-03-09', 7),
(6666, 3340, 2323, 'requested', '2016-03-17', '2016-03-24', 7),
(6669, 1111, 5343, 'rejected', '2016-08-01', '2016-08-08', 7),
(6671, 3343, 1212, 'requested', '2016-03-23', '2016-03-30', 7),
(6673, 3343, 2323, 'Requested', '2016-06-01', '2016-06-08', 7),
(6674, 1111, 5343, 'confirmed', '2016-04-06', '2016-04-13', 7),
(6675, 2222, 5344, 'rejected', '2016-05-10', '2016-05-17', 7),
(6676, 3343, 2323, 'Requested', '2016-08-01', '2016-08-08', 7);

-- --------------------------------------------------------

--
-- Table structure for table `city_districts`
--

CREATE TABLE `city_districts` (
  `districtName` varchar(20) NOT NULL,
  `numOfPOI` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `districtID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_districts`
--

INSERT INTO `city_districts` (`districtName`, `numOfPOI`, `city`, `districtID`) VALUES
('Toronto', 45, 'usmanopolis', 1313),
('Kingston', 5, 'geobing', 2424),
('Ottawa', 100, 'jessville', 3535);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `sharedBathroom` tinyint(1) NOT NULL DEFAULT '0',
  `privateBathroom` tinyint(1) NOT NULL DEFAULT '0',
  `close_to_subway` tinyint(1) NOT NULL DEFAULT '0',
  `close_to_bus` tinyint(1) NOT NULL DEFAULT '0',
  `pool` tinyint(1) NOT NULL DEFAULT '0',
  `full_kitchen` tinyint(1) NOT NULL DEFAULT '0',
  `laundry` tinyint(1) NOT NULL DEFAULT '0',
  `other` tinyint(1) NOT NULL DEFAULT '0',
  `propertyID` int(11) NOT NULL,
  `heating` tinyint(1) NOT NULL DEFAULT '0',
  `Airconditioning` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`sharedBathroom`, `privateBathroom`, `close_to_subway`, `close_to_bus`, `pool`, `full_kitchen`, `laundry`, `other`, `propertyID`, `heating`, `Airconditioning`) VALUES
(0, 1, 0, 0, 1, 0, 1, 0, 1212, 0, 1),
(1, 0, 0, 1, 0, 1, 0, 1, 2323, 1, 0),
(1, 1, 1, 0, 0, 1, 1, 1, 3434, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `points_of_interest`
--

CREATE TABLE `points_of_interest` (
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `details` varchar(100) NOT NULL,
  `isPending` tinyint(1) NOT NULL DEFAULT '1',
  `poiID` int(11) NOT NULL,
  `districtID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points_of_interest`
--

INSERT INTO `points_of_interest` (`name`, `address`, `details`, `isPending`, `poiID`, `districtID`) VALUES
('CN Tower', 'linton street', 'very good place. 10 stars.', 1, 1, 1313),
('Niagra Falls', 'ontario street', 'worst place ever. -10 stars', 0, 2, 2424),
('Wonderland', 'brock street', 'meh !! 5 stars', 0, 3, 3535),
('Disneyland', '44 linton street', 'fun park', 1, 4, 2424);

-- --------------------------------------------------------

--
-- Table structure for table `qbnb`
--

CREATE TABLE `qbnb` (
  `dataIndex` int(11) NOT NULL,
  `Authen_Key` varchar(15) NOT NULL DEFAULT 'xoxoxo',
  `numMembers` int(11) NOT NULL DEFAULT '0',
  `numAccomodations` int(11) NOT NULL DEFAULT '0',
  `numBookingsMade` int(11) NOT NULL DEFAULT '0',
  `numAdmins` int(11) NOT NULL DEFAULT '0',
  `numCities` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qbnb`
--

INSERT INTO `qbnb` (`dataIndex`, `Authen_Key`, `numMembers`, `numAccomodations`, `numBookingsMade`, `numAdmins`, `numCities`) VALUES
(1, 'xoxoxo', 12, 5, 6, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rental_properties`
--

CREATE TABLE `rental_properties` (
  `propertyID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `features` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `districtID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_properties`
--

INSERT INTO `rental_properties` (`propertyID`, `supplierID`, `address`, `type`, `features`, `price`, `districtID`) VALUES
(1212, 1111, 'brock street', '2 bedroom', 'private washroom', 4000, 1313),
(2323, 2222, 'ontario street', '1 bedroom', 'none', 100, 2424),
(3434, 3333, 'linton street', 'penthouse', 'Internet incl.', 8000, 3535),
(5343, 3343, '250 Bantry', '2 bedroom', 'Air Conditioning', 640, 2424),
(5344, 3343, '343 Yahoo', '1 Bedroom', 'pool', 123, 2424),
(5345, 1111, '6782', '1 bedroom', 'private washroom', 250, 2424);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `replierID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `commentText` varchar(500) NOT NULL,
  `bookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`replierID`, `date`, `time`, `commentText`, `bookingID`) VALUES
(1111, '2016-02-23', '08:29:36', 'meh', 1414),
(2222, '2016-02-05', '09:00:00', 'very bad', 2525),
(3333, '2016-02-01', '04:00:00', 'very very very very nice', 3636);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `bookingID` int(11) NOT NULL,
  `consumerID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `commentText` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`bookingID`, `consumerID`, `propertyID`, `rating`, `commentText`, `date`, `time`) VALUES
(0, 1111, 5343, 0, 'cryyyyyyyy', '0000-00-00', '00:00:00'),
(3636, 1111, 3434, 0, 'Enter text here...111', '0000-00-00', '00:00:00'),
(3636, 3333, 3434, 3, 'flsaiyfniuhwevabkrc', '2016-02-01', '06:00:00'),
(0, 3343, 5343, 0, 'Glad you enjoyed your stay', '0000-00-00', '00:00:00'),
(3636, 1111, 3434, 5, 'hello world', '0000-00-00', '00:00:00'),
(3636, 3343, 3434, 4, 'I liked how it was in the middle of the city', '0000-00-00', '00:00:00'),
(0, 3343, 5343, 0, 'It is a really good place for stay..', '0000-00-00', '00:00:00'),
(2525, 2222, 2323, 4, 'MMCMNVMXCBVBDIFSHB', '2016-02-17', '02:00:00'),
(3636, 3343, 3434, 5, 'nice', '0000-00-00', '00:00:00'),
(3636, 2222, 3434, 0, 'nice nice', '0000-00-00', '00:00:00'),
(0, 3343, 5343, 0, 'nice place', '0000-00-00', '00:00:00'),
(1414, 1111, 1212, 5, 'sdfkjdalinwefayrdYTREKNUACWGOOWQR6FGBI', '2016-02-25', '23:00:00'),
(0, 2222, 5343, 0, 'sniff', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_member`
--

CREATE TABLE `service_member` (
  `id` int(11) NOT NULL,
  `fName` varchar(15) NOT NULL,
  `mName` varchar(15) DEFAULT NULL,
  `lName` varchar(15) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `membershipStatus` tinyint(1) NOT NULL DEFAULT '1',
  `faculty` varchar(20) NOT NULL,
  `degreeType` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_member`
--

INSERT INTO `service_member` (`id`, `fName`, `mName`, `lName`, `phoneNumber`, `email`, `membershipStatus`, `faculty`, `degreeType`, `year`, `username`, `password`, `isAdmin`) VALUES
(1111, 'Muhammad', 'Usman', 'Majeed', 1231232343, 'usman@gmail.com', 1, 'Engineering', 'Phd', 2009, 'usman', 'usmanPassword', 1),
(2222, 'Geoffrey', '', 'Sun', 345345345, 'sun@gmail.com', 0, 'Art&Science', 'Bsc', 2000, 'sun', 'asddsaasd', 1),
(3333, 'Jessica', '', 'Nahulan', 454545455, 'jess@gmail.com', 1, 'CompSci', 'Phd', 2011, 'jess', 'rtyeytuew', 1),
(3336, 'Denny', 'is', 'Das', 22222222, 'pleaseSalt@queensu.c', 1, 'Twerk', 'Bsc', 2000, 'pleaseWork', 'work', 0),
(3337, 'Josy', 'Plea', 'way', 444444, 'j@queensu.ca', 1, 'Engineering', 'Phd', 1999, 'blabla', 'f46b4b7f69f0cab9f8ac3027b25510', 0),
(3338, 'hash', 'please', 'just', 44444, 'work@now.com', 1, 'Nursing', 'Bsc', 1994, 'ok', '$2y$10$QHBL5TgvnNLpJLCrFJyUWuq', 0),
(3339, 'test', 'test', 'test', 22222, 'test@test.com', 1, 'worked', 'test', 2222, 'test', '$2y$10$bk1zCJOU5Ps1hYOPbvWDqOXvdo7QINc9o4jOZXY7OdK2VGqfVDa/.', 1),
(3340, 'Henry', 'Smith', 'Jordan', 2147483647, 'HSJ@queensu.ca', 0, 'Engineering', 'Bsc', 1993, 'fo', '$2y$10$CMUOCJ4ZlB3Fh7PHXapNAe7jzDuPdkYiv2NA8Q4sIrjVGvMonDGuK', 1),
(3341, 'Jennifer', 'Tanya', 'Lee', 3424222, 'yolo@yolo.com', 1, 'Nursing', 'Phd', 1834, 'yolo', '$2y$10$Sw9tsiyNz5RaPdCHyv8EXOVNRHzVjdzWE32ds.ahlPmmAwH08f8f6', 0),
(3342, 'Muhammad', 'Geoffrey', 'Nahulan', 77877777, 'yaidgsg@queensu.ca', 1, 'Engineering', 'bsc', 2017, 'dothething', '$2y$10$DafMrctSeVQRJbjyhKO6mOZWlgs1.OqFVYHQWb0Eb9IsMMP7Nyqkm', 0),
(3343, 'Leona', 'Bot', 'Lane', 99999, 'LeoShin@queensu.ca', 1, 'Arts', 'BSC', 1986, 'support', '$2y$10$OugUptierXrmHvxzv3VjCevUcqXxvB5lzcvCAqLfeorVJlgKWoJIK', 1),
(3344, 'Joshua', 'Tanya', 'Levingston', 9928291, 'Josh@queensu.ca', 1, 'Compsci', 'Phd', 1983, 'josh', '$2y$10$RJasY.nWHtZklZfZ3rmhheTqvBWVyFxBFTZ0SvbbzKOnvjaafBc2m', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID_4` (`bookingID`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `bookingID` (`bookingID`),
  ADD KEY `bookingID_2` (`bookingID`,`propertyID`),
  ADD KEY `bookingID_3` (`bookingID`),
  ADD KEY `bookingID_5` (`bookingID`);

--
-- Indexes for table `city_districts`
--
ALTER TABLE `city_districts`
  ADD PRIMARY KEY (`districtID`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`propertyID`);

--
-- Indexes for table `points_of_interest`
--
ALTER TABLE `points_of_interest`
  ADD PRIMARY KEY (`poiID`),
  ADD KEY `districtID` (`districtID`);

--
-- Indexes for table `qbnb`
--
ALTER TABLE `qbnb`
  ADD PRIMARY KEY (`dataIndex`);

--
-- Indexes for table `rental_properties`
--
ALTER TABLE `rental_properties`
  ADD PRIMARY KEY (`propertyID`),
  ADD KEY `supplierID` (`supplierID`,`districtID`),
  ADD KEY `rental_district_dis` (`districtID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`replierID`,`date`,`time`),
  ADD KEY `replierID` (`replierID`),
  ADD KEY `replierID_2` (`replierID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`commentText`);

--
-- Indexes for table `service_member`
--
ALTER TABLE `service_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6677;
--
-- AUTO_INCREMENT for table `city_districts`
--
ALTER TABLE `city_districts`
  MODIFY `districtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3536;
--
-- AUTO_INCREMENT for table `points_of_interest`
--
ALTER TABLE `points_of_interest`
  MODIFY `poiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `qbnb`
--
ALTER TABLE `qbnb`
  MODIFY `dataIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rental_properties`
--
ALTER TABLE `rental_properties`
  MODIFY `propertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5346;
--
-- AUTO_INCREMENT for table `service_member`
--
ALTER TABLE `service_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3345;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `booking_rental_prop` FOREIGN KEY (`propertyID`) REFERENCES `rental_properties` (`propertyID`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `feature_rental_prop` FOREIGN KEY (`propertyID`) REFERENCES `rental_properties` (`propertyID`);

--
-- Constraints for table `points_of_interest`
--
ALTER TABLE `points_of_interest`
  ADD CONSTRAINT `poi_district_dis` FOREIGN KEY (`districtID`) REFERENCES `city_districts` (`districtID`);

--
-- Constraints for table `rental_properties`
--
ALTER TABLE `rental_properties`
  ADD CONSTRAINT `rental_district_dis` FOREIGN KEY (`districtID`) REFERENCES `city_districts` (`districtID`),
  ADD CONSTRAINT `rental_service_mem` FOREIGN KEY (`supplierID`) REFERENCES `service_member` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_booking_book` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`),
  ADD CONSTRAINT `replies_service_mem` FOREIGN KEY (`replierID`) REFERENCES `service_member` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
