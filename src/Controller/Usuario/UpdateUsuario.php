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
        $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $confPassword = filter_input(INPUT_POST, 'confPassword', FILTER_SANITIZE_STRING);

        if(!empty($password) && ($password !== $confPassword)){
            $this->defineMsg('danger', 'Senhas incompativeis');
            header('Location: /perfil-usuario');
            return;
        }

        $usuarioRepository = new UsuarioRepository();

        $usuarioExistente = $usuarioRepository->buscaUmUsuario($email);

        $novoNomeCompleto = $nomeCompleto !== $usuarioExistente['nome_completo'] ? $nomeCompleto : $usuarioExistente['nome_completo'];
        $novoEmail = $email !== $usuarioExistente['email'] ? $email : $usuarioExistente['email'];

        $novoPassword = empty($password) ? $usuarioExistente['password'] : $password; 

        $infUsuuario = [
            'nome_completo' => $novoNomeCompleto,
            'email' => $novoEmail,
            'password' => $novoPassword
        ];

        $usuarioNovo = (new UsuarioFactory())->novaEntidade($infUsuuario);
        
        $response = $usuarioRepository->updateUsuario($usuarioNovo, $email);

        if($response == false){
            $this->defineMsg('danger', 'Já existe uma conta associado a este email!');
            header('Location: /perfil-usuario');
            return;
        }

        if($response == true){
            $this->defineMsg('success', 'Dados atualizados');
            header('Location: /perfil-usuario');
            return;
        }

        $this->defineMsg('danger', 'Algo inesperado aconteceu. Contate o suporte!');
        header('Location: /perfil-usuario');
        return;
    }
}