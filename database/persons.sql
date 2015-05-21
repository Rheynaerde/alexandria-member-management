-- 
-- Creates table that stores persons
-- 
-- We deliberately do not store addresses, phone numbers,
-- email addresses in this table. This allows a single
-- person to have multiple addresses, phone numbers, ...
-- We also do not store membership information here.
-- This allows us to store people that are not a member
-- but might be of some other interest to us.
-- 

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) unsigned NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `familiar_name` varchar(45) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `is_natural_person` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Set the indices for this table and make the id auto-increment.
--

ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender_id`);

ALTER TABLE `persons`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

--
-- gender_id should correspond to an id in the table gender
-- 

ALTER TABLE `persons`
  ADD CONSTRAINT `person_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`);
