--
-- Table structure for table `payment_items`
--

CREATE TABLE IF NOT EXISTS `payment_items` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_cancelled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memo_id` (`memo_id`),
  ADD KEY `position` (`position`),
  ADD KEY `is_cancelled` (`is_cancelled`);

--
-- AUTO_INCREMENT for table `payment_items`
--
ALTER TABLE `payment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD CONSTRAINT `pi_memo` FOREIGN KEY (`memo_id`) REFERENCES `payment_memos` (`id`);
