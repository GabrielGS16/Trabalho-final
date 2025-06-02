create database floricultura;
use floricultura;
CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  descricao TEXT,
  preco DECIMAL(10,2),
  imagem VARCHAR(255)
);

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  senha VARCHAR(255)
);

CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(50),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
