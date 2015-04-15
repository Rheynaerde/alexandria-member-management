-- 
-- Creates table that connects users to members.
-- 

CREATE TABLE IF NOT EXISTS `user_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Records which users can manage which members';

-- Set the indices for this table
ALTER TABLE `user_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `type_id` (`type_id`);

-- id should auto-increment
ALTER TABLE `user_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Adding constraints
ALTER TABLE `user_member`
  ADD CONSTRAINT `um_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `um_type` FOREIGN KEY (`type_id`) REFERENCES `user_member_type` (`id`),
  ADD CONSTRAINT `um_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
