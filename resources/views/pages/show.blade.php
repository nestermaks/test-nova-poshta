@extends('layout')

@section('content')

<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
  <div class="font-sans text-center">
    <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl mb-6">{{$page->title}}</h1>
    <div class="flex justify-center items-center">
      @foreach(config('app.locales') as $lang)
      <x-lang-button :active="$locale === $lang ? true : false">
        {{ $lang }}
      </x-lang-button>
      @endforeach
    </div>
    <x-select id="cities" :options="$cities">
      <slot>{{ __('main.select_city')}}</slot>
    </x-select>
    <x-select id="warehouses" :options="[]">
      <slot>{{ __('main.select_warehouse')}}</slot>
    </x-select>
    <input type="number" id="price" placeholder="{{ __('main.price') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
    <x-estimate />
    <button id="submit" type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-6 py-3 text-center mr-2 mb-2">{{ __('main.estimate')}}</button>
  </div>
</div>
@endsection
