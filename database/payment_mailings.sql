--
-- Table structure for table `payment_mailings`
--

CREATE TABLE IF NOT EXISTS `payment_mailings` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `payment_mailings`
--
ALTER TABLE `payment_mailings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memo_id` (`memo_id`),
  ADD KEY `time` (`time`);

--
-- AUTO_INCREMENT for table `payment_items`
--
ALTER TABLE `payment_mailings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `payment_mailings`
--
ALTER TABLE `payment_mailings`
  ADD CONSTRAINT `pm_memo` FOREIGN KEY (`memo_id`) REFERENCES `payment_memos` (`id`);
