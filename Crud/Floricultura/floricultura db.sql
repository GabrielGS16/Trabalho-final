create database floricultura;
use floricultura;
create table usuarios(
id INT PRIMARY KEY AUTO_INCREMENT,
email varchar(100),
senha varchar(16)
);
create table produtos(
id INT PRIMARY KEY AUTO_INCREMENT,
nome varchar(100),
valor float,
descricao varchar(200),
imagem  varchar(100)
);
create table pedidos(
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT,
  data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(50)
);
