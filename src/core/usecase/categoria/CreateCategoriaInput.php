<?php

namespace core\usecase\categoria;

class CreateCategoriaInput
{
    public function __construct(
        public string $nome,
        public string $descricao = '',
        public bool $ativo = true
    ) { }
}
