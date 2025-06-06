<?php 
    class Livro {
        private $conn;
        private $table_name = "livros"; 

        public $id;
        public $titulo;
        public $autor;
        public $genero;
        public $ano_publicacao;
        public $quantidade;

        public function __construct($db) {
            $this ->conn = $db;
        }

public function listarLivros() {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
}

public function adicionarLivro($titulo, $autor, $genero, $ano_publicacao, $quantidade) {
    $query = "INSERT INTO " . $this->table_name . " (titulo, autor, genero, ano_publicacao, quantidade)
              VALUES (:titulo, :autor, :genero, :ano_publicacao, :quantidade)";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':ano_publicacao', $ano_publicacao);
    $stmt->bindParam(':quantidade', $quantidade);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

public function editarLivro($id, $titulo, $autor, $genero, $ano_publicacao, $quantidade) {
    $query = "UPDATE " . $this->table_name . " 
              SET titulo = :titulo, autor = :autor, genero = :genero, ano_publicacao = :ano_publicacao, quantidade = :quantidade 
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':ano_publicacao', $ano_publicacao);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

public function excluirLivro($id) {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

}
?>