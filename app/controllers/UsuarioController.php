<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/database.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuario = new Usuario($db);
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $papel = $_POST['papel']; // Ex: aluno, bibliotecario

            $this->usuario->cadastrar($nome, $email, $senha, $papel);
            header("Location: index.php?controller=auth&action=login");
        } else {
            include __DIR__ . '/../views/cadastrar.php';
        }
    }
}
?>
