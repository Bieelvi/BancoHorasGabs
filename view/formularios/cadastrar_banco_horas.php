<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <form action="/nova-banco-horas" method="post">
        <div class="row">
            <div class="col">
                <label for="nomeEmpresa" class="form-label">Empresa</label>
                <select id="nomeEmpresa" name="nomeEmpresa" class="form-select">
                    <option selected>Escolher</option>
                    <option>Hospital Unimed Limeira</option>
                </select>
            </div>
            <div class="col">
                <label for="horasDiarias" class="form-label">Horas Diárias</label>
                <select id="horasDiarias" name="horasDiarias" class="form-select">
                    <option>06:00</option>
                    <option selected>08:00</option>
                    <option>10:00</option>
                    <option>12:00</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" name="data" id="data">
            </div>
            <div class="col">
                <label for="horaEntrada" class="form-label">Horário de Entrada</label>
                <select id="horaEntrada" name="horaEntrada" class="form-select">
                    <option selected>Escolher</option>
                    <option>08:00</option>
                    <option>07:30</option>
                </select>
            </div>
            <div class="col">
                <label for="horaEntradaAlmoco" class="form-label">Horário do Almoço</label>
                <select id="horaEntradaAlmoco" name="horaEntradaAlmoco" class="form-select">
                    <option selected>Escolher</option>
                    <option>11:00</option>
                    <option>11:30</option>
                    <option>12:00</option>
                    <option>12:30</option>
                </select>
            </div>
            <div class="col">
                <label for="horaRetorno" class="form-label">Horário de Retorno</label>
                <select id="horaRetorno" name="horaRetorno" class="form-select">
                    <option selected>Escolher</option>
                    <option>12:30</option>
                    <option>13:00</option>
                    <option>13:30</option>
                    <option>14:00</option>
                </select>
            </div>
            <div class="col">
                <label for="horaSaida" class="form-label">Horário de Saída</label>
                <select id="horaSaida" name="horaSaida" class="form-select">
                    <option selected>Escolher</option>
                    <option>17:30</option>
                    <option>18:00</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="observacao" class="form-label">Observações</label>
                <div class="form-floating">
                    <textarea class="form-control" id="observacao" name="observacao"></textarea>
                    <label for="observacao" class="form-label">Suas observações</label>
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