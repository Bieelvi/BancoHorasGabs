<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Helper\RenderHtml;

include_once __DIR__ . '/../../../vendor/autoload.php';

class PerfilUsuario implements Controller
{
    use RenderHtml;

    public function processaRequisicao()
    {
        echo $this->renderizaHtml(
            'listas/perfil_usuario.php', 
            [
                'titulo' => 'Perfil - Banco Horas Gabs',
                'tituloLogo' => 'Perfil'
            ]
        );
    }
}