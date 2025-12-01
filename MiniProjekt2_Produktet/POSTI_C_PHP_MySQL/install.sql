CREATE DATABASE IF NOT EXISTS dyqani;
USE dyqani;

CREATE TABLE IF NOT EXISTS produktet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(100),
    kategoria VARCHAR(50),
    cmimi DECIMAL(10,2),
    sasia INT
);

INSERT INTO produktet (emri, kategoria, cmimi, sasia) VALUES
('Bukë', 'Ushqime', 1.00, 30),
('Qumësht', 'Ushqime', 1.20, 20),
('Mouse Logitech', 'Elektronikë', 20.00, 15),
('Shampo', 'Higjienë', 3.50, 40),
('Monitor Samsung', 'Elektronikë', 150.00, 5);
