<?php

namespace App\Http\Repositories\Api;

use App\Http\Repositories\BaseRepository;
use App\Models\City;

class CityRepository extends BaseRepository
{
    protected $city;

    public function __construct(City $city)
    {

        parent::__construct($city);
    }
}
