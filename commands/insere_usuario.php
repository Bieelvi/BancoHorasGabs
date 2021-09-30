<?php 

include_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\Usuario\UsuarioController;
use App\Infra\DataBase;

$conexao = (new DataBase())->conexao();

$response = $usuarioController = (new UsuarioController())->processaRequisicao();

$email = $response->getEmail();
$password = $response->getPassword();
$nomeCompleto = $response->getNomeCompleto();

$sql = $conexao->prepare('INSERT INTO usuario (email, password, nome_completo) VALUES (?, ?, ?);');
$sql->bindParam(1, $email);
$sql->bindParam(2, $password);
$sql->bindParam(3, $nomeCompleto);

$sql->execute();

echo ('Usuario: ' . $response->getNomeCompleto() . ' adicionado com sucesso!');