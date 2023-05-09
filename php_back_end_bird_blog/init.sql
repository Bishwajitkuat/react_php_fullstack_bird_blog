DROP DATABASE IF EXISTS birddb;
CREATE DATABASE birddb;
USE birddb;
CREATE TABLE posts(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(300) NOT NULL,
  author VARCHAR(100) not null,
  body VARCHAR(5000) not null,
  category VARCHAR(100) not null,
  img VARCHAR(300) not null
);

INSERT INTO `posts` (`title`, `author`, `body`, `category`, `img`) VALUES ('test title', 'test author', 'test body', 'test', 'test/img');

INSERT INTO `posts` (`title`, `author`, `body`, `category`, `img`) VALUES ('test2 title', 'test2 author', 'test2 body', 'test2', 'test2/img');

INSERT INTO `posts` (`title`, `author`, `body`, `category`, `img`) VALUES ('test3 title', 'test3 author', 'test3 body', 'test3', 'test3/img');