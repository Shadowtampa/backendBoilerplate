<?php

namespace App\Http\Repositories\Api;

use App\Http\Repositories\BaseRepository;
use App\Models\Neighbourhood;

class NeighbourhoodRepository extends BaseRepository
{
    protected $neighbourhood;

    public function __construct(Neighbourhood $neighbourhood)
    {
        parent::__construct($neighbourhood);
    }
}
