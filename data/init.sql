CREATE DATABASE IF NOT EXISTS socialnetwork;

use socialnetwork;

CREATE TABLE IF NOT EXISTS users (
	user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	user_name VARCHAR(30) NOT NULL,
	user_pass VARCHAR(255) NOT NULL,
	user_email VARCHAR(50) NOT NULL,
	user_currentpicture VARCHAR(10) NOT NULL DEFAULT 'dog'
);

CREATE TABLE IF NOT EXISTS posts (
	post_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	poster_id VARCHAR(30) NOT NULL,
	post_content VARCHAR(255) NOT NULL,
	post_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS friends (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT(11) NOT NULL,
	friend_id INT(11) NOT NULL
);
