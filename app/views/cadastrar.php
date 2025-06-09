<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Cadastro de Usuário - Sistema de Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Centralizar vertical e horizontalmente */
        body, html {
            height: 100%;
            margin: 0;
        }
        .register-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="col-11 col-sm-9 col-md-7 col-lg-5">
        <h2 class="mb-4 text-center">Cadastro de Usuário</h2>

        <form method="POST" action="index.php?controller=usuario&action=cadastrar" class="border p-4 rounded shadow-sm bg-white">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="papel" class="form-label">Papel:</label>
                <select name="papel" id="papel" class="form-select" required>
                    <option value="aluno">Aluno</option>
                    <option value="bibliotecario">Bibliotecário</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>

        <p class="mt-3 text-center">
            Já tem uma conta? <a href="index.php?controller=auth&action=login">Fazer login</a>
        </p>
    </div>
</div>

<?php include __DIR__ . '../templates/footer.php'; ?>


