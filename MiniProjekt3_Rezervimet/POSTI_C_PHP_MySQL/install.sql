CREATE DATABASE IF NOT EXISTS hoteli;
USE hoteli;

CREATE TABLE IF NOT EXISTS rezervimet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    klienti VARCHAR(100),
    data DATE,
    tipi VARCHAR(50),
    statusi VARCHAR(20)
);

INSERT INTO rezervimet (klienti, data, tipi, statusi) VALUES
('Arben Deda', '2025-01-10', 'Dhoma single', 'Aktive'),
('Mira Lika', '2025-01-15', 'Dhoma double', 'Në pritje'),
('Klea Pano', '2025-01-18', 'Sallë konference', 'Anuluar'),
('Sokol Hysa', '2025-01-20', 'Dhoma single', 'Aktive'),
('Lira Bega', '2025-01-22', 'Dhoma family', 'Në pritje');
