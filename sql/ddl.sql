CREATE DATABASE cst8285;
GRANT USAGE ON *.* TO cst8285@localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON cst8285.* TO cst8285@localhost;
FLUSH PRIVILEGES;

USE cst8285;

CREATE TABLE Users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       email VARCHAR(255) NOT NULL,
                       created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Posts (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       user_id INT,
                       title VARCHAR(255) NOT NULL,
                       content TEXT NOT NULL,
                       created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                       updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
                       FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Comments (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          post_id INT,
                          user_id INT,
                          comment TEXT NOT NULL,
                          created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (post_id) REFERENCES Posts(id),
                          FOREIGN KEY (user_id) REFERENCES Users(id)
);
