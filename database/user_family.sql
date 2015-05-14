-- 
-- Creates table that connects users to families.
-- 

CREATE TABLE IF NOT EXISTS `user_family` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Records which users can manage which families';

-- Set the indices for this table
ALTER TABLE `user_family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `family_id` (`family_id`);

-- id should auto-increment
ALTER TABLE `user_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Adding constraints
ALTER TABLE `user_family`
  ADD CONSTRAINT `uf_family` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`),
  ADD CONSTRAINT `uf_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
