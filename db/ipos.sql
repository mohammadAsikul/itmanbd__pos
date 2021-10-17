-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 01:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipos`
--

-- --------------------------------------------------------

--
-- Table structure for table `ipos_brand`
--

CREATE TABLE `ipos_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipos_category`
--

CREATE TABLE `ipos_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_stock` varchar(100) DEFAULT NULL,
  `category_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_category`
--

INSERT INTO `ipos_category` (`category_id`, `category_name`, `category_stock`, `category_status`) VALUES
(1, 'Computer', '0', 'Active'),
(2, 'Component', '0', 'Active'),
(3, 'Office Equipment', '0', 'Active'),
(4, 'Security', '0', 'Active'),
(5, 'Networking', '0', 'Active'),
(6, 'Accessories', '0', 'Active'),
(7, 'Software', '0', 'Active'),
(8, 'Services', '0', 'Active'),
(9, 'Gaming', '0', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_client`
--

CREATE TABLE `ipos_client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `client_cont_person` varchar(100) DEFAULT NULL,
  `client_cont_number` varchar(11) NOT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `client_address` varchar(300) NOT NULL,
  `client_status` varchar(10) NOT NULL,
  `client_balance` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_client`
--

INSERT INTO `ipos_client` (`client_id`, `client_name`, `client_cont_person`, `client_cont_number`, `client_email`, `client_address`, `client_status`, `client_balance`) VALUES
(1, 'Disney Sweater Ltd.', 'Md. Aibur Rahman', '01785598997', 'smaiburrahman75@gmail.com', 'Barpa, Rupgonj, Narayangonj', 'Active', NULL),
(2, 'EO Internet', 'Obidul Islam', '01684318992', '', 'Jatramura, Rupgonj, Narayangonj', 'Active', NULL),
(3, 'Mazeda Fabrics Ltd', 'Md. Jaman Ahmed', '01956644165', '', 'Jatramura, Rupgonj, Narayangonj.', 'Active', NULL),
(4, 'Mazeda Fabrics Ltd d', 'Md. Jaman Ahmed d', '01956644160', 'as@gmail.com', 'Jatramura, Rupgonj, Narayangonj.', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipos_item`
--

CREATE TABLE `ipos_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_category` int(11) NOT NULL,
  `item_sub_category` int(11) NOT NULL,
  `item_brand` int(11) NOT NULL,
  `item_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipos_item_barcode`
--

CREATE TABLE `ipos_item_barcode` (
  `id` int(11) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipos_item_image`
--

CREATE TABLE `ipos_item_image` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipos_item_info`
--

CREATE TABLE `ipos_item_info` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `purchase_rate` varchar(255) NOT NULL,
  `sales_rate` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipos_purchase`
--

CREATE TABLE `ipos_purchase` (
  `id` int(11) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `purchase_order_id` varchar(255) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `purchase_time` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_subTotal` varchar(255) NOT NULL,
  `purchase_discount` varchar(255) NOT NULL,
  `purchase_total` varchar(255) NOT NULL,
  `purchase_payAmount` varchar(255) NOT NULL,
  `purchase_dueAmount` varchar(255) NOT NULL,
  `purchase_comment` varchar(255) NOT NULL,
  `purchase_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_purchase`
--

INSERT INTO `ipos_purchase` (`id`, `purchase_id`, `purchase_order_id`, `purchase_date`, `purchase_time`, `supplier_id`, `user_id`, `purchase_subTotal`, `purchase_discount`, `purchase_total`, `purchase_payAmount`, `purchase_dueAmount`, `purchase_comment`, `purchase_status`) VALUES
(1, 'PUR-02-1', 'PO-02-', '16-Oct-2021', '04:47:49', 1, 2, '25,900.00', '0', '25,900.00', '0', '25,900.00', 'pay in cash', 'Pending'),
(2, 'PUR-02-1', 'PO-02-', '16-Oct-2021', '04:47:49', 1, 2, '25,900.00', '0', '25,900.00', '0', '25,900.00', 'pay in cash', 'Pending'),
(3, 'PUR-02-3', 'PO-02-', '16-Oct-2021', '04:56:36', 1, 2, '2,240.00', '240', '2,000.00', '1000', '1,000.00', 'Due 1000', 'Pending'),
(4, 'PUR-02-4', 'PO-02-', '16-Oct-2021', '06:10:42', 1, 2, '4,900.00', '50', '4,850.00', '4000', '850.00', 'due some money', 'Pending'),
(5, 'PUR-02-5', 'PO-02-', '16-Oct-2021', '06:12:54', 1, 2, '8,500.00', '500', '8,000.00', '8000', '0.00', 'Cash pay ', 'Pending'),
(6, 'PUR-02-6', 'PO-02-', '16-Oct-2021', '06:16:09', 1, 2, '3,050.00', '50', '3,000.00', '0', '3,000.00', 'due', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_purchase_item`
--

CREATE TABLE `ipos_purchase_item` (
  `id` int(11) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `purchase_order_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_unit` int(11) NOT NULL,
  `purchase_qty` varchar(50) NOT NULL,
  `purchase_price` varchar(50) NOT NULL,
  `purchase_total` varchar(11) NOT NULL,
  `barcode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_purchase_item`
--

INSERT INTO `ipos_purchase_item` (`id`, `purchase_id`, `purchase_order_id`, `item_id`, `purchase_unit`, `purchase_qty`, `purchase_price`, `purchase_total`, `barcode_id`) VALUES
(1, 'PUR-02-1', 'PO-02-', 2, 1, '2', '700', '1,400.00', NULL),
(2, 'PUR-02-1', 'PO-02-', 1, 2, '10', '2450', '24,500.00', NULL),
(3, 'PUR-02-1', 'PO-02-', 2, 1, '2', '700', '1,400.00', NULL),
(4, 'PUR-02-1', 'PO-02-', 1, 2, '10', '2450', '24,500.00', NULL),
(5, 'PUR-02-3', 'PO-02-', 11, 1, '4', '60', '240.00', NULL),
(6, 'PUR-02-3', 'PO-02-', 10, 1, '4', '500', '2,000.00', NULL),
(7, 'PUR-02-4', 'PO-02-', 15, 2, '2', '2450', '4,900.00', NULL),
(8, 'PUR-02-5', 'PO-02-', 15, 1, '4', '500', '2,000.00', NULL),
(9, 'PUR-02-5', 'PO-02-', 14, 2, '2', '3250', '6,500.00', NULL),
(10, 'PUR-02-6', 'PO-02-', 1114, 3, '305', '10', '3,050.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipos_purchase_order`
--

CREATE TABLE `ipos_purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_order_id` varchar(255) NOT NULL,
  `purchase_order_date` varchar(50) NOT NULL,
  `purchase_order_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `purchase_order_subTotal` varchar(50) DEFAULT NULL,
  `purchase_order_discount` varchar(50) DEFAULT NULL,
  `purchase_order_total` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_purchase_order`
--

INSERT INTO `ipos_purchase_order` (`id`, `purchase_order_id`, `purchase_order_date`, `purchase_order_time`, `user_id`, `client_id`, `purchase_order_subTotal`, `purchase_order_discount`, `purchase_order_total`, `comment`, `status`) VALUES
(1, 'PO-02-1', '15-Oct-2021', '01:39:52', 2, 2, '4,040.00', '0', '4,040.00', 'Obidul mama due balance', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_purchase_order_item`
--

CREATE TABLE `ipos_purchase_order_item` (
  `id` int(11) NOT NULL,
  `purchase_order_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_order_item_description` varchar(255) NOT NULL,
  `purchase_order_item_unit` int(11) NOT NULL,
  `purchase_order_item_qty` int(11) NOT NULL,
  `purchase_order_item_price` float NOT NULL,
  `purchase_order_item_total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_purchase_order_item`
--

INSERT INTO `ipos_purchase_order_item` (`id`, `purchase_order_id`, `item_id`, `purchase_order_item_description`, `purchase_order_item_unit`, `purchase_order_item_qty`, `purchase_order_item_price`, `purchase_order_item_total`) VALUES
(1, 'PO-02-1', 2, 'sky view cat 5e', 2, 1, 2600, '2,600.00'),
(2, 'PO-02-1', 1, '8 port ethernet switch', 1, 2, 720, '1,440.00');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_stock`
--

CREATE TABLE `ipos_stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `inventory_count` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipos_sub_category`
--

CREATE TABLE `ipos_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_name` int(11) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `sub_category_stock` varchar(50) NOT NULL,
  `sub_category_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_sub_category`
--

INSERT INTO `ipos_sub_category` (`sub_category_id`, `category_name`, `sub_category_name`, `sub_category_stock`, `sub_category_status`) VALUES
(1, 1, 'Desktop', '0', 'Active'),
(2, 1, 'Laptop', '3', 'Active'),
(3, 2, 'Motherboard', '0', 'Active'),
(4, 2, 'Processor (AMD)', '5', 'Active'),
(5, 2, 'Processor (Intel)', '10', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_supplier`
--

CREATE TABLE `ipos_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_cont_person` varchar(100) DEFAULT NULL,
  `supplier_cont_number` varchar(11) DEFAULT NULL,
  `supplier_email_address` varchar(150) NOT NULL,
  `supplier_whatsapp` varchar(11) NOT NULL,
  `supplier_address` varchar(300) DEFAULT NULL,
  `supplier_status` varchar(10) NOT NULL,
  `supplier_balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_supplier`
--

INSERT INTO `ipos_supplier` (`supplier_id`, `supplier_name`, `supplier_cont_person`, `supplier_cont_number`, `supplier_email_address`, `supplier_whatsapp`, `supplier_address`, `supplier_status`, `supplier_balance`) VALUES
(1, 'Sark Computer & Service Center', 'Hridoy', '01999999999', 'hridoy@gmail.com', '01999999999', 'Sonargonj', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipos_unit`
--

CREATE TABLE `ipos_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_unit`
--

INSERT INTO `ipos_unit` (`unit_id`, `unit_name`) VALUES
(1, 'Pcs'),
(2, 'Box'),
(3, 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_user`
--

CREATE TABLE `ipos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_user`
--

INSERT INTO `ipos_user` (`id`, `username`, `password`, `designation`, `user_role`, `status`) VALUES
(1, 'ashikul', 'Bhuiyan5027@', 'Technical Support Engineer ', 1, 'Active'),
(2, 'jubair', '15baa9e5ffebf50cb220a641ff9e210d', 'Asst. Engineer', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ipos_user_role`
--

CREATE TABLE `ipos_user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipos_user_role`
--

INSERT INTO `ipos_user_role` (`id`, `role_name`) VALUES
(1, 'Super Admi'),
(2, 'Admin'),
(3, 'Management'),
(4, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipos_brand`
--
ALTER TABLE `ipos_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_category`
--
ALTER TABLE `ipos_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ipos_client`
--
ALTER TABLE `ipos_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `ipos_item`
--
ALTER TABLE `ipos_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_item_barcode`
--
ALTER TABLE `ipos_item_barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_item_info`
--
ALTER TABLE `ipos_item_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_purchase`
--
ALTER TABLE `ipos_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_purchase_item`
--
ALTER TABLE `ipos_purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_purchase_order`
--
ALTER TABLE `ipos_purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_purchase_order_item`
--
ALTER TABLE `ipos_purchase_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_stock`
--
ALTER TABLE `ipos_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_sub_category`
--
ALTER TABLE `ipos_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `ipos_supplier`
--
ALTER TABLE `ipos_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `ipos_unit`
--
ALTER TABLE `ipos_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `ipos_user`
--
ALTER TABLE `ipos_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipos_user_role`
--
ALTER TABLE `ipos_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ipos_brand`
--
ALTER TABLE `ipos_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipos_category`
--
ALTER TABLE `ipos_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ipos_client`
--
ALTER TABLE `ipos_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ipos_item`
--
ALTER TABLE `ipos_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipos_item_barcode`
--
ALTER TABLE `ipos_item_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipos_item_info`
--
ALTER TABLE `ipos_item_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipos_purchase`
--
ALTER TABLE `ipos_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ipos_purchase_item`
--
ALTER TABLE `ipos_purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ipos_purchase_order`
--
ALTER TABLE `ipos_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ipos_purchase_order_item`
--
ALTER TABLE `ipos_purchase_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipos_stock`
--
ALTER TABLE `ipos_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipos_sub_category`
--
ALTER TABLE `ipos_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ipos_supplier`
--
ALTER TABLE `ipos_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ipos_unit`
--
ALTER TABLE `ipos_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ipos_user`
--
ALTER TABLE `ipos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipos_user_role`
--
ALTER TABLE `ipos_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
