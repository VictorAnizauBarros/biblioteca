<?php include __DIR__ . "../templates/header.php"; ?>

<h2 class="mb-4">Editar Pedido</h2>

<form method="POST" action="index.php?controller=pedido&action=editar" class="border p-4 rounded bg-light">
    <input type="hidden" name="id" value="<?= $pedido['id'] ?>">

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="pendente" <?= $pedido['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="aprovado" <?= $pedido['status'] === 'aprovado' ? 'selected' : '' ?>>Aprovado</option>
            <option value="rejeitado" <?= $pedido['status'] === 'rejeitado' ? 'selected' : '' ?>>Rejeitado</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include __DIR__ . "../templates/footer.php"; ?>
