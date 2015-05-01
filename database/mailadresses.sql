--
-- Table structure for table `mailadresses`
--

CREATE TABLE IF NOT EXISTS `mailadresses` (
  `id` int(11) NOT NULL,
  `mailaddress` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `mailadresses`
--
ALTER TABLE `mailadresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `mailadresses`
--
ALTER TABLE `mailadresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
