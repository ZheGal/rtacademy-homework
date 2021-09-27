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

----------------------------------------------------------------

INSERT INTO helloworld.users (id,lastname,firstname,middlename,birthday,email,phone,gender) VALUES
	 (1,'Назаров','Семен','Демидович','1991-10-09','naza@mail.com','+380617892239','male'),
	 (2,'Кузнєцова','Анна','Володимирівна','1994-03-09','kuznica@mail.com','+380541374149','female'),
	 (3,'Шестакова','Софія','Андріївна','1989-01-05','shestack@mail.com','+380141578931','female');