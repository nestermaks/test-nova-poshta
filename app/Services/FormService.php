<?php

namespace App\Services;

use App\Models\City;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormService
{
  public function getWarehouses(Request $request)
  {
    return City::whereRef($request->city)
      ->first()
      ->warehouses
      ->mapWithKeys(function ($item, $key) use ($request) {
        return [$item->ref => $item->name[$request->locale]];
      });
  }

  public function getEstimatedString(Request $request)
  {
    app()->setLocale($request->locale);

    if ($this->validateForm($request)->fails()) {
      return __('main.error');
    }

    $city = City::whereRef($request->city)->first()->title;
    $warehouse = Warehouse::whereRef($request->warehouse)->first()->title;
    $price = $this->countPrice($request->price);

    return __('main.estimate_result', [
      'city' => $city,
      'warehouse' => $warehouse,
      'price' => $price,
    ]);
  }

  public function validateForm(Request $request)
  {
    return Validator::make($request->all(), [
      'city' => ['required', 'not_in:none'],
      'warehouse' => ['required', 'not_in:none'],
      'price' => ['numeric', 'min:1', 'integer', 'max:1000000']
    ]);
  }

  protected function countPrice(int $price)
  {
    if ($price < 1000) {
      return 50 + ($price * 0.5);
    } elseif ($price < 3000) {
      return 50 + ($price * 0.3);
    } else {
      return 0;
    }
  }
}
