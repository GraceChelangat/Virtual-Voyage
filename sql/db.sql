DROP DATABASE IF EXISTS `virtualvoyage`;
CREATE DATABASE IF NOT EXISTS `virtualvoyage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `virtualvoyage`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` text DEFAULT NULL,
  `confirm_password` text DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateupdated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `users`;

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `confirm_password`, `datecreated`, `dateupdated`) VALUES
(1, 'alex', 'alex@yahoo.com', 'ygfdc', 'ygfdc', '2024-06-17 11:40:15', '2024-06-17 11:40:15'),