--
-- Table structure for table `transition_state`
--

CREATE TABLE IF NOT EXISTS `transition_state` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transition_state`
--

INSERT INTO `transition_state` (`id`, `name`) VALUES
(1, 'created'),
(2, 'initiated'),
(3, 'active'),
(4, 'completed'),
(5, 'archived');

--
-- Indexes for table `transition_state`
--
ALTER TABLE `transition_state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `transition_state`
--
ALTER TABLE `transition_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
