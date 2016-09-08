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
-- Table structure for table `banking_details`
--

CREATE TABLE IF NOT EXISTS `banking_details` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` int(11) NOT NULL COMMENT '1-paypal, 2-bank',
  `account_holder_name` varchar(100) NOT NULL,
  `account_number` int(25) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `ifsc` varchar(11) NOT NULL,
  `paypal_id` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banking_details`
--
ALTER TABLE `banking_details`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banking_details`
--
ALTER TABLE `banking_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `banking_details` ADD `DOU` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE `banking_details` CHANGE `DOC` `DOC` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `merchant_payout_history` CHANGE `payment_mode` `payment_account` INT(11) NOT NULL;


ALTER TABLE `merchant_payout_history`
  DROP `bal_left`;

ALTER TABLE `merchant_payout_history` CHANGE `status` `status` INT(11) NOT NULL COMMENT '1-requested, 2-hold, 3-processing, 4-paid, 5 -rejected';