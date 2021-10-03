<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <form action="/nova-banco-horas" method="post">
        <div class="row">
            <div class="col-8">
                <label for="nomeEmpresa" class="col col-form-label">Empresa</label>
                <select id="nomeEmpresa" name="nomeEmpresa" class="form-select">
                    <option selected>Escolher</option>
                    <option>Hospital Unimed Limeira</option>
                </select>
            </div>
            <div class="col-4">
                <label for="horasDiarias" class="col col-form-label">Horas Diárias</label>
                <input type="time" id="horasDiarias" name="horasDiarias" class="form-control" value="08:00">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="data" class="col col-form-label">Data</label>
                <input type="date" class="form-control" name="data" id="data">
            </div>
            <div class="col">
                <label for="horaEntrada" class="col col-form-label">Horário de Entrada</label>
                <input type="time" id="horaEntrada" name="horaEntrada" class="form-control"></input>
            </div>
            <div class="col">
                <label for="horaEntradaAlmoco" class="col col-form-label">Horário do Almoço</label>
                <input type="time" id="horaEntradaAlmoco" name="horaEntradaAlmoco" class="form-control"></input>
            </div>
            <div class="col">
                <label for="horaRetorno" class="col col-form-label">Horário de Retorno</label>
                <input type="time" id="horaRetorno" name="horaRetorno" class="form-control"></input>
            </div>
            <div class="col">
                <label for="horaSaida" class="col col-form-label">Horário de Saída</label>
                <input type="time" id="horaSaida" name="horaSaida" class="form-control"></input>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="observacao" class="col col-form-label">Observações</label>
                <div class="form-floating">
                    <textarea class="form-control" id="observacao" name="observacao"></textarea>
                    <label for="observacao" class="col col-form-label">Suas observações</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-primary">Adicionar Horário</button>
            </div>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../end.php'; ?>