<?php

namespace test\unit\usecase\categoria;

use core\domain\entity\Categoria;
use core\domain\repository\CategoriaRepositoryInterface;
use core\usecase\categoria\CreateCategoriaInput;
use core\usecase\categoria\CreateCategoriaOutput;
use core\usecase\categoria\CreateCategoriaUsecase;
use Mockery;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use stdClass;

class CreateCategoriaUsecaseTest extends TestCase
{
    public function testCreateCategoria()
    {
        $id = (string) Uuid::uuid4()->toString();
        $nome = 'categoria A';
        $descricao = 'descrição da categoria A';
        $ativo = false;

        $categoria = new Categoria($id, $nome, $descricao, $ativo);
        var_dump($categoria);
        // $mockCategoria = Mockery::mock(
        //     Categoria::class,
        //     [ $id, $nome, $descricao ],
        // );
        // $mockCategoria->shouldReceive('id')->andReturn($id);

        $mockRepo = Mockery::mock(
            stdClass::class,
            CategoriaRepositoryInterface::class,
        );
        $mockRepo->shouldReceive('create')->andReturn($categoria);

        $input = new CreateCategoriaInput(nome: $nome);

        $usecase = new CreateCategoriaUsecase($mockRepo);
        $response = $usecase->execute($input);

        $this->assertInstanceOf(CreateCategoriaOutput::class, $response);
        $this->assertEquals($response->id, $id);
        $this->assertEquals($response->nome, $nome);
        $this->assertEquals($response->descricao, $descricao);
        $this->assertEquals($response->ativo, $ativo);
        $this->assertNotEmpty($response->criadoEm);

        Mockery::close();
    }
}