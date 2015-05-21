--
-- Table structure for table `telephone_numbers`
--

CREATE TABLE IF NOT EXISTS `telephone_numbers` (
  `id` int(11) NOT NULL,
  `telephone_number` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `telephone_numbers`
--
ALTER TABLE `telephone_numbers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `telephone_numbers`
--
ALTER TABLE `telephone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
