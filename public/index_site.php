<?php 

include_once __DIR__ . '/../vendor/autoload.php';

session_start();

$path = $_SERVER['REQUEST_URI'];
$rotas = require __DIR__ . '/../config/rotas.php';

if(!array_key_exists($path, $rotas)){
	http_response_code(404);
	exit();
}

$rotasLiberadas = [stripos($path, 'login'), stripos($path, 'novo')];

if(!isset($_SESSION['logado']) && $rotasLiberadas[0] === false && $rotasLiberadas[1] === false){
	header('Location: /login');
	exit;
}

$classeControladora = $rotas[$path];

/** @var Controller $controladora */
$controladora = new $classeControladora();

$controladora->processaRequisicao();