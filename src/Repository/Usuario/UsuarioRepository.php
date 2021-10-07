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

        $sql = $conexao->prepare('INSERT INTO usuario (email, password, nome_completo) VALUES (?, ?, ?);');
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $password);
        $sql->bindParam(3, $nomeCompleto);

        if($sql->execute()) {
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $this->buscaUmUsuario($email);
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

    public function buscaUmUsuario(string $param)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM usuario WHERE email = ?;");
        $sql->bindParam(1, $param);

        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public function login(string $email, string $password)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare('SELECT * FROM usuario WHERE email = ? AND password = ?;');
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $password);
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public function updateUsuario(Usuario $usuario)
    {
        $conexao = (new DataBase())->conexao();

        $email = $usuario->getEmail();
        $password = $usuario->getPassword();
        $nomeCompleto = $usuario->getNomeCompleto();

        // refatorar isso para outro metodo
        $usuarioExistente = $this->buscaUmUsuario($email);

        if($usuarioExistente['email'] != $email){
            return false;
        }

        $sql = $conexao->prepare("UPDATE usuario SET nome_completo = ?, email = ?, password = ? WHERE email = ?;");
        $sql->bindParam(1, $nomeCompleto);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $password);
        $sql->bindParam(4, $email);

        if($sql->execute()) {
            $_SESSION['usuario'] = $this->buscaUmUsuario($email);
            return true;
        }

        return false;
    }
}