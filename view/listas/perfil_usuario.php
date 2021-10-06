<?php include_once __DIR__ . '/../begin.php'; ?>

<div class="container mtt-3">
    <form action="/update-usuario" method="post">
        <fieldset>
            <legend>Seus Dados</legend>
            <div class="mb-3 row">
                <label for="nomeCompleto" class="col-sm-2 col-form-label">Atualizar Nome Completo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" value="<?= $_SESSION['usuario']['nome_completo'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Atualizar Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $_SESSION['usuario']['email'] ?>" placeholder="email@gmail.com">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Atualizar Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="confPassword" class="col-sm-2 col-form-label">Confirmar Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confPassword" name="confPassword">
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary">Atualizar</button>
            </div>
        </fieldset>
    </form>
</div>

<?php include_once __DIR__ . '/../end.php'; ?>