<?php

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Helper\RenderHtml;

include_once __DIR__ . '/../../../vendor/autoload.php';

class CadastrarUsuarioView implements Controller
{
    use RenderHtml;

    public function processaRequisicao()
    {
        echo $this->renderizaHtml(
            'formularios/cadastro_usuario.php', 
            [
                'titulo' => 'Cadastrar Usuário - Banco Horas Gabs',
                'tituloLogo' => 'Formulário de Cadastro'    
            ]
        );
    }
}