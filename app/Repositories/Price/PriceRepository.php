<?php

namespace App\Repositories\Price;

use App\Models\Price;
use App\Repositories\BaseRepository;

class PriceRepository extends BaseRepository implements PriceRepositoryInterface
{
    public function __construct(Price $model)
    {
        parent::__construct($model);
    }
}
