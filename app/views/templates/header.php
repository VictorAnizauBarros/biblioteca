<!-- biblioteca/app/views/templates/header -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Seu CSS customizado -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['usuario'])) : ?>
                        <?php if ($_SESSION['usuario']['papel'] === 'bibliotecario') : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=livro&action=listar">Livros</a>
                            </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['usuario']['papel'] === 'aluno') : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=pedido&action=listar">Pedidos</a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=auth&action=logout">Sair</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($_SESSION['usuario']['papel'] === 'bibliotecario') : ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?controller=pedido&action=gerenciar">Gerenciar Pedidos</a>
    </li>
<?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
