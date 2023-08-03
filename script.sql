create database udemyphp;
use udemyphp;

create table users(
id int auto_increment primary key,
nome varchar(100),
sobrenome varchar(100),
email varchar(100) unique,
password varchar(255)
);

insert into users(nome,sobrenome,email,password)
values('odair','farias','email@email.com','12345678');