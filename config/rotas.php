<?php

return [
    '/novo'                     => App\Controller\Usuario\CadastrarUsuarioView::class,
    '/novo-usuario'             => App\Controller\Usuario\PersisteUsuarioController::class,
    '/listar-usuario'           => App\Controller\Usuario\ListarUsuarioView::class,
    '/perfil-usuario'           => App\Controller\Usuario\PerfilUsuarioView::class,
    '/update-usuario'           => App\Controller\Usuario\UpdateUsuarioController::class,

    '/login'                    => App\Controller\Usuario\LoginUsuarioView::class,
    '/login-controller'         => App\Controller\Usuario\LoginController::class,
    '/logout'                   => App\Controller\Usuario\Logout::class,

    '/banco-horas'              => App\Controller\BancoHoras\BancoHorasView::class,
    '/nova-banco-horas'         => App\Controller\BancoHoras\PersisteBancoHorasController::class,
    '/cadatrar-banco-horas'     => App\Controller\BancoHoras\CadastrarBancoHorasView::class,
    '/pesquisa-ano-selecionado' => App\Controller\BancoHoras\PesquisaAnoSelecionadoView::class,

    '/teste'                    => App\Controller\Teste::class,
];