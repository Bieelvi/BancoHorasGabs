<?php 

namespace App\Controller\Comunicacao;

use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

include_once __DIR__ . '/../../../vendor/autoload.php';

class Email 
{
    const HOST = 'smtp.titan.email';
    const USER = 'contato@bhgabs.com.br';
    const PASS = 'Gabrielvictor13';
    const SECURE = 'SSL';
    const PORT = 587;
    const CHARSET = 'UTF-8';

    private $erro;

    public function sendEmail($usuarios, $subject, $body)
    {
        $oEmail = new PHPMailer(true);

        try {
            $oEmail->isSMTP(true);
            $oEmail->Host = self::HOST;
            $oEmail->SMTPAuth = true;
            $oEmail->Username = self::USER;
            $oEmail->Password = self::PASS;
            $oEmail->SMTPSecure = self::SECURE;
            $oEmail->Port = self::PORT;
            $oEmail->CharSet = self::CHARSET;

            $oEmail->setFrom(self::USER, $usuarios);

            $oEmail->addAddress(self::USER);

            $oEmail->isHTML(true);
            $oEmail->Subject = $subject;
            $oEmail->Body = $body;

            return $oEmail->send();

        } catch (PHPMailerException $e) {
            $this->setErro($e->getMessage());

            return false;
        }
    }

    public function getErro()
    {
        return $this->erro;
    }

    public function setErro($erro): self
    {
        $this->erro = $erro;

        return $this;
    }
}
