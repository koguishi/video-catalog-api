<?php

namespace core\usecase\categoria;

class UpdateCategoriaOutput
{
    public function __construct(
        public string $id,
        public string $nome,
        public string $descricao = '',
        public bool $ativo = true,
        public string $criadoEm = ''
    ) { }
}
