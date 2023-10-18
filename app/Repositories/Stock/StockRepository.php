<?php

namespace App\Repositories\Stock;

use App\Models\Stock;
use App\Repositories\BaseRepository;

class StockRepository extends BaseRepository implements StockRepositoryInterface
{
    public function __construct(Stock $model)
    {
        parent::__construct($model);
    }
}
