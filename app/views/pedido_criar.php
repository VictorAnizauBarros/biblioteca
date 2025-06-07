<?php include __DIR__ . '../templates/header.php'; ?>

<h2 class="mb-4">Fazer Pedido de Livro</h2>

<form method="POST" action="index.php?controller=pedido&action=criar" class="border p-4 rounded bg-light">
    <div class="mb-3">
        <label for="livro_id" class="form-label">Selecione um Livro:</label>
        <select name="livro_id" id="livro_id" class="form-select" required>
            <option value="">-- Escolha um livro --</option>
            <?php while ($row = $livros->fetch(PDO::FETCH_ASSOC)) : ?>
                <option value="<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['titulo']) ?> (<?= $row['quantidade'] ?> disponíveis)
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Fazer Pedido</button>
</form>

<?php include __DIR__ . '../templates/footer.php'; ?>
