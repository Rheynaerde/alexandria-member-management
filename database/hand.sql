--
-- Table structure for table `hand`
--

CREATE TABLE IF NOT EXISTS `hand` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL COMMENT 'right, left or unset'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hand`
--

INSERT INTO `hand` (`id`, `name`) VALUES
(1, 'right'),
(2, 'left'),
(3, 'unset');

--
-- Indexes for table `hand`
--

ALTER TABLE `hand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `hand`
-- The auto-increment starts with 4, since we already inserted 1, 2 and 3.
--

ALTER TABLE `hand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
