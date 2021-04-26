Create DATABASE moneyz;

USE moneyz;

CREATE TABLE tbluser(
    user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    created_at DATETIME current_timestamp(),
    updated_at DATETIME current_timestamp()
);

CREATE TABLE tblmoneyz(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    user_id INT,
    Moneyz INT,
    FOREIGN KEY(user_id) REFERENCES tbluser(user_id)
);