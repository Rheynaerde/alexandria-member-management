--
-- Table structure for table `mailaddresses`
--

CREATE TABLE IF NOT EXISTS `mailaddresses` (
  `id` int(11) NOT NULL,
  `mailaddress` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `mailaddresses`
--
ALTER TABLE `mailaddresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `mailaddresses`
--
ALTER TABLE `mailaddresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
