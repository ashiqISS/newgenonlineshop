ALTER TABLE `user_address` CHANGE `DOU` `DOU` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `order_products` CHANGE `status` `status` INT(11) NOT NULL COMMENT '1-not placed, 2- payment_pending, 3- payment_done, 4 - completed';

ALTER TABLE `order_products` CHANGE `amount` `amount` DOUBLE NOT NULL;

ALTER TABLE `order_history` CHANGE `status` `status` INT(11) NOT NULL COMMENT '1-pending, 2 - proessing, 3 - completed, 4 - cancelled';

ALTER TABLE `order_history` CHANGE `cb` `cb` INT(11) NOT NULL COMMENT '0- admin, 1 - buyer, 2 - merchant';

ALTER TABLE `order_history` CHANGE `ub` `ub` INT(11) NOT NULL COMMENT '0- admin, 1 - buyer, 2 - merchant';

ALTER TABLE `order_products` ADD `merchant_id` INT(11) NOT NULL AFTER `product_id`, ADD INDEX (`merchant_id`) ;

ALTER TABLE `order_products` ADD FOREIGN KEY (`merchant_id`) REFERENCES `merchant_details`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `order_history` ADD `product_id` INT(11) NOT NULL AFTER `order_id`, ADD `merchant_id` INT(11) NOT NULL AFTER `product_id`, ADD INDEX (`product_id`, `merchant_id`) ;

ALTER TABLE `order_history` ADD INDEX(`merchant_id`);

ALTER TABLE `order_history` ADD FOREIGN KEY (`order_id`) REFERENCES `newgen_shopping`.`order`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `order_history` ADD FOREIGN KEY (`product_id`) REFERENCES `newgen_shopping`.`products`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `order_history` ADD FOREIGN KEY (`merchant_id`) REFERENCES `newgen_shopping`.`merchant_details`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `order_history` DROP FOREIGN KEY `order_history_ibfk_3`;

ALTER TABLE `order_history` DROP `merchant_id`;

ALTER TABLE `order_products` DROP FOREIGN KEY `order_products_ibfk_3`;


ALTER TABLE `order_history` ADD `merchant_id` INT NOT NULL AFTER `product_id`;

ALTER TABLE `order_history` ADD `order_products_id` INT NOT NULL AFTER `order_id`;



--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



--
-- Table structure for table `sales_report`
--

CREATE TABLE IF NOT EXISTS `sales_report` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- Table structure for table `merchant_account_master`
--

CREATE TABLE IF NOT EXISTS `merchant_account_master` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `available_balance` double NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant_account_master`
--
ALTER TABLE `merchant_account_master`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant_account_master`
--
ALTER TABLE `merchant_account_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- Table structure for table `merchant_payout_history`
--

CREATE TABLE IF NOT EXISTS `merchant_payout_history` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `available_balance` double NOT NULL,
  `requested_amount` double NOT NULL,
  `bal_left` double NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-requested, 2-hold, 3-processing, 4-paid',
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant_payout_history`
--
ALTER TABLE `merchant_payout_history`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant_payout_history`
--
ALTER TABLE `merchant_payout_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- Table structure for table `merchant_transaction_master`
--

CREATE TABLE IF NOT EXISTS `merchant_transaction_master` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `transaction_type` int(11) NOT NULL COMMENT '1:Deposit, 2= Withdraw',
  `amount` double NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant_transaction_master`
--
ALTER TABLE `merchant_transaction_master`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant_transaction_master`
--
ALTER TABLE `merchant_transaction_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

