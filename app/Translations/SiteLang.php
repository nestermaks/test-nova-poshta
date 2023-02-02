<?php

namespace App\Translations;

class SiteLang
{
  public function getLocale(): string
  {
    $locale = request()->segment(1);

    if (!self::isLocaleString($locale)) {
      $locale = config('app.fallback_locale');
    }

    return $locale;
  }

  public function isLocaleString(?string $string)
  {
    return !(strlen($string) > 2 or !in_array($string, config('app.locales')));
  }

  public function homeUrl(?string $locale = null)
  {
    if (!$locale) {
      $locale = app()->getLocale();
    }

    if ($locale === config('app.fallback_locale')) {
      return '/';
    }

    return '/' . $locale;
  }

  public function getLocaleString(?string $locale = null): string
  {
    $locale ?? $locale = app()->getLocale();

    if ($locale === config('app.fallback_locale')) {
      $locale = '';
    } else {
      $locale = '/' . $locale;
    }

    return $locale;
  }

  public function changeUrlLocale(string $locale): string
  {
    $current_url = request()->getRequestUri();

    if (app()->getLocale() === $locale) {
      return request()->url();
    }

    if ($this->isLocaleString(request()->segment(1))) {
      return config('app.url') . '/' . $locale . $current_url;
    }

    if ($locale === config('app.fallback_locale')) {
      return $this->removeMainLocaleSegment();
    }

    return $this->changeLocaleSegment($locale);
  }

  public function removeMainLocaleSegment(): string
  {
    $url_array = request()->segments();

    array_shift($url_array);

    if (!request()->segments(1)) {
      return config('app.url');
    }

    return config('app.url') . '/' . implode('/', $url_array);
  }

  public function changeLocaleSegment(string $locale): string
  {
    $url_array = request()->segments();

    $url_array[0] = $locale;

    return config('app.url') . '/' . implode('/', $url_array);
  }
}
