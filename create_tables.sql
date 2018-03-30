SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `Income` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `is_planned` tinyint(1) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Outcome` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `is_planned` tinyint(1) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `saves` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `Income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type_id` (`type_id`);

ALTER TABLE `Outcome`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type_id` (`type_id`);

ALTER TABLE `Type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `Income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `Type` (`id`);

ALTER TABLE `Outcome`
  ADD CONSTRAINT `outcome_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `outcome_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `Type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
