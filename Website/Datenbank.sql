CREATE DATABASE Products;
CREATE TABLE Products (
    name varchar(255) NOT NULL,
    description TEXT,
    price DECIMAL (10, 2) NOT NULL,
    image_url varchar(255),
);