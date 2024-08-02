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
}