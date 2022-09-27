<?php

namespace App\Http\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface BaseInterface
{
  public function index(): Collection;
  public function create(Request $request) : bool;
  public function read(int $id) : ?object;
  public function update(int $id, Request $request) : bool;
  public function delete(int $id) : bool;
}