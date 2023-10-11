<?php

// TODA LÓGICA É TRANSPORTADA PRA CÁ COMO :
// ENVIAR UM EMAIL, REGISTRAR UM LOG E ETC
// TUDO É RECEBIDO AQUI

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;



class SupportService
{

    // protected $repository;

    public function __construct(
        protected SupportRepositoryInterface $repository,
    ) {}

    public function getAll(string $filter = null): array
    {
       return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSupportDTO $dto): stdClass 
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id):  void //bool|null
    {
        $this->repository->delete($id);
    }

    
}