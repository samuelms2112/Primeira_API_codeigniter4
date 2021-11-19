drop database APICodeIgniter;
create database APICodeIgniter;
use APICodeIgniter;


CREATE TABLE livro (
  id INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  valor DOUBLE NOT NULL,
  autor VARCHAR(20) NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO livro (descricao, valor, autor) VALUES
('1984' , 21.01, 'George Orwell'),
('Admirável Mundo Novo' , 25.40, 'Aldous Huxley'),
('Fahrenheit 451' , 24.51, 'Ray Bradbury');