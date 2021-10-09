<?php 

namespace App\Controller\Comunicacao;

use App\Controller\Controller;
use App\Helper\RenderHtml;

include_once __DIR__ . '/../../../vendor/autoload.php';

class SujestaoView implements Controller
{
    use RenderHtml;

    public function processaRequisicao()
    {
        echo $this->renderizaHtml(
            'formularios/sujestao.php',
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Sujestão',
            ]
        );
    }
}