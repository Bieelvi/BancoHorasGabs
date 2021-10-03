<?php 

namespace App\Factory\BancoHoras;

use App\Entity\BancoHoras\BancoHoras;

include_once __DIR__ . '/../../../vendor/autoload.php';

class BancoHorasFactory 
{
    public function novaEntidade($entitdade): BancoHoras
    {
        return (new BancoHoras())
            ->setUsuario($entitdade['usuario'])
            ->setNomeEmpresa($entitdade['nome_empresa'])
            ->setData($entitdade['data'])
            ->setHorarioEntrada($entitdade['horario_entrada'])
            ->setHorarioEntradaAlmoco($entitdade['horario_entrada_almoco'])
            ->setHorarioRetorno($entitdade['horario_retorno'])
            ->setHorarioSaida($entitdade['horario_saida'])
            ->setHoraTrabalhadasDia($entitdade['horas_trabalhadas_dia'])
            ->setExcessao($entitdade['excessao'])
            ->setObservacao($entitdade['observacao'])
            ->setHorasTotaisMinutos($entitdade['horas_totais_minutos'])
        ;
    }
}