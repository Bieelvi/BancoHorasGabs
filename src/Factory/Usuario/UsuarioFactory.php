<?php 

namespace App\Factory\Usuario;

use App\Entity\Usuario\Usuario;

include_once __DIR__ . '/../../../vendor/autoload.php';

class UsuarioFactory 
{
    public function novaEntidade($entitdade): Usuario
    {
        return (new Usuario())
            ->setNomeCompleto($entitdade['nome_completo'])
            ->setEmail($entitdade['email'])
            ->setPassword($entitdade['password'])
        ;
    }

    public function novaEntidadeComSenhaCriptografada($entitdade): Usuario
    {
        return (new Usuario())
            ->setNomeCompleto($entitdade['nome_completo'])
            ->setEmail($entitdade['email'])
            ->criptografaSenha($entitdade['password'])
        ;
    }
}