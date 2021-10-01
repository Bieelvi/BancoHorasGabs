<?php 

namespace App\Repository\Usuario;

use App\Entity\Usuario\Usuario;
use App\Infra\DataBase;

include_once __DIR__ . '/../../../vendor/autoload.php';

class UsuarioRepository
{
    public function insereUsuario(Usuario $usuario)
    {
        $conexao = (new DataBase())->conexao();

        $email = $usuario->getEmail();
        $password = $usuario->getPassword();
        $nomeCompleto = $usuario->getNomeCompleto();

        if($this->buscaUmUsuario('email', $email) != false){
            return null;
        }

        $sql = $conexao->prepare('INSERT INTO usuario (email, password, nome_completo) VALUES (?, ?, ?);');
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $password);
        $sql->bindParam(3, $nomeCompleto);
        $sql->execute();

        if($sql->rowCount()) {
            return true;
        }

        return false;
    }

    public function buscaUsuario()
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare('SELECT * FROM usuario');
        $sql->execute();

        return $sql->fetchAll();
    }

    public function buscaUmUsuario($paramBusca, $param)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM usuario WHERE " . $paramBusca . " = ?;");
        $sql->bindParam(1, $param);

        $sql->execute();

        return $sql->fetchAll();
    }
}