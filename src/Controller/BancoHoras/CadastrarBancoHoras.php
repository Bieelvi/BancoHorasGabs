<?php 

namespace App\Controller\BancoHoras;

use App\Controller\Controller;
use App\Helper\RenderHtml;

include_once __DIR__ . '/../../../vendor/autoload.php';

class CadastraRBancoHoras implements Controller 
{
    use RenderHtml;

    public function processaRequisicao()
    {
        echo $this->renderizaHtml(
            'formularios/cadastrar_banco_horas.php', 
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Horas'
            ]
        );
    }
}