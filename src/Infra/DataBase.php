<?php

namespace App\Infra;

class DataBase
{
    private string $server;
    private string $user;
    private string $password;
    private string $dbName;

    public function conexao()
    {
        try {
            $this->server = 'localhost';
            $this->user = 'root';
            $this->password = 'vJn27trLE7V7Q22phk2mHfNah';
            $this->dbName = 'banco_horas';

            $conexao = new \PDO('mysql:host='.$this->server.';dbname='.$this->dbName, $this->user, $this->password);
            $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conexao;
        } catch (\PDOException $e) {
           return 'Erro: ' . $e->getMessage();
        }
    }
}