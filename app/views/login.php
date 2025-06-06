<?php include __DIR__ . "../templates/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <h2 class="mb-4 text-center">Login</h2>

        <?php if (!empty($erro)) : ?>
            <div class="alert alert-danger">
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?controller=auth&action=login" class="border p-4 rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
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
