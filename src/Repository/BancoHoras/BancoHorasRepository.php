<?php 

namespace App\Repository\BancoHoras;

use App\Infra\DataBase;

include_once __DIR__ . '/../../../vendor/autoload.php';

class BancoHorasRepository 
{
    public function insereBancoHoras()
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("INSERT INTO banco_horas () VALUES ();");
    }
    
    public function buscaBancoHoras()
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM banco_horas;");
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}