<?php 

include_once __DIR__ . '/../vendor/autoload.php';

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/rotas.php';

if (!array_key_exists($caminho, $rotas)) {
	http_response_code(404);
	exit();
}

$classeControladora = $rotas[$caminho];

/** @var Controller $controladora */
$controladora = new $classeControladora();

$controladora->processaRequisicao();