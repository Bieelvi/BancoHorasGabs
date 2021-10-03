<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <a href="/cadatrar-banco-horas">
        <button class="btn btn-primary">Adicionar</button>
    </a>
    <?php if(isset($bancoHoras)): ?>
        <?php foreach($bancoHoras as $banco): ?>
            <div class="accordion mt-3" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading<?= $banco['id'] ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $banco['id'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?= $banco['id'] ?>">
                            <?= $banco['data_dia'] .'/'. $banco['data_mes'] .'/'. $banco['data_ano'] .' - '. $banco['horas_totais_minutos'] . ' minutos'?>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse<?= $banco['id'] ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?= $banco['id'] ?>">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <span> <b>Nome Empresa:</b> <?= $banco['nome_empresa'] ?> </span>
                                    <span> <b>Horas Diárias:</b> <?= $banco['horas_trabalhadas_dia'] ?> </span><br>
                                    <span> <b>Horário Entrada:</b> <?= $banco['horario_entrada'] ?> </span>
                                    <span> <b>Horário Almoço:</b> <?= $banco['horario_entrada_almoco'] ?> </span>
                                    <span> <b>Horário Retorno:</b> <?= $banco['horario_retorno_almoco'] ?> </span>
                                    <span> <b>Horário Saída:</b> <?= $banco['horario_saida'] ?> </span><br>
                                    <span> <b>Observações:</b> <?= $banco['observacao'] ?> </span><br>
                                    <span> <b>Excessão:</b> <?= $banco['excessao'] ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../end.php'; ?>