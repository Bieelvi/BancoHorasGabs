<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <title><?= $titulo ?></title>
        <link rel="shortcut icon" href="assets/img/clock.ico">
    </head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand"><?= $tituloLogo ?></a>
        <div class="d-flex">
            <?php if(!isset($_SESSION['logado'])): ?>
                <a href="/novo">
                    <button class="btn btn-dark" type="submit">Cadastrar</button>
                </a>
                <a href="/login" class="ms-2">
                    <button class="btn btn-dark" type="submit">Entrar</button>
                </a>
            <?php endif; ?>
            <?php if(isset($_SESSION['logado'])): ?>
                <a href="/banco-horas" class="ms-2">
                    <button class="btn btn-dark" type="submit">Banco de Horas</button>
                </a>
                <a href="/perfil-usuario" class="ms-2">
                    <button class="btn btn-dark" type="submit">Perfil</button>
                </a>
                <a href="/logout" class="ms-2">
                    <button class="btn btn-dark" type="submit">Sair</button>
                </a>
                <a href="/sujestao" class="ms-2">
                    <button class="btn btn-dark" type="submit">Dar Sujestão</button>
                </a>
            <?php endif; ?>
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

<main>