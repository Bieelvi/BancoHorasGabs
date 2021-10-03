<?php 

namespace App\Controller\BancoHoras;

use App\Controller\Controller;
use App\Helper\RenderHtml;
use App\Repository\BancoHoras\BancoHorasRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class BancoHoras implements Controller 
{
    use RenderHtml;

    public function processaRequisicao()
    {
        $bancoHoras = (new BancoHorasRepository())->buscaBancoHorasUsuario($_SESSION['usuario']['id']);

        echo $this->renderizaHtml(
            'listas/listar_banco_horas.php', 
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Horas',
                'bancoHoras' => $bancoHoras,
            ]
        );

        /*echo $this->renderizaHtml(
            'teste.php', 
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Horas',
                'usuario' => $bancoHoras
            ]
        );*/
    }
}