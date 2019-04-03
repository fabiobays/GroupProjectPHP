DROP DATABASE IF EXISTS GroupProject;
CREATE DATABASE GroupProject;
USE GroupProject;

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) NOT NULL UNIQUE,
  password varchar(255) NOT NULL
);
