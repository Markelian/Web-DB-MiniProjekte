CREATE DATABASE IF NOT EXISTS shkolla;
USE shkolla;

CREATE TABLE IF NOT EXISTS studentet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(50),
    mbiemri VARCHAR(50),
    nota INT
);

INSERT INTO studentet (emri, mbiemri, nota) VALUES
('Arber','Hoxha',9),
('Lira','Basha',7),
('Erion','Gega',10),
('Mira','Hoti',8),
('Klea','Lako',6),
('Ardita','Deda',5);
