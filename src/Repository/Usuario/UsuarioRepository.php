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

        // caso for FALSE, continuara o codigo
        if($this->buscaUmUsuario('email', $email)){
            return false;
        }

        $sql = $conexao->prepare('INSERT INTO usuario (email, password, nome_completo) VALUES (?, ?, ?);');
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $password);
        $sql->bindParam(3, $nomeCompleto);

        if($sql->execute()) {
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $this->login($email, $password);
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

    public function buscaUmUsuario(string $paramBusca, string $param)
    {
        $conexao = (new DataBase())->conexao();

        $sql = $conexao->prepare("SELECT * FROM usuario WHERE " . $paramBusca . " = ?;");
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

        $sql = $conexao->prepare("SELECT * FROM usuario WHERE email = ? AND password = ?;");
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $password);
        $sql->execute();

        if($sql->rowCount()){
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public function updateUsuario(Usuario $usuario, int $id)
    {
        $conexao = (new DataBase())->conexao();

        $email = $usuario->getEmail();
        $password = $usuario->getPassword();
        $nomeCompleto = $usuario->getNomeCompleto();

        $usuarioExistente = $this->buscaUmUsuario('email', $email);

        if($usuarioExistente['id'] != $id){
            return false;
        }

        $sql = $conexao->prepare("UPDATE usuario SET nome_completo = ?, email = ?, password = ? WHERE id = ?;");
        $sql->bindParam(1, $nomeCompleto);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $password);
        $sql->bindParam(4, $id);

        if($sql->execute()) {
            $_SESSION['usuario'] = $this->login($email, $password);
            return true;
        }

        if($sql->rowCount()){
            return true;
        }

        return false;
    }
}