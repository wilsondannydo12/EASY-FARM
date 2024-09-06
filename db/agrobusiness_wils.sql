-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 08:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrobusiness_wils`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileImg` varchar(300) NOT NULL,
  `type` varchar(10) NOT NULL,
  `addDate` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `password`, `profileImg`, `type`, `addDate`, `status`, `reason`) VALUES
(1, 'daniel', 'Daniel', 'Wilson', 'wilsondannydo@gmail.com', '0244863660', '$2y$10$qpTf2MEjFVhk6XgwKMoLzekrzCtHfvdkBnatep4L9Tx5vGvCJ6fL.', 'uploads/profile/Daniel.JPG', 'superadmin', '2023-01-12', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addDate` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `email`, `phone`, `password`, `addDate`, `status`) VALUES
(2, 'sewoe', 'franksewoe@gmail.com', 240648867, '$2y$10$f39fKweYpXNsC6smTCRHKOO6Ery1nLyuGP6tKCfEGnc4QPuIBbNSW', '2024-07-29', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `locality`, `status`) VALUES
(1, 'Bawku', 'active'),
(2, 'Navrongo', 'active'),
(3, 'Bolgatanga', 'active'),
(4, 'Binaba', 'active'),
(5, 'Builsa', 'active'),
(6, 'Gbeogo', 'active'),
(7, 'Pobaga', 'active'),
(8, 'Paga', 'active'),
(9, 'Zebilla', 'active'),
(10, 'Kulungugu', 'active'),
(11, 'Sandema', 'active'),
(12, 'Worikambo', 'active'),
(13, 'Garu', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE `order_shipping` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `customer` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `ship_address` varchar(100) NOT NULL,
  `ship_apartment` varchar(100) NOT NULL,
  `ship_postCode` varchar(50) NOT NULL,
  `ship_town` varchar(100) NOT NULL,
  `bill_address` varchar(100) NOT NULL,
  `bill_apartment` varchar(100) NOT NULL,
  `bill_postCode` varchar(50) NOT NULL,
  `bill_town` varchar(100) NOT NULL,
  `orderComment` varchar(200) NOT NULL,
  `payment` varchar(20) NOT NULL DEFAULT 'awaiting',
  `transaction_id` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`id`, `order_no`, `customer`, `firstname`, `lastname`, `ship_address`, `ship_apartment`, `ship_postCode`, `ship_town`, `bill_address`, `bill_apartment`, `bill_postCode`, `bill_town`, `orderComment`, `payment`, `transaction_id`, `status`) VALUES
(1, 'AGRO7916', 2, 'Francis', 'Sewoe Kofi', 'Kologo Steet', 'No 24', 'UX-0001-2230', 'Navrongo', 'Kologo Steet', 'No 24', 'UX-0001-2230', 'Navrongo', 'Please package them to prevent excess heat. Thank you.', 'received', '22125521244', 'delivered'),
(2, 'AGRO7133', 2, 'Francis', 'Sewoe Kofi', 'Kologo Steet', 'No 24', 'UX-0001-2230', 'Navrongo', 'Kologo Steet', 'No 24', 'UX-0001-2230', 'Navrongo', '', 'received', '451213132213', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `customer` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `order_id`, `order_no`, `customer`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 'AGRO7916', 2, 2, 3, 25.00),
(2, 1, 'AGRO7916', 2, 1, 3, 55.00),
(3, 2, 'AGRO7133', 2, 2, 3, 25.00),
(4, 2, 'AGRO7133', 2, 1, 3, 55.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `availability` varchar(20) NOT NULL DEFAULT 'available',
  `vendor` int(11) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `shop` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `old_price` double(12,2) NOT NULL,
  `new_price` double(12,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `product_name`, `availability`, `vendor`, `product_type`, `shop`, `sku`, `old_price`, `new_price`, `image`, `description`, `status`) VALUES
(1, 'Dry Ground Nut Seed', 'available', 1, '2', 15, 'GN185', 65.00, 55.00, 'uploads/product/vegetables-product7.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\r\nFeatures\r\n\r\n    High quality fabric, very comfortable to touch and wear.\r\n    This cardigan sweater is cute for no reason,perfect for travel and casual.\r\n    It can tie in front-is forgiving to you belly or tie behind.\r\n    Light weight and perfect for layering.\r\n', 'active'),
(2, 'Grape', 'available', 1, '3', 16, 'GR556', 30.00, 25.00, 'uploads/product/vegetables-product6.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\r\nFeatures\r\n\r\n    High quality fabric, very comfortable to touch and wear.\r\n    This cardigan sweater is cute for no reason,perfect for travel and casual.\r\n    It can tie in front-is forgiving to you belly or tie behind.\r\n    Light weight and perfect for layering.', 'active'),
(3, 'Fresh Apple', 'available', 1, '3', 5, 'AP552', 100.00, 90.00, 'uploads/product/vegetables-product1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\r\nFeatures\r\n\r\n    High quality fabric, very comfortable to touch and wear.\r\n    This cardigan sweater is cute for no reason,perfect for travel and casual.\r\n    It can tie in front-is forgiving to you belly or tie behind.\r\n    Light weight and perfect for layering.\r\n', 'active'),
(4, 'Fresh Tomato', 'available', 1, '3', 5, 'TM221', 60.00, 50.00, 'uploads/product/vegetables-product3.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\r\nFeatures\r\n\r\n    High quality fabric, very comfortable to touch and wear.\r\n    This cardigan sweater is cute for no reason,perfect for travel and casual.\r\n    It can tie in front-is forgiving to you belly or tie behind.\r\n    Light weight and perfect for layering.\r\n', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `pro_type` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `pro_type`, `status`) VALUES
(2, 'Tops', 'active'),
(3, 'Fruit', 'active'),
(4, 'Corn', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `company` varchar(100) NOT NULL,
  `apartment` varchar(100) NOT NULL,
  `postCode` varchar(50) NOT NULL,
  `town` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `customer`, `firstname`, `lastname`, `address`, `company`, `apartment`, `postCode`, `town`, `status`) VALUES
(1, 2, 'Francis', 'Sewoe Kofi', 'Kologo Steet', 'SK Tech', 'No 24', 'UX-0001-2230', 'Navrongo', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `status`) VALUES
(1, 'Farm Product', 'active'),
(2, 'Animals', 'active'),
(3, 'Seeds', 'active'),
(4, 'Fertilizers', 'active'),
(5, 'Vegetables', 'active'),
(6, 'Tools & Parts', 'active'),
(15, 'Dryfruits', 'active'),
(16, 'Fruits', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transport_customers`
--

CREATE TABLE `transport_customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_customers`
--

INSERT INTO `transport_customers` (`id`, `username`, `firstname`, `lastname`, `password`, `phone`, `location`, `status`) VALUES
(1, 'sewoe', 'Francis', 'Sewoe', '$2y$10$gx7tI7b8RgZqaKEDrk8iAuj.yYbk.3YSLXljLGoA8zAuyNGAmfNKO', '0264535719', 'Navrongo', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transport_order`
--

CREATE TABLE `transport_order` (
  `transport_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `customer` int(11) NOT NULL,
  `ord_firstname` varchar(50) NOT NULL,
  `ord_lastname` varchar(50) NOT NULL,
  `ord_phone` varchar(20) NOT NULL,
  `ord_location` varchar(50) NOT NULL,
  `from_location` varchar(50) NOT NULL,
  `to_location` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `end_trip_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_order`
--

INSERT INTO `transport_order` (`transport_id`, `vehicle_id`, `order_no`, `customer`, `ord_firstname`, `ord_lastname`, `ord_phone`, `ord_location`, `from_location`, `to_location`, `start_date`, `end_date`, `order_date`, `order_time`, `end_trip_date`, `status`) VALUES
(2, 3, 'TRP4442', 1, 'Francis', 'Sewoe', '0264535719', 'Builsa', 'Navrongo', 'Paga', '2024-08-17', '2024-08-18', '2024-08-16', '15:19:56', '2024-08-16 15:19:56', 'ended'),
(3, 4, 'TRP6048', 1, 'Francis', 'Sewoe', '0264535719', 'Kulungugu', 'Paga', 'Navrongo', '2024-08-19', '2024-08-19', '2024-08-16', '19:13:50', '2024-08-16 19:13:50', 'ended');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gps` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileImg` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL,
  `addDate` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `city`, `gps`, `password`, `profileImg`, `type`, `addDate`, `status`, `reason`) VALUES
(1, 'wilson', 'Daniel', 'Ofori', 'wilsondannydo@gmail.com', '0244863660', 'Navrongo', 'UK-0021-1744', '$2y$10$67hhxLL2X.aY7TtAXqjgZOl9HLgqkp.mYOLbZrWP5iuovdHsiq.L6', 'uploads/profile/Daniel.JPG', 'farmer', '2024-07-20', 'active', ''),
(3, 'danny', 'Daniel', 'Ofori ', 'wilsondannydo@gmail.com', '0244863660', 'Navrongo', 'UK-003-0076', '$2y$10$oLwsvrn1ejU.3QW06i68JeFFWppJhBeTjXb4cBCddnLzRT4hcPTKu', 'uploads/profile/Daniel.JPG', 'transportOfficer', '2024-08-15', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `number_plate` varchar(50) NOT NULL,
  `vehicle_type` int(11) NOT NULL,
  `community` varchar(100) NOT NULL,
  `availability` varchar(30) NOT NULL,
  `vehicle_img` varchar(200) NOT NULL,
  `description` varchar(70) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `vehicle_name`, `number_plate`, `vehicle_type`, `community`, `availability`, `vehicle_img`, `description`, `status`) VALUES
(1, 3, 'Hyundai Truck ', 'UE-2400-24', 2, 'Navrongo Tono', 'available', 'uploads/vehicle/truc1.png', 'Very strong with much speed', 'active'),
(2, 3, 'Cargo Van', 'UE-0052-22', 3, 'Navrongo', 'not available', 'uploads/vehicle/track.png', 'You can trust this van.', 'active'),
(3, 3, 'Hyundai Truck ', 'VR-2152-21', 2, 'Navrongo', 'available', 'uploads/vehicle/truc2.png', 'For all you tomatoes and livestock.', 'active'),
(4, 3, 'Farm Tractor', 'UE-2204-24', 2, 'Navrongo', 'available', 'uploads/vehicle/tractor.png', 'Good and strong', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `types` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `types`, `status`) VALUES
(1, 'Coupe', 'active'),
(2, 'Truck', 'active'),
(3, 'Van', 'active'),
(4, 'Bus', 'active'),
(5, 'Cab', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_customers`
--
ALTER TABLE `transport_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_order`
--
ALTER TABLE `transport_order`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_shipping`
--
ALTER TABLE `order_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transport_customers`
--
ALTER TABLE `transport_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transport_order`
--
ALTER TABLE `transport_order`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
