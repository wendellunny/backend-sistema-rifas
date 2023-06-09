<?php

namespace App\Models\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{

    public function list(): Collection
    {
        return $this->model->query()->get();
    }

    public function create(array $data): Model
    {
        return $this->model->query()->create($data);
    }

    public function update(int|string $id, array $data): int|string
    {
        $field = gettype($id) == 'integer' ? 'id' : 'uuid';
        return $this->model->query()->where($field, $id)->update($data);
    }

    public function delete(int|string $id): int|string
    {
        $field = gettype($id) == 'integer' ? 'id' : 'uuid';
        return $this->model->query()->where($field, $id)->delete();
    }

    public function __call(string $name, array $arguments)
    {
        $start = substr($name, 0, 6);
        if ($start != 'findBy') {
            throw new \Exception("Method `{$name}` doesnt exists");
        }

        $field = strtolower(str_replace('findBy', '', $name));

        $result = $this->model->query()->where($field, $arguments[0]);

        if ($result->count() > 1) {
            return $result;
        }

        return $result->first();
    }
}
