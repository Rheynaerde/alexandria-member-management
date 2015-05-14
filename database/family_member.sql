--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_id` (`family_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for table `family_member`
--
ALTER TABLE `family_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `family_member`
--
ALTER TABLE `family_member`
  ADD CONSTRAINT `fm_family` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`),
  ADD CONSTRAINT `fm_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

