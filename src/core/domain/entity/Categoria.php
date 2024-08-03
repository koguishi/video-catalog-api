<?php

namespace core\domain\entity;

use core\domain\entity\traits\MagicMethodsTrait;
use core\domain\exception\EntityValidationException;

class Categoria
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $nome,
        protected string $descricao = '',
        protected bool $ativo = true,
    )
    {
        $this->validate();
    }

    private function validate()
    {
        if (empty($this->nome)) {
            throw new EntityValidationException("Nome inválido");
        }

        if (!empty($this->nome) && (strlen($this->nome) < 3 || strlen($this->nome) > 100)) {
            throw new EntityValidationException("Nome inválido");
        }

        if (!empty($this->descricao) && (strlen($this->descricao) < 3 || strlen($this->descricao) > 255)) {
            throw new EntityValidationException("Nome inválido");
        }
    }

    public function desativar()
    {
        $this->ativo = false;
    }

    public function ativar()
    {
        $this->ativo = true;
    }

    public function alterar(
        string $nome,
        string $descricao = null,
    )
    {
        $this->nome = $nome;
        $this->descricao = $descricao ?? $this->descricao;

        $this->validate();
    }
}