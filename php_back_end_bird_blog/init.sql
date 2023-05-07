DROP DATABASE IF EXISTS birddb;
CREATE DATABASE birddb;
USE birddb;
CREATE TABLE post(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(300) NOT NULL,
  author VARCHAR(100) not null,
  body VARCHAR(5000) not null,
  categroy VARCHAR(100) not null
);

INSERT INTO `post` (`title`, `author`, `body`, `categroy`) VALUES ('test title', 'test author', 'test body', 'test');

INSERT INTO `post` (`title`, `author`, `body`, `categroy`) VALUES ('test title 2', 'test author 2', 'test body 2', 'test 2');

INSERT INTO `post` (`title`, `author`, `body`, `categroy`) VALUES ('test title 3', 'test author 3', 'test body 3', 'test 3');