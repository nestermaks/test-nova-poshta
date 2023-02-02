<?php

namespace App\Translations\Facades;

use Illuminate\Support\Facades\Facade;

class SiteLang extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'SiteLang';
  }
}
