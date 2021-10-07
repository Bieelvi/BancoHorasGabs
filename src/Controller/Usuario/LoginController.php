<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Factory\Usuario\UsuarioFactory;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\Usuario\UsuarioRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class LoginController implements Controller
{
    use RenderHtml;
    use FlashMessage;

    public function processaRequisicao()
    {
        $usuarioRepository = new UsuarioRepository();
        $usuarioFactory = new UsuarioFactory();

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if($email == null && $password == null){
            $this->defineMsg('danger', 'Preencha todos os campos!');
            header('Location: /login');
            return;
        }

        $usuario = $usuarioRepository->buscaUmUsuario($email);

        $infUsuario = [
            'nome_completo' => $usuario['nome_completo'],
            'email' => $usuario['email'],
            'password' => $usuario['password'],
        ];  

        $usuarioLogado = $usuarioFactory->novaEntidade($infUsuario);

        if(!$usuarioLogado->verificaSenhaCriptografada($password)){
            $this->defineMsg('danger', 'Credenciais incorretas');
            header('Location: /login');
            return;
        }

        if($usuario !== false){
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $usuario;
            $this->defineMsg('success', 'Logado');
            header('Location: /perfil-usuario');
            return;
        }
    }
}