<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Entity\Usuario\Usuario;
use App\Factory\Usuario\UsuarioFactory;
use App\Helper\FlashMessage;
use App\Repository\Usuario\UsuarioRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class UpdateUsuario implements Controller
{
    use FlashMessage;

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $confPassword = filter_input(INPUT_POST, 'confPassword', FILTER_SANITIZE_STRING);

        $infUsuuario = [
            'id' => $id,
            'nome_completo' => $nomeCompleto,
            'email' => $email,
            'password' => $password,
            'confPassword' => $confPassword,
        ];

        if(!empty($password) && ($password !== $confPassword)){
            $this->defineMsg('danger', 'Senhas incompativeis');
            header('Location: /perfil-usuario');
            return;
        }

        $usuarioExistente = (new UsuarioRepository())->buscaUmUsuario('id', $id);

        $novoNomeCompleto = $nomeCompleto !== $usuarioExistente['nome_completo'] ? $nomeCompleto : $usuarioExistente['nome_completo'];
        $novoEmail = $email !== $usuarioExistente['email'] ? $email : $usuarioExistente['email'];

        $novoPassword = empty($password) ? $usuarioExistente['password'] : $password; 
        
        echo ('Nome: ' . $novoNomeCompleto . ' Email: ' . $novoEmail . ' Password: ' . $novoPassword);
    }
}