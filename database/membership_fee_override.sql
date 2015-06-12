--
-- Table structure for table `membership_fee_override`
--

CREATE TABLE IF NOT EXISTS `membership_fee_override` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `minimum_amount` int(11) NOT NULL,
  `description` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `membership_fee_override`
--
ALTER TABLE `membership_fee_override`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for table `membership_fee_override`
--
ALTER TABLE `membership_fee_override`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `membership_fee_override`
--
ALTER TABLE `membership_fee_override`
  ADD CONSTRAINT `mfo_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
