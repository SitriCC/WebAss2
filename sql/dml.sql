INSERT INTO Users (firstName, lastName, email) VALUES ('John', 'Doe', 'johndoe@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Jane', 'Smith', 'janesmith@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Emily', 'Jones', 'emilyjones@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Michael', 'Brown', 'michaelbrown@example.com');
INSERT INTO Users (firstName, lastName, email) VALUES ('Sarah', 'Davis', 'sarahdavis@example.com');


INSERT INTO Blogs (userID, title, content, imageUrl) VALUES (1, 'First blog', 'This is   First blog  of my first blogThis is the content of my first blogThis is the content of my first blogThconteThis is thelog.',1);
INSERT INTO Blogs (userID, title, content, imageUrl) VALUES (2, 'Second blog', 'This is  Second blo  ofThis is the content ofThis is the content ofThis is the content ofThis is the content of of my seconeeed bl.',2);
INSERT INTO Blogs (userID, title, content, imageUrl) VALUES (3, 'Third blog', 'This is   Third blog  of my thirhe content of my thirhe content of my thirhe content of my thirhe content of my thirhe bleeofffffg .',3);
INSERT INTO Blogs (userID, title, content, imageUrl) VALUES (4, 'Fourth blog', 'This is  Fourth blo  of mys is the content of mys is the content of mys is the content of mys is the content of my foeeeeeeeurth b.',4);
INSERT INTO Blogs (userID, title, content, imageUrl) VALUES (5, 'Fifth blog', 'This is   Fifth blog  of my fifth blogis the content of my fifth blogis the content of my fifth blogis the content of eeeeeeemy fif.',1);


INSERT INTO Comments (BlogID, userID, comment) VALUES (1, 2, 'Great blog!');
INSERT INTO Comments (BlogID, userID, comment) VALUES (1, 3, 'Thanks for sharing.');
INSERT INTO Comments (BlogID, userID, comment) VALUES (2, 1, 'Interesting perspective.');
INSERT INTO Comments (BlogID, userID, comment) VALUES (3, 4, 'I learned a lot from this.');
INSERT INTO Comments (BlogID, userID, comment) VALUES (4, 5, 'Looking forward to more Blogs.');
