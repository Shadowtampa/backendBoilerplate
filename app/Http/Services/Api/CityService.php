<?php

namespace App\Http\Services\Api;

use App\Http\Interfaces\Api\CityInterface;
use App\Http\Repositories\Api\CityRepository;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CityService implements CityInterface
{
  protected $cityRepository;

  public function __construct(
    CityRepository $cityRepository
  ) {
    $this->cityRepository = $cityRepository;
  }

  public function create(Request $request): bool
  {
    $attributes = $request->all();

    return $this->cityRepository->create($attributes);
  }

  public function read(int $id): ?City
  {
    return $this->cityRepository->read($id);
  }

  public function update(int $id, Request $request): bool
  {
    $attributes = $request->all();

    return $this->cityRepository->update($id, $attributes);
  }

  public function delete(int $id): bool
  {

    return $this->cityRepository->delete($id);
  }
  public function index(): Collection
  {
    return $this->cityRepository->index();
  }
}
