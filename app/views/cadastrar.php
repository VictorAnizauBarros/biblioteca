<?php include __DIR__ . '../templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <h2 class="mb-4 text-center">Cadastro de Usuário</h2>

        <form method="POST" action="index.php?controller=usuario&action=cadastrar" class="border p-4 rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
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
