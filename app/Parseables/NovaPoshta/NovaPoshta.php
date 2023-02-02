<?php

namespace App\Parseables\NovaPoshta;

use App\Models\City;
use App\Models\Oblast;
use App\Models\Warehouse;
use App\Parseables\NovaPoshta\Persistables\Cities;
use App\Parseables\NovaPoshta\Persistables\Persistable;
use App\Parseables\NovaPoshta\Persistables\Warehouses;
use App\Parseables\Parseable;

class NovaPoshta implements Parseable
{
  protected $api;
  protected $cities_data;

  public function __construct()
  {
    $this->api = new Api();
  }

  public function parseCities()
  {
    $this->cities_data = $this->api->cities()->toArray()->get();
    $cities = new Cities($this->cities_data);
    $this->cities_data = $cities->data;
    $this->persist($cities);
  }

  public function parseWarehouses()
  {
    foreach ($this->cities_data as $city) {
      $this->parseWarehouse($city);
    }
  }

  public function parseWarehouse(array $city)
  {
    $wareshouses_data = $this->api->warehouses($city['Ref'])->toArray()->get();
    $warehouses = new Warehouses($wareshouses_data);
    $this->persist($warehouses);
  }

  public function persist(Persistable $items)
  {
    $items->createMultiple();
  }

  public function parse()
  {
    City::truncate();
    Oblast::truncate();
    Warehouse::truncate();

    $this->parseCities();
    $this->parseWarehouses();

    return 'Parsed!';
  }
}
