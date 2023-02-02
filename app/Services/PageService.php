<?php

namespace App\Services;

use App\Models\City;
use App\Models\Page;
use Illuminate\Http\Request;

class PageService
{
  public function getPage(Request $request)
  {
    $slug = isset($request->slug) ? $request->slug : 'home';
    $page = Page::whereSlug($slug)->first();
    $cities = City::all()->mapWithKeys(function ($item, $key) {
      return [$item->ref => $item->title];
    })->toArray();

    return compact('page', 'cities');
  }
}
