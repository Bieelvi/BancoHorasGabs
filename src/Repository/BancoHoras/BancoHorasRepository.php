<?php 

namespace App\Repository\BancoHoras;

use App\Entity\BancoHoras\BancoHoras;
use App\Infra\DataBase;

include_once __DIR__ . '/../../../vendor/autoload.php';

class BancoHorasRepository 
{
    public function insereBancoHoras(BancoHoras $bancoHoras)
    {
        $conexao = (new DataBase())->conexao();

        $usuario = $bancoHoras->getUsuario();
        $nomeEmpressa = $bancoHoras->getNomeEmpresa();
        $data = $bancoHoras->getData();
        $horarioEntrada = $bancoHoras->getHorarioEntrada();
        $horarioEntradaAlmoco = $bancoHoras->getHorarioEntradaAlmoco();
        $horarioRetorno = $bancoHoras->getHorarioRetorno();
        $horarioSaida = $bancoHoras->getHorarioSaida();
        $horasTrabalhadasDia = $bancoHoras->getHoraTrabalhadasDia();
        $excessao = $bancoHoras->getExcessao();
        $observacao = $bancoHoras->getObservacao();
        $horas_totais_minutos = $bancoHoras->getHorasTotaisMinutos();

        $dataAno = explode('-', $data, 3)[0];
        $dataMes = explode('-', $data, 3)[1];
        $dataDia = explode('-', $data, 3)[2];

        $sql = $conexao->prepare("INSERT INTO banco_horas (usuario_id, nome_empresa, data_ano, data_mes, data_dia, horario_entrada, horario_entrada_almoco, horario_retorno_almoco, horario_saida, horas_trabalhadas_dia, excessao, observacao, horas_totais_minutos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $sql->bindParam(1, $usuario,\PDO::PARAM_INT);
        $sql->bindParam(2, $nomeEmpressa, \PDO::PARAM_STR);
        $sql->bindParam(3, $dataAno, \PDO::PARAM_STR);
        $sql->bindParam(4, $dataMes, \PDO::PARAM_STR);
        $sql->bindParam(5, $dataDia, \PDO::PARAM_STR);
        $sql->bindParam(6, $horarioEntrada, \PDO::PARAM_STR);
        $sql->bindParam(7, $horarioEntradaAlmoco, \PDO::PARAM_STR);
        $sql->bindParam(8, $horarioRetorno, \PDO::PARAM_STR);
        $sql->bindParam(9, $horarioSaida, \PDO::PARAM_STR);
        $sql->bindParam(10, $horasTrabalhadasDia, \PDO::PARAM_STR);
        $sql->bindParam(11, $excessao, \PDO::PARAM_STR);
        $sql->bindParam(12, $observacao, \PDO::PARAM_STR);
        $sql->bindParam(13, $horas_totais_minutos, \PDO::PARAM_INT); 

        if($sql->execute()) {
            return true;
        }

        return false;
    }

    public function buscaBancoHorasUsuario(int $id)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM banco_horas WHERE usuario_id = ?;");
        $sql->bindParam(1, $id);
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    
    public function buscaBancoHoras()
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM banco_horas");
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    // metodo que retornar todos as horas cadastradas a partir do ano e mes
    public function buscaHorasAnoMes(int $id, string $ano, string $mes)
    {     
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM banco_horas WHERE usuario_id = '$id' AND data_ano = '$ano' AND data_mes = '$mes' ORDER BY data_dia DESC;");
        $sql->execute();

        if($sql->rowCount() >= 1){
            return $sql->fetchAll(\PDO::FETCH_ASSOC); 
        }

        return null;
    }

    // metodo que retorna todos os anos que o usuario tem cadastrado
    public function buscaDataAnoDistinct(int $id)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT DISTINCT data_ano FROM banco_horas WHERE usuario_id = '$id' ORDER BY data_ano DESC LIMIT 5;");
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetchAll(\PDO::FETCH_ASSOC); 
        }
        
        return null;
    }

    // metodo que retorna todos os meses que o usuario tem cadastrado a partir do ano escolhido
    public function buscaDataMesDistinct(int $id, string $ano)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT DISTINCT data_mes FROM banco_horas WHERE usuario_id = '$id' AND data_ano = '$ano' ORDER BY data_mes DESC;");
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetchAll(\PDO::FETCH_ASSOC); 
        }
        
        return null;
    }
}