<?php

namespace App\Parseables\NovaPoshta\Persistables;

use App\Models\Oblast;

class Oblasts implements Persistable
{
  protected array $data;
  protected string $ref;
  protected string $ru_name_key = 'AreaDescriptionRu';
  protected string $uk_name_key = 'AreaDescription';

  public function __construct(array $data, bool $isRelatedData = true)
  {
    if (!$isRelatedData) {
      $this->ru_name_key = 'DescriptionRu';
      $this->uk_name_key = 'Description';
      $this->ref = $data['Ref'];
    } else {
      $this->ref = $data['Area'];
    }

    $this->data = $data;
  }

  public function createMultiple()
  {
    foreach ($this->data as $item) {
      $this->create($item);
    }
  }

  public function create(array $item)
  {
    $oblast = new Oblast();

    $oblast->name = [
      'uk' => $item[$this->uk_name_key],
      'ru' => $item[$this->ru_name_key],
    ];
    $oblast->ref = $this->ref;

    $oblast->save();
  }

  public function getOrCreate()
  {
    return Oblast::firstOrCreate(
      ['ref' => $this->ref],
      ['name' => [
        'uk' => $this->data[$this->uk_name_key],
        'ru' => $this->data[$this->ru_name_key]
      ]],
    );
  }
}
