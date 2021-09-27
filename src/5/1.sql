CREATE TABLE users (
    id          int unsigned,
    lastname    varchar(55),
    firstname   varchar(55),
    middlename  varchar(55),
    birthday    date,
    email       varchar(55),
    phone       varchar(20),
    gender      enum('male', 'female', 'other')
);