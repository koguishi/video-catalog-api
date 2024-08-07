<?php

namespace core\usecase\categoria;

use core\domain\entity\Categoria;
use core\domain\repository\CategoriaRepositoryInterface;

class CreateCategoriaUsecase
{
    protected CategoriaRepositoryInterface $repository;

    public function __construct(CategoriaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateCategoriaInput $input): CreateCategoriaOutput
    {
        $categoria = new Categoria(
            nome: $input->nome,
            descricao: $input->descricao,
            ativo: $input->ativo,
        );
        
        $categoriaCriada = $this->repository->create($categoria);

        return new CreateCategoriaOutput(
            id: $categoriaCriada->id(),
            nome: $input->nome,
            descricao: $input->descricao,
            ativo: $input->ativo,
            // criado_em: $categoriaCriada->criado_em
        );
    }
}
