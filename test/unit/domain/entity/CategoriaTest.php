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

        $categoria = new Categoria(
            nome: $nome,
            descricao: $descricao,
        );

        $this->assertEquals($categoria->nome, $nome);
        $this->assertEquals($categoria->descricao, $descricao);
        $this->assertEquals($categoria->ativo, true);
    }

    public function testCriarCategoriaApenasComNome()
    {
        $nome = 'treinos de kata';

        $categoria = new Categoria(
            nome: $nome,
        );

        $this->assertEquals($categoria->nome, $nome);
        $this->assertEquals($categoria->descricao, '');
        $this->assertEquals($categoria->ativo, true);
    }

    public function testDesativarCategoria()
    {
        $nome = 'treinos de kata';
        $descricao = 'videos sobre treinos de kata';

        $categoria = new Categoria(
            nome: $nome,
            descricao: $descricao
        );

        $categoria->desativar();

        $this->assertEquals($categoria->nome, $nome);
        $this->assertEquals($categoria->descricao, $descricao);
        $this->assertEquals($categoria->ativo, false);
    }

    public function testAtivarCategoria()
    {
        $nome = 'treinos de kata';
        $descricao = 'videos sobre treinos de kata';

        $categoria = new Categoria(
            nome: $nome,
            descricao: $descricao,
            ativo: false
        );

        $categoria->ativar();

        $this->assertEquals($categoria->ativo, true);
    }

}