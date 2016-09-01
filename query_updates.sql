ALTER TABLE `user_address` CHANGE `DOU` `DOU` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `order_products` CHANGE `status` `status` INT(11) NOT NULL COMMENT '1-not placed, 2- payment_pending, 3- payment_done, 4 - completed';

ALTER TABLE `order_products` CHANGE `amount` `amount` DOUBLE NOT NULL;

ALTER TABLE `order_history` CHANGE `status` `status` INT(11) NOT NULL COMMENT '1-pending, 2 - proessing, 3 - completed, 4 - cancelled';

ALTER TABLE `order_history` CHANGE `cb` `cb` INT(11) NOT NULL COMMENT '0- admin, 1 - buyer, 2 - merchant';

ALTER TABLE `order_history` CHANGE `ub` `ub` INT(11) NOT NULL COMMENT '0- admin, 1 - buyer, 2 - merchant';