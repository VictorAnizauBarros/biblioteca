<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Sistema de Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Centralizar o conteúdo verticalmente */
        body, html {
            height: 100%;
            margin: 0;
        }
        .login-container {
            height: 100vh; /* altura total da viewport */
            display: flex;
            justify-content: center; /* centraliza horizontalmente */
            align-items: center;     /* centraliza verticalmente */
            background: #f8f9fa;     /* cor de fundo leve */
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="col-11 col-sm-8 col-md-6 col-lg-4">
        <h2 class="mb-4 text-center">Login</h2>

        <?php if (!empty($erro)) : ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?controller=auth&action=login" class="border p-4 rounded shadow-sm bg-white">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus />
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" required />
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>

        <p class="mt-3 text-center">
            Não tem conta?
            <a href="index.php?controller=usuario&action=cadastrar">Cadastre-se</a>
        </p>
    </div>
</div>

<?php include __DIR__ . "../templates/footer.php"; ?>

</body>
</html>
