CREATE DATABASE senior_project
USE senior_project

CREATE TABLE users (
	id 			INTEGER 	NOT NULL AUTO_INCREMENT,
	gid 			int(11) DEFAULT 0,
	username 		VARCHAR(20) NOT NULL,
	password 		VARCHAR(20) NOT NULL,
	token 			VARCHAR(32) NOT NULL,
	email 			VARCHAR(20) NOT NULL,
	first_name 		VARCHAR(20),
	middle_name 	VARCHAR(20),
	last_name 		VARCHAR(20),
	phone_number 	VARCHAR(20),
	street_address 	VARCHAR(20),
	city 			VARCHAR(20),
	state 			VARCHAR(20),
	zip_code 		VARCHAR(20),
	PRIMARY KEY(id),
	UNIQUE(username),
	UNIQUE(email)
);

CREATE TABLE companies (
	id			INTEGER 	NOT NULL AUTO_INCREMENT,
	name		VARCHAR(20) NOT NULL,
	description	VARCHAR(20) NOT NULL,
	employer	INTEGER		NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (employer) REFERENCES users(id),
	UNIQUE(name, employer)
);

CREATE TABLE groups(
	id			INTEGER		NOT NULL	AUTO_INCREMENT,
	company		INTEGER		NOT NULL,
	name		VARCHAR(20)	NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (company) REFERENCES companies(id),
	UNIQUE(company, name)
);

CREATE TABLE statuses(
	id		INTEGER		NOT NULL	AUTO_INCREMENT,
	company	INTEGER		NOT NULL,
	name	VARCHAR(20)	NOT NULL,
	PRIMARY KEY(id),
	UNIQUE(company, name)
);

CREATE TABLE employees (
	company		INTEGER			NOT NULL,
	user_id		INTEGER			NOT NULL,
	group_id	INTEGER			NOT NULL,
	pay_rate	DECIMAL(19,4)	NOT NULL,
	status_id	INTEGER			NOT NULL,
	FOREIGN KEY (company)	REFERENCES companies(id),
	FOREIGN KEY (user_id)	REFERENCES users(id),
	FOREIGN KEY (group_id)	REFERENCES groups(id),
	FOREIGN KEY (status_id)	REFERENCES statuses(id)
);

CREATE TABLE punch_types (
	id			INTEGER		NOT NULL	AUTO_INCREMENT,
	company 	INTEGER		NOT NULL,
	name		VARCHAR(20)	NOT NULL,
	punch_type	INTEGER		NOT NULL,
	PRIMARY KEY(id),
	UNIQUE(company, name),
	FOREIGN KEY (company) REFERENCES companies(id)
);
INSERT INTO punch_types (company, name, punch_type) VALUES (0, "Clock-In", 1);
INSERT INTO punch_types (company, name, punch_type) VALUES (0, "Clock-Out", 0);

CREATE TABLE punch_records (
	id			INTEGER		NOT NULL	AUTO_INCREMENT,
	user_id		INTEGER		NOT NULL,
	company		INTEGER		NOT NULL,
	time_stamp	INTEGER		NOT NULL,
	punch		INTEGER		NOT NULL,
	ip_address	VARCHAR(32),
	latitude	FLOAT(10,6),
	longitude	FLOAT(10,6),
	PRIMARY KEY(id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (company) REFERENCES companies(id),
	FOREIGN KEY (punch) REFERENCES punch_types(id)
);
INSERT INTO punch_records (user_id, company, time_stamp, punch, ip_address, latitude, longitude) VALUES (1, 2, 3, 1, "207.132,182,105", 111.11, 222.22);
INSERT INTO punch_records (user_id, company, time_stamp, punch, ip_address, latitude, longitude) VALUES (1, 2, 4, 2, "207.132,182,105", 333.33, 444.44);

CREATE TABLE verification (
	company		INTEGER		NOT NULL,
	user_id		INTEGER		NOT NULL,
	status		INTEGER		NOT NULL,
	FOREIGN KEY (company) REFERENCES companies(id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	UNIQUE(company, user_id)
);