CREATE DATABASE IF NOT EXISTS whogoesfirst;

CREATE TABLE IF NOT EXISTS `users`
(
  `id`   INT(11) AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `chosen`
(
  `user_id`   INT(11) NOT NULL,
  `chosen_on` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`, `chosen_on`),
  FOREIGN KEY chosen_user_id (`user_id`) REFERENCES `users` (`id`)
)
  ENGINE = InnoDB;