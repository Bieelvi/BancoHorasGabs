<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Helper\RenderHtml;
use App\Repository\Usuario\UsuarioRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class LoginController implements Controller
{
    use RenderHtml;

    public function processaRequisicao()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $infUsuario = [
            'email' => $email,
            'password' => $password,
        ];

        $login = (new UsuarioRepository())->login($email, $password);

        if($login !== false){
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $login;
        }

        header('Location: /perfil-usuario');
    }
}