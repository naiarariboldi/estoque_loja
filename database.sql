-- Script para criar banco e tabelas
CREATE DATABASE IF NOT EXISTS estoque_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE estoque_db;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  categoria VARCHAR(50),
  quantidade INT DEFAULT 0,
  preco DECIMAL(10,2) DEFAULT 0.00,
  descricao TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- usuário de exemplo:
INSERT INTO usuarios (nome, email, senha) VALUES
('Admin', 'admin@example.com', '$2y$10$Kq3Yj8oCqJw6QH1q0jvYbOeX1G1F0a9vQZq8kz1p4v1WmZf9g7PqG'); 
-- senha: "admin123" (hash gerado com password_hash)

-- produtos de exemplo
INSERT INTO produtos (nome, categoria, quantidade, preco, descricao) VALUES
('Parafuso 6mm', 'Ferramentas', 150, 0.10, 'Parafuso para uso geral'),
('Cabo USB', 'Eletrônicos', 25, 5.50, 'Cabo USB A-B 1.5m'),
('Teclado Mecânico', 'Eletrônicos', 5, 120.00, 'Teclado com switches azuis');
