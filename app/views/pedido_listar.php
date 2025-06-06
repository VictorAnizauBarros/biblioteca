<?php include __DIR__ . "../templates/header.php"; ?>

<h2 class="mb-4">Pedidos Pendentes</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>ID Usuário</th>
                <th>ID Livro</th>
                <th>Status</th>
                <th>Data do Pedido</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $pedidos->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['usuario_id']) ?></td>
                    <td><?= htmlspecialchars($row['livro_id']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td><?= htmlspecialchars($row['data_pedido']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . "../templates/footer.php"; ?>
