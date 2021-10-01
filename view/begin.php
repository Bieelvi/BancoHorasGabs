<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand">Usuário</a>
        <div class="d-flex">
            <a href="/usuario">
                <button class="btn btn-dark" type="submit">Cadastrar</button>
            </a>
            <a href="#" class="ms-2">
                <button class="btn btn-dark" type="submit">Entrar</button>
            </a>
        </div>
  </div>
</nav>

<div class="container mt-3">
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="alert alert-<?= $_SESSION['tipo_msg']; ?>">
            <?= $_SESSION['msg']; ?>
        </div>
    <?php 
            unset($_SESSION['msg']);
            unset($_SESSION['tipo_msg']);
        endif; 
    ?>
</div>