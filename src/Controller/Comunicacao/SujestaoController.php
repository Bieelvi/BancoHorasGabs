<?php

namespace App\Controller\Comunicacao;

use App\Controller\Controller;
use App\Helper\FlashMessage;

include_once __DIR__ . '/../../../vendor/autoload.php';

class SujestaoController implements Controller
{
    use FlashMessage;

    public function processaRequisicao()
    {
        // pensar em como fazer uma verificaoes nos campos de q vem dos usuarios, talvez uma trait???
        $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);

        if ($assunto == 'Escolher') {
            $this->defineMsg('danger', 'Selecione um assunto');
            header('Location: /sujestao');
            exit;
        }

        // nome do usuario logado
        $quemMandou = $_SESSION['usuario']['nome_completo'];

        $email = (new Email())->sendEmail($quemMandou, $assunto, $conteudo);

        if ($email) {
            $this->defineMsg('success', 'Sujestão enviado com sucesso! Muito obrigado por colocaborar conosco!');
            header('Location: /sujestao');
            exit;
        } else {
            $this->defineMsg('danger', 'Algo Inesperado aconteceu!');
            header('Location: /sujestao');
            exit;
        }
    }
}