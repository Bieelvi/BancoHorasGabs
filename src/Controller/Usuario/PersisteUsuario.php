<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Factory\Usuario\UsuarioFactory;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\Usuario\UsuarioRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class PersisteUsuario implements Controller
{
    use FlashMessage;

    // refatorar isso daqui ta horrivel
    public function processaRequisicao()
    {
        $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $confPassword = filter_input(INPUT_POST, 'confPassword', FILTER_SANITIZE_STRING);

        $infUsuuario = [
            'nome_completo' => $nomeCompleto,
            'email' => $email,
            'password' => $password,
            'confPassword' => $confPassword,
        ];

        if(!$this->verificaCampos($infUsuuario)){
            $this->defineMsg('danger', 'Campos incorretos, preencha-os corretamente!');
            header('Location: /usuario');
            return;
        }

        if($password !== $confPassword){
            $this->defineMsg('danger', 'Senhas incompativeis');
            header('Location: /usuario');
            return;
        }

        $usuario = (new UsuarioFactory())->novaEntidade($infUsuuario);

        if(!(new UsuarioRepository())->insereUsuario($usuario)){
            $this->defineMsg('danger', 'Algo inesperado aconteceu. Entre em contato com o suporte!');
            header('Location: /usuario');
            return;
        }

        if((new UsuarioRepository())->insereUsuario($usuario) === null){
            $this->defineMsg('danger', 'Já existe uma conta associado a este email!');
            header('Location: /usuario');
            return;
        }

        $this->defineMsg('success', 'Usuário Criado!');
        header('Location: /listar-usuario');
    }

    // retorna FALSE caso os campos estejam corretos
    private function verificaCampos(array $inf)
    {
        if($inf['nome_completo'] == null || $inf['password'] == null || $inf['confPassword'] == null){
            return false;
        }

        if($inf['email'] === false){
            return false;
        }
        
        return true;
    }
}