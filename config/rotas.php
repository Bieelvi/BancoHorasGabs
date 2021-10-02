<?php

return [
    '/novo'             => App\Controller\Usuario\CadastrarUsuario::class,
    '/novo-usuario'     => App\Controller\Usuario\PersisteUsuario::class,
    '/listar-usuario'   => App\Controller\Usuario\ListarUsuario::class,
    '/perfil-usuario'   => App\Controller\Usuario\PerfilUsuario::class,

    '/login'            => App\Controller\Usuario\LoginUsuario::class,
    '/login-controller' => App\Controller\Usuario\LoginController::class,
    '/logout'           => App\Controller\Usuario\Logout::class,
];