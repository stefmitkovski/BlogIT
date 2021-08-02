<?php
require_once 'database.php';

$pdo->exec('CREATE TABLE IF NOT EXISTS users(
    username varchar(255) PRIMARY KEY,
    name varchar(255) NOT NULL,
    surname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(60) NOT NULL,
    image varchar(2048),
    created_at DATETIME
);');

$pdo->exec('CREATE TABLE IF NOT EXISTS posts(
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(50) NOT NULL,
    body varchar(255) NOT NULL,
    created_date DATETIME,
    created_by varchar(255),
    FOREIGN KEY (created_by) REFERENCES users(username)
    ON DELETE CASCADE
    )');

$pdo->exec('CREATE TABLE IF NOT EXISTS PostImages(
    id int PRIMARY KEY,
    postid int not null,
    image varchar(2048),
    FOREIGN KEY (postid) REFERENCES posts(id)
    ON DELETE CASCADE
    )');

$pdo->exec('CREATE TABLE IF NOT EXISTS likes(
    id int PRIMARY KEY,
    postid int not null,
    liked_by varchar(255) not null,
    FOREIGN KEY (postid) REFERENCES posts (id)
    ON DELETE CASCADE,
    FOREIGN KEY (liked_by) REFERENCES users (username)
    ON DELETE CASCADE
    )');

?>