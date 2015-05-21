--
-- Table structure for table `person_telephone_number`
--

CREATE TABLE IF NOT EXISTS `person_telephone_number` (
  `id` int(11) NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `telephone_number_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `person_telephone_number`
--
ALTER TABLE `person_telephone_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `telephone_number_id` (`telephone_number_id`);

--
-- AUTO_INCREMENT for table `person_telephone_number`
--
ALTER TABLE `person_telephone_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `person_telephone_number`
--
ALTER TABLE `person_telephone_number`
  ADD CONSTRAINT `ptn_person` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `ptn_telephone_number` FOREIGN KEY (`telephone_number_id`) REFERENCES `telephone_numbers` (`id`);
