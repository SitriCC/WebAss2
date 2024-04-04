CREATE DATABASE cst8285;
GRANT USAGE ON *.* TO cst8285@localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON cst8285.* TO cst8285@localhost;
FLUSH PRIVILEGES;

USE cst8285;

CREATE TABLE Users (
                       userID INT AUTO_INCREMENT PRIMARY KEY,
                       firstName VARCHAR(50) NOT NULL,
                       lastName VARCHAR(50) NOT NULL,
                       email VARCHAR(255) NOT NULL,
                       createdTime DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE PostBlogs (
                       postBlogID INT AUTO_INCREMENT PRIMARY KEY,
                       userID INT,
                       title VARCHAR(255) NOT NULL,
                       content TEXT NOT NULL,
                       createdTime DATETIME DEFAULT CURRENT_TIMESTAMP,
                       updatedTime DATETIME ON UPDATE CURRENT_TIMESTAMP,
                       FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Comments (
                          commentsID INT AUTO_INCREMENT PRIMARY KEY,
                          postBlogID INT,
                          userID INT,
                          comment TEXT NOT NULL,
                          createdTime DATETIME DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (postBlogID) REFERENCES PostBlogs(postBlogID),
                          FOREIGN KEY (userID) REFERENCES Users(userID)
);
