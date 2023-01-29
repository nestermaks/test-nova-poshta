<?php

namespace App\Parseables\NovaPoshta\Persistables;

interface Persistable
{
  public function create(array $item);
  public function createMultiple();
}
