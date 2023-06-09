<?php

namespace App\Models\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function list(): Collection;

    public function create(array $data): Model;

    public function update(int|string $id, array $data): int|string;

    public function delete(int|string $id): int|String;
}
