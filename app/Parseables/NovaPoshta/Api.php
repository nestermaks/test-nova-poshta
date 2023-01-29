<?php

namespace App\Parseables\NovaPoshta;

use Illuminate\Support\Facades\Http;

class Api
{
  protected $url = 'https://api.novaposhta.ua/v2.0/json/';
  public $data;

  public function cities()
  {
    $body = [
      'apiKey' => "",
      "modelName" => "Address",
      "calledMethod" => "getCities",
      "methodProperties" => [
        "Page" => "1",
        "Limit" => config('nova_poshta.parser.amount'),
      ]
    ];

    $this->data = $this->call($body)->data;

    return $this;
  }

  public function warehouses(string $CityRef)
  {
    $body = [
      'apiKey' => "",
      "modelName" => "Address",
      "calledMethod" => "getWarehouses",
      "methodProperties" => [
        "Page" => "1",
        'CityRef' => $CityRef,
      ]
    ];

    $this->data = $this->call($body)->data;

    return $this;
  }

  protected function call($body)
  {
    $this->data = Http::post($this->url, $body);
    sleep(0.5);

    return $this;
  }

  public function toArray()
  {
    $this->data = json_decode($this->data, true)['data'];

    return $this;
  }

  public function write($file_name)
  {
    file_put_contents('app/Parseables/NovaPoshta/' . $file_name . '.json', $this->data);
  }

  public function get()
  {
    return $this->data;
  }
}
