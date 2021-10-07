<?php 

namespace App\Controller\BancoHoras;

use App\Controller\Controller;
use App\Factory\BancoHoras\BancoHorasFactory;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\BancoHoras\BancoHorasRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class PersisteBancoHorasController implements Controller
{
    use RenderHtml;
    use FlashMessage;

    public function processaRequisicao()
    {
        $nomeEmpresa = filter_input(INPUT_POST, 'nomeEmpresa', FILTER_SANITIZE_STRING);
        $observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        
        $horasDiarias = $this->extraiConverteHora('horasDiarias');
        $horaEntrada = $this->extraiConverteHora('horaEntrada');
        $horaEntradaAlmoco = $this->extraiConverteHora('horaEntradaAlmoco');
        $horaRetorno = $this->extraiConverteHora('horaRetorno');
        $horaSaida = $this->extraiConverteHora('horaSaida');

        $horaTotaisMinutos = $this->calculaHoraEHoraExtra($horaEntrada, $horaEntradaAlmoco, $horaRetorno, $horaSaida, $horasDiarias);

        $infBancoHoras = [
            'usuario' => $_SESSION['usuario']['id'],
            'nome_empresa' => $nomeEmpresa,
            'data' => $data,
            'horario_entrada' => $horaEntrada['tempo_completo'],
            'horario_entrada_almoco' => $horaEntradaAlmoco['tempo_completo'],
            'horario_retorno' => $horaRetorno['tempo_completo'],
            'horario_saida' => $horaSaida['tempo_completo'],
            'horas_trabalhadas_dia' => $horasDiarias['tempo_completo'],
            'excessao' => '',
            'observacao' => $observacao,
            'horas_totais_minutos' => $horaTotaisMinutos
        ];

        $this->verificaCampos($infBancoHoras);

        $bancoHoras = (new BancoHorasFactory())->novaEntidade($infBancoHoras);

        if((new BancoHorasRepository())->insereBancoHoras($bancoHoras)){
            $this->defineMsg('success', 'Dia acrescentado com sucesso!');
            header('Location: /banco-horas');
            exit;
        }
    }

    private function verificaCampos(array $dados)
    {
        if($dados['data'] == ''){
            $this->defineMsg('danger', 'Selecione uma data!');
            header('Location: /cadatrar-banco-horas');
            exit;
        }

        if($dados['nome_empresa'] == 'Escolher'){
            $this->defineMsg('danger', 'Selecione uma empresa!');
            header('Location: /cadatrar-banco-horas');
            exit;
        }
    }

    private function extraiConverteHora(string $dados)
    {
        $horaCompleto = filter_input(INPUT_POST, $dados, FILTER_SANITIZE_STRING);

        if($horaCompleto == ''){
            $this->defineMsg('danger', 'Preencha todos os campos de hora corretamente!');
            header('Location: /cadatrar-banco-horas');
            exit;
        }

        $hora = explode(':', $horaCompleto, 2);

        return [
            'hora' => intval($hora[0]),
            'minuto' => intval($hora[1]),
            'tempo_completo' => $horaCompleto,
        ];
    }

    private function calculaHoraEHoraExtra(array $horaEntrada, array $horaEntradaAlmoco, array $horaRetorno, array $horaSaida, array $horasDiarias)
    {
        $horasDiaMinutos = ($horaEntradaAlmoco['hora'] - $horaEntrada['hora'] + $horaSaida['hora'] - $horaRetorno['hora']) * 60;
        $minutoDia = ($horaEntradaAlmoco['minuto'] - $horaEntrada['minuto'] + $horaSaida['minuto'] - $horaRetorno['minuto']);
        $horasDiariasMinutos = $horasDiarias['hora'] * 60;

        $tempoEmSegundos = $horasDiaMinutos + $minutoDia;

        if($tempoEmSegundos > $horasDiariasMinutos){
            return $tempoEmSegundos - $horasDiariasMinutos;
        }

        return 0;
    }
}
