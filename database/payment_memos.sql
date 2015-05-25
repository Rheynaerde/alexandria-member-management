--
-- Table structure for table `payment_memos`
--

CREATE TABLE IF NOT EXISTS `payment_memos` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `giro_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `payment_memos`
--
ALTER TABLE `payment_memos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `due_date` (`due_date`),
  ADD KEY `is_paid` (`is_paid`),
  ADD KEY `is_cancelled` (`is_cancelled`);

--
-- AUTO_INCREMENT for table `payment_memos`
--
ALTER TABLE `payment_memos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
