USE 'mynote';
--管理员表
CREATE TABLE 'mynote_admin'(
'id' tinyint unsigned auto_increment key,
'username' varchar(20) not null unique,
'password' char(32) not null
);

DROP TABLE IF EXISTS 'mynote_article';
create table 'mynote_article'(
'id' int unsigned auto_increment key,
'atitle' varchar(20) not null unique,
'acontent' text not null,
'atime' date 
);