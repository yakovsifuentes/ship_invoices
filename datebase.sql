CREATE DATABASE IF NOT EXISTS bd_station;
USE bd_station;

CREATE TABLE means_transport(
	id int(255) auto_increment not null,
	name varchar(255) not null,
	name_unity varchar(255),
	CONSTRAINT pk_means_transport PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE price_ralway(
	id int(255) auto_increment not null,
	price float not null,
	created_at datetime not null,
	CONSTRAINT pk_price_ralway PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE price_ship(
	id int(255) auto_increment not null,
	price float not null,
	created_at datetime not null,
	CONSTRAINT pk_price_ship PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE discount_ship(
	id int(255) auto_increment not null,
	discount float not null,
	created_at datetime not null,
	CONSTRAINT pk_discount PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE invoices(
	id int(255) auto_increment not null,
	qty_unity int(255) not null,
	transport_id int(255) not null,
	price_ship_id int(255),
	price_ralway_id int(255),
	discount_id int(255) not null,
	total float not null,
	created_at datetime not null,
	CONSTRAINT pk_invoice PRIMARY KEY(id),
	CONSTRAINT fk_invoices_means_transport FOREIGN KEY(transport_id) REFERENCES means_transport(id),
	CONSTRAINT fk_invoices_price_ship FOREIGN KEY(price_ship_id) REFERENCES price_ship(id),
	CONSTRAINT fk_invoices_price_ralway FOREIGN KEY(price_ralway_id) REFERENCES price_ralway(id),
	CONSTRAINT fk_invoices_discount_ship FOREIGN KEY(discount_id) REFERENCES discount_ship(id)
 )ENGINE=InnoDb;