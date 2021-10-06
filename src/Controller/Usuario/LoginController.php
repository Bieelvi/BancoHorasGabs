<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
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

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $infUsuario = [
            'email' => $email,
            'password' => $password,
        ];

        if($infUsuario['email'] == null && $infUsuario['password'] == null){
            $this->defineMsg('danger', 'Preencha todos os campos!');
            header('Location: /login');
            return;
        }

        $login = $usuarioRepository->login($email, $password);

        if($login !== false){
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $login;
            $this->defineMsg('success', 'Logado');
            header('Location: /perfil-usuario');
            return;
        }

        $this->defineMsg('danger', 'Credenciais incorretas');
        header('Location: /login');
        return;
    }
}