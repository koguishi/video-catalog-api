<?php

namespace test\unit\domain\entity;

use core\domain\entity\Categoria;
use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase
{
    public function testCriarCategoria()
    {
        $nome = 'treinos de kata';
        $descricao = 'videos sobre treinos de kata';
        $ativo = true;

        $categoria = new Categoria(
            nome: $nome,
            descricao: $descricao,
            ativo: $ativo
        );

        $this->assertEquals($categoria->nome, $nome);
        $this->assertEquals($categoria->descricao, $descricao);
        $this->assertEquals($categoria->ativo, $ativo);
    }
}