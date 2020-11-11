CREATE TABLE usuarios (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(32) NOT NULL,
  senha varchar(90) NOT NULL,
  email varchar (90) NOT NULL,
  avatar varchar(255),
  metas varchar (255),
  atv varchar (100),
  num_follows int(11));

CREATE TABLE follows (
  follow_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  follow_send int(11) NOT NULL,
  follow_recept int(11) NOT NULL);