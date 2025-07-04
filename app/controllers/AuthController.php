<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/database.php';

class AuthController {
    private $usuario;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuario = new Usuario($db);
    }

    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = $this->usuario->autenticar($email, $senha);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;

            // Verifica o papel do usuário (bibliotecario ou aluno)
            if ($usuario['papel'] === 'bibliotecario') {
                header("Location: index.php?controller=livro&action=listar");
            } elseif ($usuario['papel'] === 'aluno') {
                header("Location: index.php?controller=pedido&action=listar");
            } else {
                $erro = "Papel de usuário não reconhecido.";
                include __DIR__ . '/../views/login.php';
            }
        } else {
            $erro = "Usuário ou senha inválidos.";
            include __DIR__ . '/../views/login.php';
        }
    } else {
        include __DIR__ . '/../views/login.php';
    }
}

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
?>
