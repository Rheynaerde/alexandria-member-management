--
-- Table with choice of types of user-member connections
--

CREATE TABLE IF NOT EXISTS `user_member_type` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Adding default types
--

INSERT INTO `user_member_type` (`id`, `type`) VALUES
  (1, 'primary'),
  (2, 'family');

--
-- id is the primary key
--
ALTER TABLE `user_member_type`
  ADD PRIMARY KEY (`id`);
  
--
-- Set auto-increment for id (starts at 3, since we added 1 and 2)
--
ALTER TABLE `user_member_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
