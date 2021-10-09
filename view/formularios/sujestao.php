<?php include __DIR__ . '/../begin.php'; ?>

<section class="container mt-3">
    <form action="/sujestao-controller" method="post">
        <div class="mb-3 row">
            <label for="assunto" class="col-form-label">Assunto</label>
            <div class="col-sm-12">
                <select id="assunto" name="assunto" class="form-select">
                    <option selected>Escolher</option>
                    <option>Design</option>
                    <option>Funcionalidade</option>
                    <option>Erro</option>
                    <option>Outros</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="conteudo" class="col-form-label">Conteúdo</label>
            <div class="form-floating">
                <textarea class="form-control" id="conteudo" name="conteudo" required></textarea>
            </div>
        </div>
        <div>
            <button class="btn btn-primary">Enviar Sujestão</button>
        </div>
    </form>
</section>

<?php include __DIR__ . '/../end.php'; ?>