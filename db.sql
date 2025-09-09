-- Create Categories table
CREATE TABLE IF NOT EXISTS Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);

-- Insert sample categories
INSERT INTO categories (category_name) VALUES
('South Indian'),
('North Indian'),
('Fast Food'),
('Beverages');

-- Create Food Items table
CREATE TABLE IF NOT EXISTS Food_items (
    food_id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- Insert sample food items
INSERT INTO food_items (food_name, price, category_id) VALUES
('Idli', 30.00, 1),
('Dosa', 40.00, 1),
('Vada', 25.00, 1),
('Paneer Butter Masala', 120.00, 2),
('Butter Naan', 20.00, 2),
('Burger', 70.00, 3),
('Fries', 50.00, 3),
('Coffee', 30.00, 4),
('Lassi', 40.00, 4);
