<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <ul class="list-group">
        <?php foreach ($usuarios as $usuario): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $usuario['nome_completo']?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include __DIR__ . '/../end.php'; ?>