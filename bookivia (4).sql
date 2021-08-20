-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 01:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookivia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(12) NOT NULL,
  `aName` varchar(50) NOT NULL,
  `aEmail` varchar(50) NOT NULL,
  `aPassword` varchar(50) NOT NULL,
  `aStatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `aName`, `aEmail`, `aPassword`, `aStatus`) VALUES
(12345, 'Admin', 'admin@bookivia.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `bookivia_address`
--

CREATE TABLE `bookivia_address` (
  `Address_ID` int(12) NOT NULL,
  `cAccount_ID` int(12) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `mAddress1` varchar(255) NOT NULL,
  `mAddress2` varchar(255) NOT NULL,
  `mCountry` varchar(255) NOT NULL,
  `mState` varchar(255) NOT NULL,
  `mCity` varchar(255) NOT NULL,
  `mZip_Code` varchar(255) NOT NULL,
  `bAddress1` varchar(255) NOT NULL,
  `bAddress2` varchar(255) NOT NULL,
  `bCountry` varchar(255) NOT NULL,
  `bState` varchar(255) NOT NULL,
  `bCity` varchar(255) NOT NULL,
  `bZip_Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookivia_address`
--

INSERT INTO `bookivia_address` (`Address_ID`, `cAccount_ID`, `Phone_Number`, `mAddress1`, `mAddress2`, `mCountry`, `mState`, `mCity`, `mZip_Code`, `bAddress1`, `bAddress2`, `bCountry`, `bState`, `bCity`, `bZip_Code`) VALUES
(1, 1, '787999927', '02HC', 'RTX 4000', 'United States', 'Nevada', 'Sabana', '954522', '02HC', 'RTX 4000', 'United States', 'Nevada', ' Sabana', '596565'),
(2, 2, '7874443573', 'AV Nuevo', 'Azul City', 'United States', 'Hawaii', 'Lavender', '003855', 'AV Nuevo', 'Azul City', 'United States', 'Hawaii', 'Lavender', '003855'),
(3, 3, '7878150000', 'HC 02 BOX', 'San Juan', 'United States', 'Puerto Rico', 'San Juan', '00912', 'Main Street', '14', 'United States', 'Florida', 'Orlando', '32830');

-- --------------------------------------------------------

--
-- Table structure for table `bookivia_books`
--

CREATE TABLE `bookivia_books` (
  `Book_ISBN` int(255) NOT NULL,
  `Book_Title` varchar(255) DEFAULT NULL,
  `Book_Author` varchar(255) DEFAULT NULL,
  `Book_Edition` varchar(10) DEFAULT NULL,
  `Book_Published_Date` varchar(50) DEFAULT NULL,
  `Book_Genre` varchar(30) DEFAULT NULL,
  `Book_Format` varchar(30) DEFAULT NULL,
  `Book_Editorial` varchar(30) DEFAULT NULL,
  `Book_Status` varchar(20) DEFAULT NULL,
  `Book_Price` double(4,2) DEFAULT NULL,
  `Book_Cost` double(4,2) NOT NULL,
  `Book_Image` varchar(100) DEFAULT NULL,
  `Book_Quantity` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookivia_books`
--

