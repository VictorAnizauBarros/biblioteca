<?php include __DIR__ . "../templates/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Meus Pedidos</h2>
    <a href="index.php?controller=pedido&action=criar" class="btn btn-primary">Fazer Pedido</a>
</div>


<div class="table-responsive">

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Livro</th>
                <th>Status</th>
                <th>Data do Pedido</th>
                <th>Cancelar</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($pedidos as $row) : ?>

        <tr>
    <td><?= htmlspecialchars($row['id']) ?></td>
    <td><?= htmlspecialchars($row['titulo_livro']) ?></td>
    <td><?= htmlspecialchars($row['status']) ?></td>
    <td><?= htmlspecialchars($row['data_pedido']) ?></td>
<td>
    <?php if ($row['status'] === 'pendente') : ?>
        <a href="index.php?controller=pedido&action=excluir&id=<?= $row['id'] ?>" 
           class="btn btn-sm btn-danger" 
           onclick="return confirm('Tem certeza que deseja cancelar este pedido?')">Cancelar</a>
    <?php endif; ?>
</td>

</tr>
<?php endforeach; ?>

</tbody>

    </table>
</div>

<?php include __DIR__ . "../templates/footer.php"; ?>
