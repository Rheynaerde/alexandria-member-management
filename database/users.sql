-- 
-- Creates table that stores the user of the website
-- 

CREATE TABLE IF NOT EXISTS `users` (
        `id` int(10) unsigned NOT NULL,
        `email` varchar(45) DEFAULT NULL,
        `firstName` varchar(45) DEFAULT NULL,
        `lastName` varchar(45) DEFAULT NULL,
        `username` varchar(45) NOT NULL,
        `password` varchar(45) NOT NULL,
        `isAdmin` tinyint(1)  NOT NULL DEFAULT '0',
        `hasMemberManagementRights` tinyint(1) NOT NULL DEFAULT '0'
);

-- Set the indices for this table
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

-- id should auto-increment
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