INSERT INTO `bookivia_books` (`Book_ISBN`, `Book_Title`, `Book_Author`, `Book_Edition`, `Book_Published_Date`, `Book_Genre`, `Book_Format`, `Book_Editorial`, `Book_Status`, `Book_Price`, `Book_Cost`, `Book_Image`, `Book_Quantity`) VALUES
(60838655, 'A People\'s History of the United States', 'Howard Zinn', '1', '2005/05/08', 'History', 'Hardcover', 'N/A', 'Available', 24.99, 19.99, 'uploads/product10.jpg', '100'),
(141439475, 'Frankenstein (Audiobook Ver)', 'Mary Shelley', '1', '2013/10/10', 'Horror', 'Audiobook', 'N/A', 'Available', 6.99, 3.49, 'uploads/frankensteinaudio.jpg', '50'),
(145212826, 'Art Inc', 'Lisa Congdon', '1', '2014/08/14', 'Art', 'Hardcover', 'N/A', 'Available', 14.99, 10.29, 'uploads/product4.jpg', '50'),
(316548189, 'Long Walk to Freedom: The Autobiography of Nelson Mandela', 'Nelson Mandela', '1', '2013/01/01', 'Biography', 'Hardcover', 'N/A', 'Available', 12.99, 11.99, 'uploads/product6.jpg', '50'),
(451532244, 'Frankenstein', 'Mary Shelley', '1', '2013/10/10', 'Horror', 'Hardcover', 'N/A', 'Available', 8.99, 4.59, 'uploads/product9.jpg', '50'),
(470182301, 'Oil Painting for Dummies', 'Anita Marie', '1', '2008/02/05', 'Painting', 'Hardcover', 'N/A', 'Available', 15.17, 10.29, 'uploads/oilpaint.jpg', '100'),
(486229602, 'Sculpture: Principles and Practices', 'Louis Slobdobkin', '1', '1973/06/01', 'Sculptures', 'Hardcover', 'N/A', 'Available', 19.99, 12.99, 'uploads/product2.jpg', '25'),
(812550706, 'Ender\'s Game', 'Orson Scott Card', '1', '1994/07/14', 'Sci-Fi', 'Hardcover', 'N/A', 'Available', 5.40, 2.29, 'uploads/product12.jpg', '80'),
(1451648537, 'Steve Jobs', 'Walter Isaacson', '1', '2011/10/24', 'Biography', 'Hardcover', 'N/A', 'Available', 20.00, 15.99, 'uploads/product11.jpg', '30'),
(1480523216, 'Ender\'s Game (Audiobook ver)', 'Orson Scott Card', '1', '2013/10/29', 'Sci-Fi', 'Audiobook', 'N/A', 'Available', 5.40, 3.00, 'uploads/EnderAudio.jpg', '100'),
(1568585616, 'Guerra Contra los Puertorriqueños', 'Nelson A. Denis', '1', '2015/11/24', 'History', 'Hardcover', 'N/A', 'Available', 19.99, 13.59, 'uploads/product8.jpg', '50'),
(1584236388, 'Paper Sculptures', 'Richard Sweeney', '1', '2016/09/01', 'Sculptures', 'Hardcover', 'N/A', 'Available', 19.99, 11.99, 'uploads/product3.jpg', '25'),
(1594561753, 'The Black Cat', 'Edgar Allan Poe', '1', '2004/02/02', 'Horror', 'Hardcover', 'N/A', 'Available', 7.99, 1.99, 'uploads/product1.jpg', '100'),
(1838661107, 'The Fashion Book', 'Phaidon Editors', '1', '2020/05/27', 'Fashion', 'Hardcover', 'N/A', 'Available', 33.37, 30.00, 'uploads/Fashionbook.jpg', '100'),
(1909414247, 'Anatomy for 3D Artists', 'Chris Legaspi', '1', '2015/12/15', 'Sculptures', 'Hardcover', 'N/A', 'Available', 19.99, 18.99, 'uploads/product5.jpg', '50'),
(2147483647, 'Shaping the World', 'Anthony Gormley', '1', '2020/11/07', 'Sculptures', 'Hardcover', 'N/A', 'Available', 20.00, 15.79, 'uploads/product7.jpg', '50');

-- --------------------------------------------------------

--
-- Table structure for table `bookivia_customers`
--

