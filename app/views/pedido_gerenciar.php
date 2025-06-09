<?php include __DIR__ . '../templates/header.php'; ?>


<div class="container mt-5">
    <h2 class="mb-4">Gerenciar Pedidos</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Livro</th>
                <th>Usuário</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?= $pedido['id'] ?></td>
                <td><?= $pedido['titulo_livro'] ?></td>
                <td><?= $pedido['nome_usuario'] ?></td>
                <td><?= $pedido['status'] ?></td>
                <td>
                    <form method="POST" action="index.php?controller=pedido&action=atualizarStatus" class="d-flex flex-column gap-2">
                        <input type="hidden" name="id" value="<?= $pedido['id'] ?>">
                        <select name="status" class="form-select">
                            <option disabled>Pendente</option>
                            <option value="aceito">Aceitar</option>
                            <option value="rejeitado">Rejeitar</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '../templates/footer.php'; ?>
