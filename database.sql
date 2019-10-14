CREATE DATABASE IF NOT EXISTS vers;


CREATE TABLE IF NOT EXISTS  Username (
    User_id int NOT NULL AUTO_INCREMENT,
    Username varchar(255) NOT NULL,
    Dateofbirth DATETIME,
    Points int,
    PRIMARY KEY (User_id)
);

CREATE TABLE IF NOT EXISTS Badges (
    Badge_id int NOT NULL AUTO_INCREMENT,
    User_id int,
    badge_name varchar(255),
    Lvl varchar(255),
    PRIMARY KEY (Badge_id),
    FOREIGN KEY (User_id) REFERENCES Username(User_id)
);

CREATE TABLE IF NOT EXISTS  Events (
    Event_id int NOT NULL AUTO_INCREMENT,
    User_id int,
    Event_name varchar(255),
    Event_desc varchar(500),
    Address varchar(500),
    Dates DATETIME,
    Event_type varchar(255),
    Price int,
    min_age int,	
    PRIMARY KEY (Event_id),
    FOREIGN KEY (User_id) REFERENCES Username(User_id)
);


CREATE TABLE IF NOT EXISTS Attendance (
    Att_id int NOT NULL AUTO_INCREMENT,
    User_id int,
    Event_id int,
    PRIMARY KEY (Att_id),
    FOREIGN KEY (User_id) REFERENCES Username(User_id),
    FOREIGN KEY (Event_id) REFERENCES Events(Event_id)
);


CREATE TABLE IF NOT EXISTS Comments (
    Comment_id int NOT NULL AUTO_INCREMENT,
    User_id int,
    comment_description varchar(255),
    PRIMARY KEY (Comment_id),
    FOREIGN KEY (User_id) REFERENCES Username(User_id)
);


CREATE TABLE IF NOT EXISTS Question (
    Question_id int NOT NULL AUTO_INCREMENT,
    User_id int,
    answer varchar(255),
    PRIMARY KEY (Question_id),
    FOREIGN KEY (User_id) REFERENCES Username(User_id)
);

CREATE TABLE IF NOT EXISTS Answer (
    Answer_id int NOT NULL AUTO_INCREMENT,
    Question_id int,
    answer varchar(500),
    PRIMARY KEY (Answer_id),
    FOREIGN KEY (Question_id) REFERENCES Question(Question_id)
);

