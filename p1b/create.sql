CREATE TABLE Movie(id int NOT NULL, title varchar(100) NOT NULL, year int NOT NULL, rating varchar(10), company varchar(50), PRIMARY KEY(id), CHECK(id > 0)) ENGINE=InnoDB;

CREATE TABLE Actor(id int NOT NULL, last varchar(20) NOT NULL, first varchar(20) NOT NULL, sex varchar(6) NOT NULL, dob DATE NOT NULL, dod DATE, PRIMARY KEY(id), CHECK(dod is NULL OR dob < dod)) ENGINE=InnoDB;

CREATE TABLE Director(id int NOT NULL, last varchar(20) NOT NULL, first varchar(20) NOT NULL, dob DATE NOT NULL, dod DATE, PRIMARY KEY (id), CHECK(dod is NULL OR dob < dod)) ENGINE=InnoDB;

CREATE TABLE MovieGenre(mid int NOT NULL, genre varchar(20), PRIMARY KEY(mid, genre), FOREIGN KEY(mid) REFERENCES Movie(id)) ENGINE=InnoDB;

CREATE TABLE MovieDirector(mid INT NOT NULL, did int NOT NULL, FOREIGN KEY(mid) REFERENCES Movie(id))ENGINE=InnoDB;

CREATE TABLE MovieActor(mid INT NOT NULL, aid int NOT NULL, role varchar(50), FOREIGN KEY(mid) REFERENCES Movie(id))ENGINE=InnoDB;

CREATE TABLE Review(name varchar(20) NOT NULL, time timestamp NOT NULL, mid int NOT NULL, rating intNOT NULL, comment varchar(500), FOREIGN KEY(mid) REFERENCES Movie(id))ENGINE=InnoDB;
