<?php

namespace core\domain\repository;

use core\domain\entity\Categoria;

interface CategoriaRepositoryInterface
{
    public function create(Categoria $categoria): Categoria;
    public function read(string $id): Categoria;
    public function update(Categoria $categoria): Categoria;
    public function delete(string $id): void;

    public function readAll(string $filter = '', string $order = 'DESC'): array;
}
