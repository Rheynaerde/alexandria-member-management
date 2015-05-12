--
-- Table structure for table `certificate_type`
--

CREATE TABLE IF NOT EXISTS `certificate_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `certificate_type` (`id`, `name`) VALUES
(1, 'medical'),
(2, 'non_active_administrative'),
(3, 'non_active_referee'),
(4, 'non_active_trainer');

--
-- Indexes for table `certificate_type`
--
ALTER TABLE `certificate_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `certificate_type`
--
ALTER TABLE `certificate_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
