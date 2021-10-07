<?php 

namespace App\Entity\Usuario;

class Usuario 
{
    private string $nomeCompleto;
    private string $email;
    private string $password;

    public function verificaSenhaCriptografada(string $senhaString): bool
    {
        return password_verify($senhaString, $this->getPassword());
    }

    public function criptografaSenha(string $senha)
    {
        return $this->setPassword(password_hash($senha, PASSWORD_BCRYPT));
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto(string $nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}