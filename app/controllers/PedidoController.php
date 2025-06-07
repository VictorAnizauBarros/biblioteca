<?php
require_once __DIR__ . '/../models/Pedido.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Livro.php';


class PedidoController {
    private $pedido;
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->pedido = new Pedido($this->conn);
    }

    public function criar() {
        $livroModel = new Livro($this->conn);

        $livros = $livroModel->listarLivros();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_SESSION['usuario']['id'];
            $livro_id = $_POST['livro_id'];

            $this->pedido->criarPedido($usuario_id, $livro_id);
            header("Location: index.php?controller=pedido&action=listar");
        } else {
            include __DIR__ . '/../views/pedido_criar.php';
        }
    }

    public function listar() {
        $pedidos = $this->pedido->listarPedidosPendentes();
        include __DIR__ .'/../views/pedido_listar.php';
    }

    public function editar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $status = $_POST['status']; // 'aprovado', 'rejeitado', etc.

        $this->pedido->atualizarStatus($id, $status);
        header("Location: index.php?controller=pedido&action=listar");
    } else {
        $id = $_GET['id'];
        $stmt = $this->pedido->buscarPedidoPorId($id);
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/pedido_editar.php';
    }
}

public function excluir() {
    $id = $_GET['id'];
    $this->pedido->excluirPedido($id);
    header("Location: index.php?controller=pedido&action=listar");
}
}
?>
