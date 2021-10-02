<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;
use App\Helper\RenderHtml;
use App\Repository\Usuario\UsuarioRepository;

include_once __DIR__ . '/../../../vendor/autoload.php';

class ListarUsuario implements Controller
{
    use RenderHtml;

    public function processaRequisicao()
    {
        $usuarios = (new UsuarioRepository())->buscaUsuario();

        echo $this->renderizaHtml(
            'listas/listar_usuarios.php', 
            [
                'titulo' => 'Lista de Usuarios', 
                'usuarios' => $usuarios,
            ]
        );
    }
}