<?php include __DIR__ . "../templates/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Pedidos Pendentes</h2>
    <a href="index.php?controller=pedido&action=criar" class="btn btn-primary">Fazer Pedido</a>
</div>


<div class="table-responsive">

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Usuário</th>
                <th>Livro</th>
                <th>Status</th>
                <th>Data do Pedido</th>
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
    <?php while ($row = $pedidos->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nome_usuario']) ?></td>
            <td><?= htmlspecialchars($row['titulo_livro']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><?= htmlspecialchars($row['data_pedido']) ?></td>
            <td>
                <a href="index.php?controller=pedido&action=editar&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="index.php?controller=pedido&action=excluir&id=<?= $row['id'] ?>" 
                   class="btn btn-sm btn-danger" 
                   onclick="return confirm('Tem certeza que deseja excluir este pedido?')">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>
</tbody>

    </table>
</div>

<?php include __DIR__ . "../templates/footer.php"; ?>
