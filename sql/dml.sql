INSERT INTO Users (firstName, lastName, email) VALUES ('John', 'Doe', 'johndoe@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Jane', 'Smith', 'janesmith@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Emily', 'Jones', 'emilyjones@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Michael', 'Brown', 'michaelbrown@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Sarah', 'Davis', 'sarahdavis@example.com');


INSERT INTO Posts (userID, title, content) VALUES (1, 'My First Post', 'This is the content of my first post.');
INSERT INTO Posts (userID, title, content) VALUES (2, 'My Second Post', 'This is the content of my second post.');
INSERT INTO Posts (userID, title, content) VALUES (3, 'My Third Post', 'This is the content of my third post.');
INSERT INTO Posts (userID, title, content) VALUES (4, 'My Fourth Post', 'This is the content of my fourth post.');
INSERT INTO Posts (userID, title, content) VALUES (5, 'My Fifth Post', 'This is the content of my fifth post.');


INSERT INTO Comments (postID, userID, comment) VALUES (1, 2, 'Great post!');
INSERT INTO Comments (postID, userID, comment) VALUES (1, 3, 'Thanks for sharing.');
INSERT INTO Comments (postID, userID, comment) VALUES (2, 1, 'Interesting perspective.');
INSERT INTO Comments (postID, userID, comment) VALUES (3, 4, 'I learned a lot from this.');
INSERT INTO Comments (postID, userID, comment) VALUES (4, 5, 'Looking forward to more posts.');
