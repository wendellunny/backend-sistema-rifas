<?php

namespace App\Models\Repositories;

use App\Models\Raffle;
use App\Models\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaffleRepository  extends  Repository
{
    public function __construct(protected Raffle $model)
    {}
}
