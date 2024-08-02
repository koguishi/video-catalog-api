<?php

namespace core\domain\entity;

use core\domain\entity\traits\MagicMethodsTrait;

class Categoria
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $nome,
        protected string $descricao = '',
        protected bool $ativo = true,
    ) { }

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
    }
}