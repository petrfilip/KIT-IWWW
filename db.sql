create table blog_post
(
    id           int auto_increment primary key,
    image        varchar(120)  not null,
    heading      varchar(120)  not null,
    text         text          null,
    read_counter int default 0 not null
);

create table iwww
(
    id      int auto_increment primary key,
    name    varchar(50) not null,
    email   varchar(70) not null,
    message text        not null
);

