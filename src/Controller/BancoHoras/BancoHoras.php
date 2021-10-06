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

        $id = $_SESSION['usuario']['id'];

        // essa variavel sera usada para listar os ultimos 5 anos
        $anos = $bancoHorasRepository->buscaDataAnoDistinct($id);
        
        echo $this->renderizaHtml(
            'listas/listar_banco_horas.php', 
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Teste',
                'anos' => $anos
            ]
        );
    }
}