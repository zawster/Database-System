create database university2;

use university2;

CREATE TABLE users(
	uid VARCHAR(20),
	name VARCHAR(50),
	f_name VARCHAR(50),
	gender VARCHAR(10),
	contact VARCHAR(20),
	password VARCHAR(20)
);

CREATE TABLE images(
	uid VARCHAR(20),
	imgName VARCHAR(30),
	path VARCHAR(100)
);