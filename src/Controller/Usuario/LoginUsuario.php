<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Helper\RenderHtml;

include_once __DIR__ . '/../../../vendor/autoload.php';

class LoginUsuario implements Controller
{
    use RenderHtml;

    public function processaRequisicao()
    {
        echo $this->renderizaHtml(
            'formularios/login_usuario.php', 
            [
                'titulo' => 'Login - Banco Horas Gabs',
                'tituloLogo' => 'Formulário de Login'
            ]);
    }
}