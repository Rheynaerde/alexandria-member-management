--
-- Table structure for table `person_mailaddress`
--

CREATE TABLE IF NOT EXISTS `person_mailaddress` (
  `id` int(11) NOT NULL,
  `person_id` int(11) unsigned NOT NULL,
  `mailaddress_id` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `person_mailaddress`
--
ALTER TABLE `person_mailaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `mailaddress_id` (`mailaddress_id`);

--
-- AUTO_INCREMENT for table `person_mailaddress`
--
ALTER TABLE `person_mailaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `person_mailaddress`
--
ALTER TABLE `person_mailaddress`
  ADD CONSTRAINT `pm_mailaddress` FOREIGN KEY (`mailaddress_id`) REFERENCES `mailaddresses` (`id`),
  ADD CONSTRAINT `pm_person` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`);
