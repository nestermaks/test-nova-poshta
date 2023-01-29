<?php

namespace App\Parseables\NovaPoshta\Persistables;

use App\Models\City;

class Cities implements Persistable
{
  public array $data;

  public function __construct(array $data)
  {
    $this->data = $data;
    $this->exclude(config('nova_poshta.parser.excluded'));
  }

  public function createMultiple()
  {
    foreach ($this->data as $item) {
      $this->create($item);
    }
  }

  protected function exclude(array $excluded)
  {
    foreach ($this->data as $key => $item) {
      if (in_array($item['DescriptionRu'], $excluded)) {
        unset($this->data[$key]);
      }
    }
  }

  public function create(array $item)
  {
    $city = new City();

    $city->name = [
      'uk' => $item['Description'],
      'ru' => $item['DescriptionRu'],
    ];
    $city->ref = $item['Ref'];

    $oblast = new Oblasts($item);
    $city->oblast()->associate($oblast->getOrCreate());

    $city->save();
  }
}
