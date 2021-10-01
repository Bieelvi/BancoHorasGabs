<?php

return [
    '/usuario'          => App\Controller\Usuario\UsuarioController::class,
    '/novo-usuario'     => App\Controller\Usuario\PersisteUsuario::class,
    '/listar-usuario'   => App\Controller\Usuario\ListaUsuario::class,
];