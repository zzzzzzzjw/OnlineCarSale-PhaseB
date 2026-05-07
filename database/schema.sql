-- Create database with UTF-8 support
CREATE DATABASE IF NOT EXISTS online_car_sale 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE online_car_sale;

-- Drop existing tables to avoid conflicts
DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS sellers;

-- Sellers table: stores registered seller information
CREATE TABLE sellers (
    seller_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_username (username),
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Cars table: stores advertised vehicle details
CREATE TABLE cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    seller_id INT NOT NULL,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year YEAR NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    colour VARCHAR(30),        
    location VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id),
    INDEX idx_car_search (model, year),
    INDEX idx_seller_id (seller_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;