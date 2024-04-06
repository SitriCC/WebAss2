CREATE DATABASE cst8285;
GRANT USAGE ON *.* TO cst8285@localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON cst8285.* TO cst8285@localhost;
FLUSH PRIVILEGES;

USE cst8285;

CREATE TABLE Users (
                       userID INT AUTO_INCREMENT PRIMARY KEY,
                       firstName VARCHAR(50) ,
                       lastName VARCHAR(50) ,
                       email VARCHAR(255) ,
                       createdTime DATETIME DEFAULT CURRENT_TIMESTAMP
);
 
CREATE TABLE Blogs (
                       blogID INT AUTO_INCREMENT PRIMARY KEY,
                       userID INT,
                       title VARCHAR(255) ,
                       content TEXT ,
                       createdTime DATETIME DEFAULT CURRENT_TIMESTAMP,
                       updatedTime DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Comments (
                          commentsID INT AUTO_INCREMENT PRIMARY KEY,
                          blogID INT,
                          userID INT,
                          comment TEXT ,
                          createdTime DATETIME DEFAULT CURRENT_TIMESTAMP
);
