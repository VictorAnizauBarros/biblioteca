CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    papel ENUM('aluno', 'bibliotecario') DEFAULT 'aluno',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(100),
    ano_publicacao YEAR,
    quantidade INT DEFAULT 0,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    livro_id INT,
    status ENUM('pendente', 'aceito', 'rejeitado') DEFAULT 'pendente',
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_devolucao TIMESTAMP NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (livro_id) REFERENCES livros(id)
);


INSERT INTO livros (titulo, autor, genero, ano_publicacao, quantidade)
VALUES 
('Dom Casmurro', 'Machado de Assis', 'Romance', 1899, 12),
('1984', 'George Orwell', 'Distopia', 1949, 20),
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Literatura Infantil', 1943, 15),
('Cem Anos de Solidão', 'Gabriel García Márquez', 'Realismo Mágico', 1967, 8),
('O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R. Tolkien', 'Fantasia', 1954, 10);
