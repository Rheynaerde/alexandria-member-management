-- 
-- Creates table that stores the members of the club
-- 
-- Each member corresponds to a unique person.
-- 

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `federation_id` varchar(10) DEFAULT NULL,
  `hand_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Set the indices for this table
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `federation_id` (`federation_id`),
  ADD UNIQUE KEY `person_id` (`person_id`),
  ADD KEY `hand` (`hand_id`),
  ADD KEY `is_active` (`is_active`);

-- id should auto-increment
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `members`
  ADD CONSTRAINT `member_person` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `member_hand` FOREIGN KEY (`hand_id`) REFERENCES `hand` (`id`);
