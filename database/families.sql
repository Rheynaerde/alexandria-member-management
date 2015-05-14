--
-- Table structure for table `families`
--

CREATE TABLE IF NOT EXISTS `families` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
