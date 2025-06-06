<?php include __DIR__ . '../templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <h2 class="mb-4 text-center">Editar Livro</h2>

        <form method="POST" action="index.php?controller=livro&action=editar" class="border p-4 rounded shadow-sm bg-light">
            <input type="hidden" name="id" value="<?= $livro['id'] ?>">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" name="autor" id="autor" class="form-control" value="<?= htmlspecialchars($livro['autor']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Gênero:</label>
                <input type="text" name="genero" id="genero" class="form-control" value="<?= htmlspecialchars($livro['genero']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="ano_publicacao" class="form-label">Ano de Publicação:</label>
                <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" value="<?= htmlspecialchars($livro['ano_publicacao']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" value="<?= htmlspecialchars($livro['quantidade']) ?>" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '../templates/footer.php'; ?>
