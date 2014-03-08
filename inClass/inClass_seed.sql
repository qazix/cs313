create database scriptures;
use database scriptures;

create table scriptures (
id INT NOT NULL AUTO_INCREMENT,
book VARCHAR(20),
chapter INT,
verse INT,
content VARCHAR(1024));

INSERT INTO scriptures values (
NULL,
'John',
1,
5,
'And the light shineth in darkness; and the darkness comprehended it not'),
(
NULL,
'D&C',
88,
49,
'The light shineth in the darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
(NULL,
'D&C',
93,
28,
'He that keppeth his commandments recieveth truth and light, until he is glorified in truth and knowleth all things.'),
(NULL,
'Mosiah',
16,
9,
'He is the light  and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');