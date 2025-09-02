CREATE TABLE users (
id BIGSERIAL PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
mobile_number VARCHAR(20) NOT NULL,
ide_number VARCHAR(15) NULL UNIQUE,
address TEXT NULL,
birthday DATE NULL,
email VARCHAR(200) NOT NULL UNIQUE,
password TEXT NOT NULL,
status BOOLEAN NOT NULL DEFAULT TRUE,
created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
deleted_at TIMESTAMPTZ NULL
);


insert into users (firstname, lastname, mobile_number, email, password) values ('Alan','Reyes','3223458745','alan@gmail.com','1234')