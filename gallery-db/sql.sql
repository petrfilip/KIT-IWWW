create table gallery_db
(
    id           int auto_increment primary key,
    image        longblob    not null,
    image_format varchar(20) not null
);


