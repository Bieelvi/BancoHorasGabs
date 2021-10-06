<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-12">
            <a href="/cadatrar-banco-horas">
                <button class="btn btn-primary">Adicionar</button>
            </a> 
        </div>
    </div>
    <div class="row mt-3">        
        <?php if(isset($anos)): ?>
            <?php foreach($anos as $titulo): ?>
                <div class="col-3 mx-auto" style="width: 200px;">
                    <form action="/pesquisa-ano-selecionado" method="post">
                        <input type="hidden" name="anoEscolhido" id="anoEscolhido" value="<?= $titulo['data_ano'] ?>">
                        <button type="submit" class="btn btn-outline-secondary ps-5 pe-5 mx-auto" style="width: 200px;"> <?= $titulo['data_ano'] ?> </button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>        
    </div>

    <div class="row mt-3">
        <div class="col">
                <strong class="me-5 ms-3">Mês</strong>
                <strong>Ano Selecionado: </strong> <?= isset($anoSelecionado) ? $anoSelecionado : 'Nenhuma selecionado'; ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <?php if(isset($bancoHoras)): ?>
                <?php foreach($bancoHoras as $horas): ?>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading<?= $horas[0]['id'] ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $horas[0]['id'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?= $horas[0]['id'] ?>">
                            <?= $horas[0]['data_mes'] ?>
                        </button>
                        </h2>

                        <?php for($i = 0; $i < count($bancoHoras); $i++): ?>
                        <?php foreach($bancoHoras[$i] as $horasDia): ?>
                        <?php if($horas[0]['data_mes'] == $horasDia['data_mes']): ?>

                            <div id="panelsStayOpen-collapse<?= $horas[0]['id'] ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?= $horas[0]['id'] ?>">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <span> <b>Nome Empresa:</b> <?= $horasDia['nome_empresa'] ?> </span>
                                            <span> <b>Horas Diárias:</b> <?= $horasDia['horas_trabalhadas_dia'] ?> </span><br>
                                            <span> <b>Data:</b> <?= $horasDia['data_dia'].'/'.$horasDia['data_mes'].'/'.$horasDia['data_ano']?> </span>
                                            <span> <b>Horário Entrada:</b> <?= $horasDia['horario_entrada'] ?> </span>
                                            <span> <b>Horário Almoço:</b> <?= $horasDia['horario_entrada_almoco'] ?> </span>
                                            <span> <b>Horário Retorno:</b> <?= $horasDia['horario_retorno_almoco'] ?> </span>
                                            <span> <b>Horário Saída:</b> <?= $horasDia['horario_saida'] ?> </span>
                                            <span> <b>Hora Extra (minutos):</b> <?= $horasDia['horas_totais_minutos'].' min' ?> </span><br>
                                            <span> <b>Observações:</b> <?= $horasDia['observacao'] ?> </span><br>
                                            <span> <b>Excessão:</b> <?= $horasDia['excessao'] ?> </span>
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
    </div>

</div>

<?php include __DIR__ . '/../end.php'; ?>