CREATE TABLE `bookivia_customers` (
  `cAccount_ID` int(12) NOT NULL,
  `cFirstName` varchar(255) NOT NULL,
  `cLastName` varchar(255) NOT NULL,
  `cEmail` varchar(255) NOT NULL,
  `cPassword` varchar(255) NOT NULL,
  `cStatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookivia_customers`
--

INSERT INTO `bookivia_customers` (`cAccount_ID`, `cFirstName`, `cLastName`, `cEmail`, `cPassword`, `cStatus`) VALUES
(1, 'Lux', 'Ruby', 'luxruby@bookivia.com', '$2y$10$rLCDiE05dAySTOCkcgD7iuvWc3dI5bRzsgQVz86i19KkxiJ1x0rsK', 'Available'),
(2, 'Herbert', 'Frederick', 'bert@book.com', '$2y$10$F.ImDdnglG.jZi1b4PHo9uCu5FM0QpV52z7qt37aB5A5zLLwnE7gm', 'Available'),
(3, 'Brian', 'Mont', 'bmont@gmail.com', '$2y$10$zpN3AZ5GIpUjeNzR2O5Hre1ao8g676Q8YTbztMeAO5UYZie3wMWvC', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Details_ID` int(12) NOT NULL,
  `Product_Quantity` int(255) NOT NULL,
  `Product_Price` double NOT NULL,
  `Book_ISBN` int(255) NOT NULL,
  `Order_ID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Details_ID`, `Product_Quantity`, `Product_Price`, `Book_ISBN`, `Order_ID`) VALUES
(1, 1, 5.4, 812550706, 1),
(2, 1, 5.4, 1480523216, 1),
(3, 1, 7.99, 1594561753, 1),
(5, 1, 5.4, 812550706, 3),
(6, 1, 5.4, 1480523216, 3),
(7, 8, 7.99, 1594561753, 3),
(8, 1, 5.4, 812550706, 4),
(9, 5, 5.4, 1480523216, 4),
(10, 1, 7.99, 1594561753, 4),
(11, 1, 24.99, 60838655, 17),
(12, 1, 24.99, 60838655, 18),
(13, 1, 14.99, 145212826, 18),
(14, 1, 12.99, 316548189, 18),
(15, 1, 8.99, 451532244, 18),
(16, 1, 5.4, 812550706, 18),
(17, 1, 19.99, 1584236388, 18),
(18, 1, 7.99, 1594561753, 18),
(19, 1, 6.99, 141439475, 19),
(20, 1, 14.99, 145212826, 19),
(21, 1, 12.99, 316548189, 20),
(22, 1, 8.99, 451532244, 21),
(23, 1, 20, 1451648537, 22),
(24, 1, 6.99, 141439475, 23),
(25, 1, 14.99, 145212826, 23),
(26, 1, 24.99, 60838655, 24),
(27, 1, 19.99, 486229602, 25),
(28, 1, 20, 1451648537, 26),
(29, 1, 15.17, 470182301, 27),
(30, 1, 33.37, 1838661107, 28),
(31, 1, 6.99, 141439475, 29),
(32, 1, 5.4, 812550706, 30),
(33, 1, 8.99, 451532244, 31),
(34, 1, 19.99, 1909414247, 32),
(35, 1, 5.4, 1480523216, 33),
(36, 1, 24.99, 60838655, 34),
(37, 1, 19.99, 1568585616, 35),
(38, 1, 12.99, 316548189, 36);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `Order_ID` int(12) NOT NULL,
  `cAccount_ID` int(12) NOT NULL,
  `Total_Price` float NOT NULL,
  `Order_Date` date NOT NULL DEFAULT current_timestamp(),
  `Shipping_Status` varchar(20) NOT NULL,
  `Payment_Status` varchar(20) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Arrival_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`Order_ID`, `cAccount_ID`, `Total_Price`, `Order_Date`, `Shipping_Status`, `Payment_Status`, `Status`, `Arrival_Date`) VALUES
(1, 1, 18.79, '2021-07-22', 'Shipped', 'Processed.', 'Order Placed.', '2021-08-07'),
(3, 1, 74.72, '2021-07-22', 'Delivered', 'Processed.', 'Order Placed.', '2021-08-07'),
(4, 2, 40.39, '2021-07-22', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(17, 1, 24.99, '2021-07-26', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(18, 3, 95.34, '2021-07-26', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(19, 3, 21.98, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(20, 3, 12.99, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(21, 3, 8.99, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(22, 3, 20, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(23, 3, 21.98, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(24, 3, 24.99, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(25, 3, 19.99, '2021-07-27', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(26, 1, 20, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(27, 1, 15.17, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(28, 1, 33.37, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(29, 2, 6.99, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(30, 2, 5.4, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(31, 2, 8.99, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(32, 2, 19.99, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(33, 2, 5.4, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(34, 2, 24.99, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(35, 2, 19.99, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00'),
(36, 3, 12.99, '2021-07-28', 'Processing', 'Processed.', 'Order Placed.', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `pEmail` varchar(50) NOT NULL,
  `cAccount_ID` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`pEmail`, `cAccount_ID`) VALUES
('luxruby@bookivia.com', 1),
('bert@book.com', 2),
('bmont@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `bookivia_address`
--
ALTER TABLE `bookivia_address`
  ADD PRIMARY KEY (`Address_ID`),
  ADD UNIQUE KEY `Customer_ID` (`cAccount_ID`);

--
-- Indexes for table `bookivia_books`
--
ALTER TABLE `bookivia_books`
  ADD PRIMARY KEY (`Book_ISBN`);

--
-- Indexes for table `bookivia_customers`
--
ALTER TABLE `bookivia_customers`
  ADD PRIMARY KEY (`cAccount_ID`),
  ADD UNIQUE KEY `cEmail` (`cEmail`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Details_ID`),
  ADD KEY `Book_ISBN` (`Book_ISBN`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `cAccount_ID` (`cAccount_ID`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`pEmail`),
  ADD KEY `cAccount_ID` (`cAccount_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `bookivia_address`
--
ALTER TABLE `bookivia_address`
  MODIFY `Address_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookivia_customers`
--
ALTER TABLE `bookivia_customers`
  MODIFY `cAccount_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Details_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `Order_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookivia_address`
--
ALTER TABLE `bookivia_address`
  ADD CONSTRAINT `bookivia_address_ibfk_1` FOREIGN KEY (`cAccount_ID`) REFERENCES `bookivia_customers` (`cAccount_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`Book_ISBN`) REFERENCES `bookivia_books` (`Book_ISBN`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `order_table` (`Order_ID`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`cAccount_ID`) REFERENCES `bookivia_customers` (`cAccount_ID`);

--
-- Constraints for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD CONSTRAINT `payment_type_ibfk_1` FOREIGN KEY (`cAccount_ID`) REFERENCES `bookivia_customers` (`cAccount_ID`),
  ADD CONSTRAINT `payment_type_ibfk_2` FOREIGN KEY (`cAccount_ID`) REFERENCES `bookivia_customers` (`cAccount_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
