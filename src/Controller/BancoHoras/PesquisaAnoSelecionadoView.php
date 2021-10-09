<?php 

namespace App\Controller\BancoHoras;

use App\Controller\Controller;
use App\Helper\RenderHtml;
use App\Repository\BancoHoras\BancoHorasRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class PesquisaAnoSelecionadoView implements Controller 
{
    use RenderHtml;

    public function processaRequisicao()
    {
        $bancoHorasRepository = new BancoHorasRepository();

        if(isset($_POST['anoEscolhido'])){
            $ano = $_POST['anoEscolhido'];
        }

        $id = $_SESSION['usuario']['id'];

        // essa variavel sera usada para listar os ultimos 5 anos
        $anos = $bancoHorasRepository->buscaDataAnoDistinct($id);

        // retorna todos os meses do usuario cadastrado no ano escolhido
        $meses = $bancoHorasRepository->buscaDataMesDistinct($id, $ano);

        // retorna uma array com todos os horarios de acordo com o ano escolhido e de cada mês
        foreach ($meses as $mes) {
            $bh = $bancoHorasRepository->buscaHorasAnoMes($id, $ano, $mes['data_mes']);

            if(!$bh == null){
                $horas[] = $bh;
            }
        }
        
        echo $this->renderizaHtml(
            'listas/listar_banco_horas.php', 
            [
                'titulo' => 'Banco Horas Gabs',
                'tituloLogo' => 'Bancho de Horas',
                'anoSelecionado' => $_POST['anoEscolhido'],
                'anos' => $anos,
                'bancoHoras' => isset($horas) ? $horas : null,
            ]
        );
    }
}