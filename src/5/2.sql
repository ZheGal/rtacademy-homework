-- 1.
CREATE TABLE users (
    id          int unsigned NOT NULL AUTO_INCREMENT,
    lastname    varchar(55) NOT NULL,
    firstname   varchar(55) NOT NULL,
    middlename  varchar(55) NOT NULL,
    birthday    date,
    email       varchar(55) NOT NULL,
    phone       varchar(20) NOT NULL,
    gender      enum('male', 'female', 'other') NOT NULL,
    PRIMARY KEY ( id ),
    UNIQUE ( email ),
    CHECK ( length(firstname) > 2 ),
    CHECK ( length(lastname) > 2 ),
    CHECK ( length(middlename) > 2 ),
    CHECK ( birthday >= '1920-01-01' ),
    CHECK ( length(email) > 6 ),
    CHECK ( length(phone) > 5 )
);

-- 2.
CREATE TABLE users2 (
    id          int unsigned NOT NULL,
    lastname    varchar(55) NOT NULL,
    firstname   varchar(55) NOT NULL,
    middlename  varchar(55) NOT NULL,
    birthday    date,
    email       varchar(55) NOT NULL,
    phone       varchar(20) NOT NULL,
    gender      enum('male', 'female', 'other') NOT NULL
);
ALTER TABLE users2 CHANGE id id int unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE users2 ADD CONSTRAINT PRIMARY KEY ( id );
ALTER TABLE users2 ADD CONSTRAINT UNIQUE ( email );
ALTER TABLE users2 ADD CONSTRAINT CHECK ( length(firstname) > 2 );
ALTER TABLE users2 ADD CONSTRAINT CHECK ( length(lastname) > 2 );
ALTER TABLE users2 ADD CONSTRAINT CHECK ( length(middlename) > 2 );
ALTER TABLE users2 ADD CONSTRAINT CHECK ( birthday >= '1920-01-01' );
ALTER TABLE users2 ADD CONSTRAINT CHECK ( length(email) > 6 );
ALTER TABLE users2 ADD CONSTRAINT CHECK ( length(phone) > 5 );