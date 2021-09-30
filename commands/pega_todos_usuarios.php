<?php

include_once __DIR__ . '/../vendor/autoload.php';

use App\Infra\DataBase;

$conexao = (new DataBase())->conexao();

$sql = $conexao->prepare('SELECT * FROM usuario');
$sql->execute();

if($sql->rowCount()){
    var_dump($sql->fetchAll(PDO::FETCH_ASSOC));
} 