# Database Setup (Optional)
# This SQL script creates a database structure for future enhancements

CREATE DATABASE IF NOT EXISTS agri_victorious;
USE agri_victorious;

-- Products Table
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_en VARCHAR(100) NOT NULL,
    name_tl VARCHAR(100) NOT NULL,
    description_en TEXT,
    description_tl TEXT,
    price DECIMAL(10, 2) NOT NULL,
    quantity VARCHAR(20),
    unit_tl VARCHAR(50),
    unit_en VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders Table
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(100) NOT NULL,
    customer_email VARCHAR(100) NOT NULL,
    customer_phone VARCHAR(20),
    address VARCHAR(255),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    status VARCHAR(50) DEFAULT 'pending',
    notes TEXT
);

-- Order Items Table
CREATE TABLE IF NOT EXISTS order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Contact Messages Table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    sent_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    read_status INT DEFAULT 0
);

-- Insert Sample Products
INSERT INTO products (name_en, name_tl, description_en, description_tl, price, quantity, unit_tl, unit_en) VALUES
('NPK Fertilizer (10-10-10)', 'NPK Pataba (10-10-10)', 'Balanced fertilizer for most plants', 'Balansadong pataba para sa karamihan ng halaman', 450, '25kg', 'bawat sako', 'per sack'),
('Organic Compost', 'Organic Compost', 'Organic fertilizer from natural ingredients', 'Organikong pataba mula sa natural na sangkap', 320, '20kg', 'bawat sako', 'per sack'),
('Phosphate Fertilizer', 'Phosphate Fertilizer', 'High phosphorus fertilizer for flowers and fruits', 'Mataas na phosphorus na pataba para sa bulaklak at prutas', 520, '25kg', 'bawat sako', 'per sack'),
('Potassium Fertilizer', 'Potassium Fertilizer', 'High potassium fertilizer for plant strength', 'Mataas na potassium na pataba para sa lakas ng halaman', 480, '25kg', 'bawat sako', 'per sack'),
('Urea Fertilizer (46%)', 'Urea Fertilizer (46%)', 'High nitrogen fertilizer for leafy crops', 'Mataas na nitrogen na pataba para sa berdeng halaman', 380, '25kg', 'bawat sako', 'per sack'),
('Micronutrient Mix', 'Micronutrient Mix', 'Combination of essential micronutrients', 'Kombinasyon ng mahalagang micro-nutrients', 650, '1L', 'bawat botilya', 'per bottle');

-- Note: To use this database setup:
-- 1. Create a new database using this SQL script
-- 2. Update config.php with database credentials
-- 3. Modify the PHP files to connect to the database
-- 4. Replace the static products-data.php with database queries
