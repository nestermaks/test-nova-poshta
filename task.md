# General description of the task:

## Goal

As an anonymous user, I want to be able to calculate the cost of shipping of Nova Poshta service on the website.

## Notes

Input and output of information should be done in Russian and Ukrainian languages with the ability to switch the current language on the page. All information on the page should be displayed in the selected language.

The Ukrainian language is enabled by default (the locale suffix is not displayed). When switching to Russian, the locale suffix /ru is added to the url (a redirect proceeds)

Desired sequence of actions on the page:

-   Select the name of a city
-   Select a warehouse in the selected city (if there are any for the specified one)
-   Specify the price of a package

When you click on the "Calculate cost" button, the following text is displayed in respective language:

“You have chosen: city - `{name_of_the_city}`, warehouse - `{name_of_the_warehouse}`. Shipping cost: `{calculated_cost}`.”

## Features of the implementation

### Client side elements

`<select>` to select a city

`<select>` to select a warehouse of the selected city (the list must match the selected city)

`<input>` to specify the cost of the package (integer)

`<button>` for cost calculation

The language selection to implement in any convenient way.

### Stack

PHP 8+, MySql 5.7+, Laravel 9, JS - optional.

## Expected implementation

1. Implement and execute a console command for parsing (get a list via the API) cities and warehouses of Nova Poshta with saving data to the database. Data saving should consider the multilingualism.

2. When parsing, add only the first 20 cities, from which exclude such ones as: "Abrikosovka", "Agaymany", "Agronomichnoye", "Adampol".

3. User data verification on the server side:

    - Shipping cost - integer

    - The selected cities and warehouses must be present in the sent data

4. The logic of a shipping cost calculating:

    - If the cost of the parcel is up to 1000 UAH. - formula: 50 UAH. + 50% of the cost of the parcel

    - If the cost is from 1000 UAH up to 3000 UAH - formula: 50 UAH + 30% of the cost of the parcel

    - If the cost of the parcel is 3000 UAH. and above - shipping price 0

## Specifications

Registration on Nova Poshta is not necessary, methods are public, POST.

### Links to the description of required Nova Poshta APIs

-   As an access key, we pass an empty string `"apiKey": ""`
-   Cities: https://developers.novaposhta.ua/view/model/a0cf0f5f-8512-11ec-8ced-005056b2dbe1/method/a1e6f0a7-8512-11ec-8ced-005056b2dbe1
-   Warehouses: https://developers.novaposhta.ua/view/model/a0cf0f5f-8512-11ec-8ced-005056b2dbe1/method/a2322f38-8512-11ec-8ced-005056b2dbe1

To work with data, use the built-in Laravel tools.

It is required to write a [readme.md](/README.md) that will allow the reviewer to execute a console command, run the project with a test task locally, and calculate the shipping cost.

## Order of checking

1. Pulling code from GitHub.

2. Following the instructions in readme.md to get the application up and running.

3. Running a console command to seed the database with a list of cities and warehouses.

4. Visiting the test page with the expected behavior from the General description of tasks block
