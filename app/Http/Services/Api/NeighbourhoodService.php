<?php

namespace App\Http\Services\Api;

use App\Http\Interfaces\Api\NeighbourhoodInterface;
use App\Http\Repositories\Api\NeighbourhoodRepository;
use App\Models\Neighbourhood;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class NeighbourhoodService implements NeighbourhoodInterface
{
  protected $neighbourhoodRepository;

  public function __construct(
    NeighbourhoodRepository $neighbourhoodRepository
  ) {
    $this->neighbourhoodRepository = $neighbourhoodRepository;
  }

  public function create(Request $request): bool
  {
    $attributes = $request->all();

    return $this->neighbourhoodRepository->create($attributes);
  }

  public function read(int $id): ?Neighbourhood
  {
    return $this->neighbourhoodRepository->read($id);
  }

  public function update(int $id, Request $request): bool
  {
    $attributes = $request->all();

    return $this->neighbourhoodRepository->update($id, $attributes);
  }

  public function delete(int $id): bool
  {

    return $this->neighbourhoodRepository->delete($id);
  }
  public function index(): Collection
  {
    return $this->neighbourhoodRepository->index();
  }
}
