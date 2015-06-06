--
-- Table structure for table `transitions`
--

CREATE TABLE IF NOT EXISTS `transitions` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_cancelled` tinyint(1) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `transitions`
--
ALTER TABLE `transitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_season_transition` (`member_id`,`season_id`),
  ADD KEY `state_id` (`state_id`);

--
-- AUTO_INCREMENT for table `transitions`
--
ALTER TABLE `transitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `transitions`
--
ALTER TABLE `transitions`
  ADD CONSTRAINT `t_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `t_season` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`),
  ADD CONSTRAINT `t_state` FOREIGN KEY (`state_id`) REFERENCES `transition_state` (`id`);
