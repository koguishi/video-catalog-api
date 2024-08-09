<?php

namespace test\unit\usecase\categoria;

use core\domain\entity\Categoria;
use core\domain\repository\CategoriaRepositoryInterface;
use core\usecase\categoria\CreateCategoriaInput;
use core\usecase\categoria\CreateCategoriaOutput;
use core\usecase\categoria\CreateCategoriaUsecase;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use stdClass;

class CreateCategoriaUsecaseTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testCreateCategoria()
    {
        // $id = (string) Uuid::uuid4()->toString();
        // $nome = 'categoria A';
        // $descricao = 'descrição da categoria A';

        $categoria = new Categoria(
            nome: 'categoria A',
            descricao: 'descrição da categoria A',
        );
        // var_dump($categoria);
        // $mockCategoria = Mockery::mock(
        //     Categoria::class,
        //     [ $id, $nome , $descricao, $ativo ],
        // );
        // $mockCategoria->shouldReceive('id')->andReturn($id);

        /**
         * @var CategoriaRepositoryInterface|MockInterface $mockRepo
         */
        $mockRepo = Mockery::mock(
            stdClass::class,
            CategoriaRepositoryInterface::class,
        );
        $mockRepo->shouldReceive('create')->andReturn($categoria);

        $input = new CreateCategoriaInput(
            nome: $categoria->nome,
            descricao: $categoria->descricao,
            ativo: $categoria->ativo,
        );

        $usecase = new CreateCategoriaUsecase($mockRepo);
        $response = $usecase->execute($input);
        // var_dump($response);

        $this->assertInstanceOf(CreateCategoriaOutput::class, $response);
        $this->assertEquals($response->id, $categoria->id());
        $this->assertEquals($response->nome, $categoria->nome);
        $this->assertEquals($response->descricao, $categoria->descricao);
        $this->assertEquals($response->ativo, $categoria->ativo);
        $this->assertNotEmpty($response->criadoEm, $categoria->criadoEm());

        // Mockery::close();
    }
}