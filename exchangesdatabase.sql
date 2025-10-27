CREATE DATABASE IF NOT EXISTS exchanges;
USE exchanges;

CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL UNIQUE,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password VARCHAR(255) NOT NULL,
	verified TINYINT(1) DEFAULT 0,
	admin TINYINT(1) DEFAULT 0,
	pfp LONGBLOB NOT NULL
);

CREATE TABLE IF NOT EXISTS posts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	description TEXT NOT NULL,
	user_id INT NOT NULL,
	photo LONGBLOB,
	FOREIGN KEY (user_id) REFERENCES users(id),
	category ENUM('Vestimentas', 'Herramientas', 'Accesorios', 'Cocina', 'Tecnología', 'Fitness y deporte', 'Belleza', 'Entrenamiento', 'Hogar y muebles') NOT NULL,
	status ENUM('available', 'exchanged', 'removed') DEFAULT 'available',
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS photos(
	id_photos INT AUTO_INCREMENT PRIMARY KEY,
	photo LONGBLOB NOT NULL,
	post_id INT NOT NULL,
	FOREIGN KEY (post_id) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS chats (
	id_chat INT AUTO_INCREMENT PRIMARY KEY,
	user1_id INT NOT NULL,
	user2_id INT NOT NULL,
	FOREIGN KEY (user1_id) REFERENCES users(id),
	FOREIGN KEY (user2_id) REFERENCES users(id),
	UNIQUE KEY unique_chat (user1_id, user2_id)
);

CREATE TABLE IF NOT EXISTS messages(
	id_message INT AUTO_INCREMENT PRIMARY KEY,
	chat_id INT NOT NULL,
	sender_id INT NOT NULL,
	message TEXT NOT NULL,
	timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (chat_id) REFERENCES chats(id_chat),
	FOREIGN KEY (sender_id) REFERENCES users(id)
);

