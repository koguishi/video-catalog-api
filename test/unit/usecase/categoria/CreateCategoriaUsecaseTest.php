<?php

namespace test\unit\usecase\categoria;

use core\domain\entity\Categoria;
use core\domain\repository\CategoriaRepositoryInterface;
use core\usecase\categoria\CreateCategoriaInput;
use core\usecase\categoria\CreateCategoriaOutput;
use core\usecase\categoria\CreateCategoriaUsecase;
use Mockery;
use PHPUnit\Framework\TestCase;
use stdClass;

class CreateCategoriaUsecaseTest extends TestCase
{
    public function testCreateCategoria()
    {
        $id = '1';
        $nome = 'categoria A';
        $mockCategoria = Mockery::mock(
            Categoria::class,
            [ $nome ],
        );
        $mockCategoria->shouldReceive('id')->andReturn($id);

        $mockRepo = Mockery::mock(
            stdClass::class,
            CategoriaRepositoryInterface::class,
        );
        $mockRepo->shouldReceive('create')->andReturn($mockCategoria);

        $input = new CreateCategoriaInput(nome: $nome);

        $usecase = new CreateCategoriaUsecase($mockRepo);
        $response = $usecase->execute($input);

        $this->assertInstanceOf(CreateCategoriaOutput::class, $response);
        $this->assertEquals($nome, $response->nome);
        $this->assertEquals('', $response->descricao);

        Mockery::close();
    }
}