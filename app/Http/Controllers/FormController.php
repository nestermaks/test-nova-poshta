<?php

namespace App\Http\Controllers;

use App\Services\FormService;
use Illuminate\Http\Request;

class FormController extends Controller
{
  public $form_service;

  public function __construct(FormService $form_service)
  {
    $this->form_service = $form_service;
  }

  public function warehouses(Request $request)
  {
    try {
      $this->form_service->getWarehouses($request);
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function estimate(Request $request)
  {
    try {
      return $this->form_service->getEstimatedString($request);
    } catch (\Exception $e) {
      return $e;
    }
  }
}
