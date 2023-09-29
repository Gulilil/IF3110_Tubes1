CREATE TABLE IF NOT EXISTS client
(
    client_id SERIAL PRIMARY KEY NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    admin_status BOOLEAN NOT NULL,
    birthdate DATE,
    biography TEXT,
    image VARCHAR(255)
);