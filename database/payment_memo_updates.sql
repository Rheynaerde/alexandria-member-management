--
-- Table structure for table `payment_memo_updates`
--

CREATE TABLE IF NOT EXISTS `payment_memo_updates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `old_date` date NOT NULL,
  `old_due_date` date DEFAULT NULL,
  `old_is_paid` tinyint(1) NOT NULL,
  `old_is_cancelled` tinyint(1) NOT NULL,
  `old_name` varchar(45) NOT NULL,
  `old_description` text,
  `old_giro_description` varchar(100) DEFAULT NULL,
  `new_date` date NOT NULL,
  `new_due_date` date DEFAULT NULL,
  `new_is_paid` tinyint(1) NOT NULL,
  `new_is_cancelled` tinyint(1) NOT NULL,
  `new_name` varchar(45) NOT NULL,
  `new_description` text,
  `new_giro_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `payment_memo_updates`
--
ALTER TABLE `payment_memo_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `memo_id` (`memo_id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for table `payment_memo_updates`
--
ALTER TABLE `payment_memo_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `payment_memo_updates`
--
ALTER TABLE `payment_memo_updates`
  ADD CONSTRAINT `pmu_memo` FOREIGN KEY (`memo_id`) REFERENCES `payment_memos` (`id`),
  ADD CONSTRAINT `pmu_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
