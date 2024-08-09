<?php

namespace test\unit\usecase\categoria;

use core\domain\entity\Categoria;
use core\domain\repository\CategoriaRepositoryInterface;
use core\usecase\categoria\UpdateCategoriaInput;
use core\usecase\categoria\UpdateCategoriaOutput;
use core\usecase\categoria\UpdateCategoriaUsecase;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use stdClass;

class UpdateCategoriaUsecaseTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    // private $mockEntity;

    public function testUpdateCategoria()
    {
        $uuid = (string) Uuid::uuid4()->toString();
        $nome = 'Name';
        $descricao = 'Desc';

        $mockEntity = Mockery::mock(Categoria::class, [
            $uuid, $nome, $descricao,
        ]);
        $mockEntity->shouldReceive('alterar');
        $mockEntity->shouldReceive('id')->andReturn($uuid);
        $mockEntity->shouldReceive('criadoEm')->andReturn(date('Y-m-d H:i:s'));

        /**
         * @var CategoriaRepositoryInterface|MockInterface $mockRepo
         */
        $mockRepo = Mockery::mock(stdClass::class, CategoriaRepositoryInterface::class);
        $mockRepo->shouldReceive('read')->andReturn($mockEntity);
        $mockRepo->shouldReceive('update')->andReturn($mockEntity);

        /**
         * @var UpdateCategoriaInput|MockInterface $mockInputDto
         */
        $mockInputDto = Mockery::mock(UpdateCategoriaInput::class, [
            $uuid,
            'new name',
        ]);

        $useCase = new UpdateCategoriaUsecase($mockRepo);
        $response = $useCase->execute($mockInputDto);

        $this->assertInstanceOf(UpdateCategoriaOutput::class, $response);
        $this->assertEquals($response->nome, $mockInputDto->nome);
        $this->assertEquals($response->descricao, $mockInputDto->descricao);

    }
}