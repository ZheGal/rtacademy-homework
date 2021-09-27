CREATE TABLE `comments_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

CREATE TABLE `users_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

CREATE TABLE `posts_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

----------------------------------------------------------------

CREATE TABLE `posts_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
);

CREATE TABLE `posts_covers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(128) NOT NULL,
  `alt` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`)
);

CREATE TABLE `posts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
);

CREATE TABLE `website_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `href` varchar(255) NOT NULL,
  `order` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
);

----------------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`),
  FOREIGN KEY (`role_id`) REFERENCES `users_roles` (`id`),
  FOREIGN KEY (`status_id`) REFERENCES `users_statuses` (`id`)
);

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `publish_date` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `posts_categories` (`id`),
  FOREIGN KEY (`cover_id`) REFERENCES `posts_covers` (`id`),
  FOREIGN KEY (`status_id`) REFERENCES `posts_statuses` (`id`)
);

CREATE TABLE `posts_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `comment` text NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  FOREIGN KEY (`status_id`) REFERENCES `comments_statuses` (`id`)
);

CREATE TABLE `posts_to_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`, `tag_id`),
  FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  FOREIGN KEY (`tag_id`) REFERENCES `posts_tags` (`id`)
);

----------------------------------------------------------------

ALTER TABLE `comments_statuses` AUTO_INCREMENT=101;
ALTER TABLE `posts_statuses` AUTO_INCREMENT=201;
ALTER TABLE `users_statuses` AUTO_INCREMENT=301;
ALTER TABLE `users_roles` AUTO_INCREMENT=401;

----------------------------------------------------------------

INSERT INTO `comments_statuses` (`name`, `title`)
VALUES
    ('active', 'Активний'),
    ('notmoderated', 'Не відмодерований'),
    ('deleted', 'Видалений');

INSERT INTO `posts_statuses` (`name`, `title`)
VALUES
    ('active', 'Активний'),
    ('notactive', 'Неактивний'),
    ('deleted', 'Видалений');

INSERT INTO `users_statuses` (`name`, `title`)
VALUES
    ('active', 'Активний'),
    ('notactive', 'Неактивний'),
    ('deleted', 'Видалений');

INSERT INTO `users_roles` (`name`, `title`)
VALUES
    ('user', 'Користувач'),
    ('administrator', 'Адміністратор');