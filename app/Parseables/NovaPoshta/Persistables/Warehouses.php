<?php

namespace App\Parseables\NovaPoshta\Persistables;

use App\Models\City;
use App\Models\Warehouse;

class Warehouses implements Persistable
{
  protected array $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }
  public function create(array $item)
  {
    $warehouse = new Warehouse();

    $warehouse->name = [
      'uk' => $item['Description'],
      'ru' => $item['DescriptionRu'],
    ];
    $warehouse->number = $item['Number'];
    $warehouse->ref = $item['Ref'];

    $warehouse->city()->associate(City::whereRef($item['CityRef'])->first());

    $warehouse->save();
  }

  public function createMultiple()
  {
    foreach ($this->data as $item) {
      $this->create($item);
    }
  }
}
