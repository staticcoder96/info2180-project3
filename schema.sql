CREATE DATABASE ChepoMail;

CREATE TABLE User (
'id' int(11) NOT NULL primary key AUTO_INCREMENT,
'firstname' char(20) NOT NULL default '',
'lastname' char(20) NOT NULL default '',
'username' char(10) NOT NULL default '',
'password' char(11) NOT NULL default ''
);

CREATE TABLE Message (
'id' int (11) NOT NULL primary key AUTO_INCREMENT,
'recipient_ids' int (11) NOT NULL  $_SESSION['register'],
'user_id' int(11) NOT NULL $_SESSION['username'],
'subject' char(20) NOT NULL default'',
'body' char (50) NOT NULL default '',
'date_sent' char (20) NOT NULL default '',
);

CREATE TABLE Message_read (
'id' int (11) NOT NULL primary key AUTO_INCREMENT,
'message_id' int(11) NOT NULL AUTO_INCREMENT,
'reader_id' int(11) NOT NULL AUTO_INCREMENT,
'date' int(20) NOT NULL,
);