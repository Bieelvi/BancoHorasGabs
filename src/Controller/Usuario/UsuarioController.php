<?php

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Factory\Usuario\UsuarioFactory;
use App\Repository\Usuario\UsuarioRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class UsuarioController implements Controller
{
    public function processaRequisicao()
    {
        $infUsuuario = [
            'nome_completo' => 'Gabriel Victor Raymundo',
            'email' => 'bieelvii12@gmail.com',
            'password' => '123456789'
        ];

        $usuario = (new UsuarioFactory())->novaEntidade($infUsuuario);

        $repositoryUsuairo = (new UsuarioRepository())->insereUsuairo($usuario);

        echo $repositoryUsuairo;
    }
}