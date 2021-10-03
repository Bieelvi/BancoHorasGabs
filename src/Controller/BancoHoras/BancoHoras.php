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
        $bancoHorasRepository = new BancoHorasRepository();

        $responseDataAno = $bancoHorasRepository->buscaDataAnoDistinct($_SESSION['usuario']['id']); 
        $responseDataMes = $bancoHorasRepository->buscaPersonalizadaPerfilBancoHoras($_SESSION['usuario']['id'], $responseDataAno);

        echo $this->renderizaHtml(
            'listas/listar_banco_horas.php', 
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Horas',
                'tituloArcodian' => $responseDataAno,
                'bancoHoras' => $responseDataMes,
            ]
        );
    }
}