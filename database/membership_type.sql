--
-- Table structure for table `membership_type`
--

CREATE TABLE IF NOT EXISTS `membership_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `membership_type` (`id`, `name`) VALUES
(1, 'default_membership'),
(2, 'trial_lesson'),
(3, 'trial_membership'),
(4, 'second_club'),
(5, 'trainer'),
(6, 'referee'),
(7, 'administrative');

--
-- Indexes for table `membership_type`
--
ALTER TABLE `membership_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `membership_type`
--
ALTER TABLE `membership_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
