--
-- Table structure for table `person_address`
--

CREATE TABLE IF NOT EXISTS `person_address` (
  `id` int(11) NOT NULL,
  `person_id` int(11) unsigned NOT NULL,
  `address_id` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `person_address`
--
ALTER TABLE `person_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address_id`),
  ADD KEY `person` (`person_id`);
  
--
-- make id auto-increment
--
ALTER TABLE `person_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `person_address`
--
ALTER TABLE `person_address`
  ADD CONSTRAINT `pa_person` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `pa_address` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);
