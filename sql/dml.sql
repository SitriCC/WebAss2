INSERT INTO Users (firstName, lastName, email) VALUES ('John', 'Doe', 'johndoe@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Jane', 'Smith', 'janesmith@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Emily', 'Jones', 'emilyjones@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Michael', 'Brown', 'michaelbrown@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Sarah', 'Davis', 'sarahdavis@example.com');


INSERT INTO PostBlogs (userID, title, content) VALUES (1, 'My First PostBlog', 'This is the content of my first PostBlog.');
INSERT INTO PostBlogs (userID, title, content) VALUES (2, 'My Second PostBlog', 'This is the content of my second PostBlog.');
INSERT INTO PostBlogs (userID, title, content) VALUES (3, 'My Third PostBlog', 'This is the content of my third PostBlog.');
INSERT INTO PostBlogs (userID, title, content) VALUES (4, 'My Fourth PostBlog', 'This is the content of my fourth PostBlog.');
INSERT INTO PostBlogs (userID, title, content) VALUES (5, 'My Fifth PostBlog', 'This is the content of my fifth PostBlog.');


INSERT INTO Comments (PostBlogID, userID, comment) VALUES (1, 2, 'Great PostBlog!');
INSERT INTO Comments (PostBlogID, userID, comment) VALUES (1, 3, 'Thanks for sharing.');
INSERT INTO Comments (PostBlogID, userID, comment) VALUES (2, 1, 'Interesting perspective.');
INSERT INTO Comments (PostBlogID, userID, comment) VALUES (3, 4, 'I learned a lot from this.');
INSERT INTO Comments (PostBlogID, userID, comment) VALUES (4, 5, 'Looking forward to more PostBlogs.');
