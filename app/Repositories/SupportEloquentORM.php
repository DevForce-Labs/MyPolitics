<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO};
use App\DTO\{UpdateSupportDTO};
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ){}

    public function getAll(string $filter = null): array
    {
        // dd($this->model->all()->toArray());
        return $this->model
                    ->where(function ($query) use ($filter) { 
                        if($filter) {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");

                        }
                    })
                    // ->paginate()
                    ->get()
                    ->toArray();

                    // 6.30 aula 22
    }

    public function findOne(string $id): stdClass|null
    {
        // $support = (object) $this->model->find($id)->toArray();

        $support = $this->model->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();

    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)-delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if ($support = $this->model->find($dto->id)) {
            return null;
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }

}