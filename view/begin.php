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

<header>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand"><?= $tituloLogo ?></a>
            <div class="d-flex">

                <div class="btn-group">
                    <div class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img src="https://img.icons8.com/material-sharp/24/000000/menu--v1.png"/>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton2">
                        <?php if(!isset($_SESSION['logado'])): ?>
                            <li>
                                <a href="/novo" class="dropdown-item"> Cadastrar </a>
                            </li>
                            <li>
                                <a href="/login" class="dropdown-item"> Entrar </a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['logado'])): ?>
                            <li>
                                <a href="/banco-horas" class="dropdown-item"> Banco de Horas </a>
                            </li>
                            <li>
                                <a href="/perfil-usuario" class="dropdown-item"> Perfil </a>
                            </li>
                            <li>
                                <a href="/sujestao" class="dropdown-item"> Dar Sujestão </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="/logout" class="dropdown-item"> Sair </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
</header

<main>

<section class="container mt-3">
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="alert alert-<?= $_SESSION['tipo_msg']; ?>">
            <?= $_SESSION['msg']; ?>
        </div>
    <?php 
            unset($_SESSION['msg']);
            unset($_SESSION['tipo_msg']);
        endif; 
    ?>
</section>