<?php
class Pedido {
    private $conn;
    private $table_name = "pedidos";
    public $id;
    public $usuario_id;
    public $livro_id;
    public $status;
    public $data_pedido;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function criarPedido($usuario_id, $livro_id) {
        $query = "INSERT INTO " . $this->table_name . " (usuario_id, livro_id) VALUES (:usuario_id, :livro_id)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':livro_id', $livro_id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function listarPedidosPendentes() {
    $sql = "SELECT p.id, p.status, p.data_pedido,
                   u.nome AS nome_usuario,
                   l.titulo AS titulo_livro
            FROM pedidos p
            JOIN usuarios u ON p.usuario_id = u.id
            JOIN livros l ON p.livro_id = l.id
            WHERE p.status = 'pendente'
            ORDER BY p.data_pedido DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt;
}


    public function buscarPedidoPorId($id) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt;
}

public function atualizarStatus($id, $status) {
    $query = "UPDATE " . $this->table_name . " SET status = :status WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

public function excluirPedido($id) {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

public function listarPedidos($usuarioId = null, $papel = null) {
    if ($papel === 'aluno') {
        $stmt = $this->conn->prepare("
            SELECT p.id, p.livro_id, u.nome AS nome_usuario, l.titulo AS titulo_livro, p.status, p.data_pedido
            FROM pedidos p
            JOIN usuarios u ON p.usuario_id = u.id
            JOIN livros l ON p.livro_id = l.id
            WHERE p.usuario_id = :usuario_id
        ");
        $stmt->bindParam(':usuario_id', $usuarioId);
        $stmt->execute();
    } else {
        $stmt = $this->conn->query("
            SELECT p.id, p.livro_id, u.nome AS nome_usuario, l.titulo AS titulo_livro, p.status, p.data_pedido
            FROM pedidos p
            JOIN usuarios u ON p.usuario_id = u.id
            JOIN livros l ON p.livro_id = l.id
        ");
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
?>