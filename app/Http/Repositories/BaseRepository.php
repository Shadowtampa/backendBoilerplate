<?php

namespace App\Http\Repositories;

class BaseRepository
{
    protected $obj;

    public function __construct(object $obj)
    {
        $this->obj = $obj;
    }

    public function create(array $attributes): bool
    {
        $this->obj->create($attributes);

        return true;
    }
    public function read(int $id): ?object
    {
        return $this->obj->find($id);
    }
    public function update(int $id, array $attributes): bool
    {
        $instance_obj = $this->obj->where('id', $id)->first();

        if ($instance_obj === null) {
            return false;
        }

        $instance_obj->update($attributes);
        return true;
    }
    public function delete(int $id): bool
    {
        $instance_obj = $this->obj->where('id', $id)->first();

        if ($instance_obj === null) {
            return false;
        }

        return $instance_obj->delete();
    }
    public function index(): object
    {
        return $this->obj->all();
    }
}
