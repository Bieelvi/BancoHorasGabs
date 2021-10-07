<?php 

namespace App\Entity\BancoHoras;

class BancoHoras 
{
    private int $usuario;
    private string $nomeEmpresa;
    private string $data;
    private string $horarioEntrada;
    private string $horarioEntradaAlmoco;
    private string $horarioRetorno;
    private string $horarioSaida;
    private string $horaTrabalhadasDia;
    private string $excessao;
    private string $observacao;
    private int $horasTotaisMinutos;

    public function getUsuario(): ?int
    {
        return $this->usuario;
    }

    public function setUsuario(int $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getNomeEmpresa(): ?string
    {
        return $this->nomeEmpresa;
    }

    public function setNomeEmpresa(string $nomeEmpresa): self
    {
        $this->nomeEmpresa = $nomeEmpresa;
        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getHorarioEntrada(): ?string
    {
        return $this->horarioEntrada;
    }

    public function setHorarioEntrada(string $horarioEntrada): self
    {
        $this->horarioEntrada = $horarioEntrada;
        return $this;
    }

    public function getHorarioEntradaAlmoco(): ?string
    {
        return $this->horarioEntradaAlmoco;
    }

    public function setHorarioEntradaAlmoco(string $horarioEntradaAlmoco): self
    {
        $this->horarioEntradaAlmoco = $horarioEntradaAlmoco;
        return $this;
    }

    public function getHorarioRetorno(): ?string
    {
        return $this->horarioRetorno;
    }

    public function setHorarioRetorno(string $horarioRetorno): self
    {
        $this->horarioRetorno = $horarioRetorno;
        return $this;
    }

    public function getHorarioSaida(): ?string
    {
        return $this->horarioSaida;
    }

    public function setHorarioSaida(string $horarioSaida): self
    {
        $this->horarioSaida = $horarioSaida;
        return $this;
    }

    public function getHoraTrabalhadasDia(): ?string
    {
        return $this->horaTrabalhadasDia;
    }

    public function setHoraTrabalhadasDia(string $horaTrabalhadasDia): self
    {
        $this->horaTrabalhadasDia = $horaTrabalhadasDia;
        return $this;
    }

    public function getExcessao(): ?string
    {
        return $this->excessao;
    }

    public function setExcessao(string $excessao): self
    {
        $this->excessao = $excessao;
        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(string $observacao): self
    {
        $this->observacao = $observacao;
        return $this;
    }

    public function getHorasTotaisMinutos(): ?int
    {
        return $this->horasTotaisMinutos;
    }

    public function setHorasTotaisMinutos(int $horasTotaisMinutos): self
    {
        $this->horasTotaisMinutos = $horasTotaisMinutos;
        return $this;
    }
}