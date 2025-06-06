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
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = 'pendente'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>