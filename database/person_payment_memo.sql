--
-- Table structure for table `person_payment_memo`
--

CREATE TABLE IF NOT EXISTS `person_payment_memo` (
  `id` int(11) NOT NULL,
  `memo_id` int(11) NOT NULL,
  `person_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `person_payment_memo`
--
ALTER TABLE `person_payment_memo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memo_id` (`memo_id`),
  ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for table `person_payment_memo`
--
ALTER TABLE `person_payment_memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `person_payment_memo`
--
ALTER TABLE `person_payment_memo`
  ADD CONSTRAINT `ppm_person` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `ppm_memo` FOREIGN KEY (`memo_id`) REFERENCES `payment_memos` (`id`);
