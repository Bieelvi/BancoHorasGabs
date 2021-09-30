<?php 

namespace App\Repository\Usuario;

use App\Entity\Usuario\Usuario;
use App\Infra\DataBase;

include_once __DIR__ . '/../../../vendor/autoload.php';

class UsuarioRepository
{
    public function insereUsuairo(Usuario $usuario)
    {
        $conexao = (new DataBase())->conexao();

        $email = $usuario->getEmail();
        $password = $usuario->getPassword();
        $nomeCompleto = $usuario->getNomeCompleto();

        $sql = $conexao->prepare('INSERT INTO usuario (email, password, nome_completo) VALUES (?, ?, ?);');
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $password);
        $sql->bindParam(3, $nomeCompleto);

        $sql->execute();

        return 'Usuario: ' . $usuario->getNomeCompleto() . ' adicionado com sucesso!';
    }
}