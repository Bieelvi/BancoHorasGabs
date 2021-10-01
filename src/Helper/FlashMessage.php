<?php 

namespace App\Helper;

trait FlashMessage
{
    public function defineMsg(string $tipo, string $msg): void 
    {
		$_SESSION['tipo_msg'] = $tipo;
		$_SESSION['msg'] = $msg;
	}
}