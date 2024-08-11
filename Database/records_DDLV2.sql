CREATE DATABASE records;

CREATE TABLE users (
	user_id int AUTO_INCREMENT,
	email varchar(255),
	username varchar(255),
	password varchar(255),
	PRIMARY KEY (user_id) 
);

CREATE TABLE songs (
	song_id int AUTO_INCREMENT,
	song_name varchar(255),
	artist varchar(255),
	genre varchar(255),
	PRIMARY KEY (song_id)
);