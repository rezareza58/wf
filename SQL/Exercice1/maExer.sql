 CREATE DATABASE test CHARACTER SET utf8 COLLATE utf8_bin;
 USE test;
 CREATE TABLE roles (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    lable VARCHAR(100)

);