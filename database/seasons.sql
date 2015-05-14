--
-- Table to store the different seasons of the sport
--
-- We do not add any checks that the start date comes before the end date,
-- or that a season is not both current and archived, since MySQL does 
-- parse these checks but further ignores them anyway.
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT '0',
  `is_current` tinyint(1) NOT NULL,
  `previous_id` int(11) DEFAULT NULL,
  `next_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `begin` (`begin`),
  ADD KEY `end` (`end`),
  ADD KEY `previous_id` (`previous_id`),
  ADD KEY `next_id` (`next_id`);
  
--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_next` FOREIGN KEY (`next_id`) REFERENCES `seasons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `seasons_previous` FOREIGN KEY (`previous_id`) REFERENCES `seasons` (`id`) ON DELETE SET NULL;

