<?php include __DIR__ . '../templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Livros</h2>
    <a href="index.php?controller=livro&action=adicionar" class="btn btn-success">Adicionar Novo Livro</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Ano</th>
                <th>Qtd</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $livros->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['titulo']) ?></td>
                    <td><?= htmlspecialchars($row['autor']) ?></td>
                    <td><?= htmlspecialchars($row['genero']) ?></td>
                    <td><?= htmlspecialchars($row['ano_publicacao']) ?></td>
                    <td><?= htmlspecialchars($row['quantidade']) ?></td>
                    <td>
                        <a href="index.php?controller=livro&action=editar&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="index.php?controller=livro&action=excluir&id=<?= $row['id'] ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '../templates/footer.php'; ?>
