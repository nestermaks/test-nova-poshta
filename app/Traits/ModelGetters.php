<?php

namespace App\Traits;

trait ModelGetters
{
  public function getTitleAttribute()
  {
    return $this->name[app()->getLocale()];
  }
}
