CREATE TABLE registrations (
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    registration_number VARCHAR(11) NOT NULL,
    birth_date DATE NOT NULL,
    registered_at DATE NOT NULL
);