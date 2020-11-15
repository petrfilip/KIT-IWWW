#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_uindex` (`email`)
) ENGINE=InnoDB;

INSERT INTO `users` (`id`, `name`, `email`, `password`)
VALUES (null, 'Donald Trump', 'donald@example.org', 'orangeIsTheBest');

INSERT INTO `users` (`id`, `name`, `email`, `password`)
VALUES (null, 'Barack Obama', 'barack@example.net', 'USA');

INSERT INTO `users` (`id`, `name`, `email`, `password`)
VALUES (null, 'George Bush', 'g.bush@example.org', 'bush22');

INSERT INTO `users` (`id`, `name`, `email`, `password`)
VALUES (null, 'Bill Clinton', 'bclinton@example.org', 'B1ll');












DROP TABLE IF EXISTS `fixed-users`;

CREATE TABLE `fixed-users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(45) NOT NULL,
                         `email` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
                         `password` char(60) COLLATE utf8_unicode_ci NOT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `users_email_uindex` (`email`)
) ENGINE=InnoDB;

# "heslo" je ten kouzelný řetězec
INSERT INTO `fixed-users` (`id`, `name`, `email`, `password`) VALUES (null, 'Donald Trump', 'donald@example.org', '$2y$10$xGILJ8GUIwDg/sVy0dVZCeodGmmHQ2O6UrQ1QBL4ohFk.a04S2RAK');
INSERT INTO `fixed-users` (`id`, `name`, `email`, `password`) VALUES (null, 'Barack Obama', 'barack@example.net', '$2y$10$xGILJ8GUIwDg/sVy0dVZCeodGmmHQ2O6UrQ1QBL4ohFk.a04S2RAK');
INSERT INTO `fixed-users` (`id`, `name`, `email`, `password`) VALUES (null, 'George Bush', 'g.bush@example.org', '$2y$10$xGILJ8GUIwDg/sVy0dVZCeodGmmHQ2O6UrQ1QBL4ohFk.a04S2RAK');
INSERT INTO `fixed-users` (`id`, `name`, `email`, `password`) VALUES (null, 'Bill Clinton', 'bclinton@example.org', '$2y$10$xGILJ8GUIwDg/sVy0dVZCeodGmmHQ2O6UrQ1QBL4ohFk.a04S2RAK');


