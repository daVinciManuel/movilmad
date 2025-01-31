USE movilmad;
DROP TABLE IF EXISTS topsecret;
CREATE TABLE topsecret ( idcliente integer(5) not null, clave varchar(100) not null) ENGINE=InnoDB;
ALTER TABLE topsecret ADD CONSTRAINT pk_topsecret PRIMARY KEY (idcliente);
ALTER TABLE topsecret ADD CONSTRAINT fk_topsecret FOREIGN KEY (idcliente) references rclientes(idcliente);
