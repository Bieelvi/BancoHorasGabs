<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <form action="/nova-banco-horas">
        <button class="btn btn-primary">Adicionar</button>
    </form>
    <?php if(isset($bancoHoras)): ?>
        <?php foreach($bancoHoras as $banco): ?>
            <div class="accordion mt-3" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading<?= $banco['id'] ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $banco['id'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?= $banco['id'] ?>">
                            <?= $banco['data'] ?>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse<?= $banco['id'] ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?= $banco['id'] ?>">
                        <div class="accordion-body">
                            CONTEUDO
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../end.php'; ?>