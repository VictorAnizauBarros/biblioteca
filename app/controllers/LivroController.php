
<?php 
require_once __DIR__ . '/../helpers/auth_helper.php';

    require_once __DIR__ . '/../models/Livro.php';
    require_once __DIR__ . '/../config/database.php';

    class LivroController {
        private $livro;

        public function __construct() {
            $database = new Database();
            $db = $database->getConnection();
            $this->livro = new Livro($db);
        }

        public function listar() {
            verificarPermissao(['bibliotecario']);
            $livros = $this->livro->listarLivros();
            include __DIR__ . '/../views/livro_listar.php';
        }

        public function adicionar() {
            verificarPermissao(['bibliotecario']);
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $genero = $_POST['genero'];
                $ano_publicacao = $_POST['ano_publicacao'];
                $quantidade = $_POST['quantidade'];


                $this->livro->adicionarLivro($titulo,$autor,$genero,$ano_publicacao,$quantidade);
                header("Location: index.php?controller=livro&action=listar");
            }else{
                include __DIR__ . '/../views/livro_adicionar.php';
            }
        }

        public function editar() {
            verificarPermissao(['bibliotecario']);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $genero = $_POST['genero'];
                $ano_publicacao = $_POST['ano_publicacao'];
                $quantidade = $_POST['quantidade'];

                $this->livro->editarLivro($id, $titulo, $autor, $genero, $ano_publicacao, $quantidade);
                header("Location: index.php?controller=livro&action=listar");
            } else {
                $id = $_GET['id'];
                
                $stmt = $this->livro->listarLivros();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['id'] == $id) {
                        $livro = $row;
                        break;
                    }
                }
                include __DIR__ . '/../views/livro_editar.php';
            }
        }

        public function excluir() {
            $id = $_GET['id'];
            $this->livro->excluirLivro($id);
            header("Location: index.php?controller=livro&action=listar");
        }
}
?>