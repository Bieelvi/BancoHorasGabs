<?php include __DIR__ . '/../begin.php'; ?>

<div class="container mt-3">
    <form action="/login-controller" method="post">
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary">Entrar</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../end.php'; ?>