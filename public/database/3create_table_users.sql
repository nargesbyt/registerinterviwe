CREATE TABLE IF NOT EXISTS `users` (
    id int auto_increment PRIMARY KEY,
    name varchar(255),
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL
);
