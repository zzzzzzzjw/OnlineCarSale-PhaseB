-- Add 4 real sellers
INSERT IGNORE INTO sellers (seller_id, username, password_hash, full_name, email, address, phone) VALUES
(1, 'HiReza', '$2y$10$dQlRdKJTEaBbCqrIIwNS.eBln9687acZcesZl2BN869RNvi3IGYUi', 'HiReza', 'www123456@gmail.com', 'Hainan', '12345678900'),
(2, 'HiXifei', '$2y$10$ev8Ju0.ST03vEaTg5hu.j.txnFb6/rjYP285vNfI4WdcAGAQQzeXe', 'HiXifei', 'wuxifei123456@gmail.com', 'Hainan', '18907980421'),
(3, 'HiZiyi', '$2y$10$Rqux4VF3B67Mr2QXhPnVZOsr.YGQEPld2L1VXYExotwQKXsdEZJ4q', 'HiZiyi', 'ziyi123456@gmail.com', 'Hainan', '12345678901'),
(4, 'HiJingwen', '$2y$10$2nIGpnQzg4/fwmVubU9hueC3LduDxY0TyGWyi3KhZW0Udxfx6JqZ.', 'HiJingwen', 'jingwen123456@gmail.com', 'Hainan', '12345678902');

-- Add DemoShowroom seller
INSERT IGNORE INTO sellers (seller_id, username, password_hash, full_name, email, address, phone) VALUES
(5, 'DemoShowroom', '$2y$10$demodemodemodemodemodemodemoDemoDemoDemoDemoDemoDe', 'Demo Showroom', 'demo@automarket.com', 'Showroom', '00000000000');

-- Add 6 demo cars under DemoShowroom
INSERT INTO cars (seller_id, model, year, price, colour, location, image_url) VALUES
(5, 'Tesla Model S', 2023, 350000, 'Red', 'Beijing', '../images/TESLA_S.png'),
(5, 'SUV', 2022, 250000, 'Grey', 'Shanghai', '../images/SUV-grey.jpg'),
(5, 'BMW i8', 2023, 450000, 'Blue', 'Beijing', '../images/BMW-blue.jpg'),
(5, 'BMW', 2025, 200000, 'White', 'Shenzhen', '../images/BMW-white.jpg'),
(5, 'SUV', 2024, 400000, 'Red', 'Beijing', '../images/SUV-red.jpg'),
(5, 'Xiaomi', 2023, 350000, 'Grey', 'Beijing', '../images/xiaomi-grey.jpg');