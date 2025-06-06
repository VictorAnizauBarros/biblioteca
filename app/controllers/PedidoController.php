<?php
require_once __DIR__ . '/../models/Pedido.php';
require_once __DIR__ . '/../config/database.php';

class PedidoController {
    private $pedido;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->pedido = new Pedido($db);
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_SESSION['usuario']['id'];
            $livro_id = $_POST['livro_id'];

            $this->pedido->criarPedido($usuario_id, $livro_id);
            header("Location: index.php?controller=pedido&action=listar");
        }
    }

    public function listar() {
        $pedidos = $this->pedido->listarPedidosPendentes();
        include __DIR__ .'/../views/pedido_listar.php';
    }
}
?>
