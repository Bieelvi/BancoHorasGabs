<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <a href="/cadatrar-banco-horas">
        <button class="btn btn-primary">Adicionar</button>
    </a> 
    <?php if(isset($bancoHoras)): ?>
        <?php foreach($tituloArcodian as $titulo): ?>
            <div class="accordion mt-3" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading<?= $titulo['data_ano'] ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $titulo['data_ano'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?= $titulo['data_ano'] ?>">
                            <?= $titulo['data_ano'] ?>
                        </button>
                    </h2>
                    <?php for ($i = 0; $i < count($bancoHoras); $i++): ?>
                        <?php foreach($bancoHoras[$i] as $banco): ?>
                            <?php if($banco['data_ano'] == $titulo['data_ano']): ?>
                                <div id="panelsStayOpen-collapse<?= $titulo['data_ano'] ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?= $titulo['data_ano'] ?>">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col">
                                                <span> <b>Nome Empresa:</b> <?= $banco['nome_empresa'] ?> </span>
                                                <span> <b>Horas Diárias:</b> <?= $banco['horas_trabalhadas_dia'] ?> </span><br>
                                                <span> <b>Data:</b> <?= $banco['data_dia'].'/'.$banco['data_mes'].'/'.$banco['data_ano']?> </span>
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
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../end.php'; ?>