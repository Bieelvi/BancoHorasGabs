<?php 

namespace App\Controller\Usuario;

use App\Controller\Controller;

class Logout implements Controller  
{
	public function processaRequisicao()
    {
        session_destroy();
        header('Location: /login');
    }
}