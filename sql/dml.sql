INSERT INTO Users (username, password, email) VALUES ('user1', 'password1', 'user1@example.com');
INSERT INTO Posts (user_id, title, content) VALUES (1, 'My First Blog Post', 'This is the content of my first blog post.');
INSERT INTO Comments (post_id, user_id, comment) VALUES (1, 1, 'This is a comment on the first post.');
