create database my_website_data;
use my_website_data;

create table users (
rollnumber varchar(8) primary key,
username varchar(100) not null,
contact varchar(30) not null,
password varchar(20) not null);



insert into users
values ('p17-6148','iqra fakhar',03156124599,'iqrafakhar');




create table gallaries (
roll varchar(8) not null,
imageID varchar(30) NOT NULL UNIQUE
);


insert into gallaries
values ('p17-6148','p17-6148-rose.jpg');


