<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::factory()->create([
            'name' => [
                'uk' => 'Тестове завдання з API Нової Пошти',
                'ru' => 'Тестовое задание по API Новой Почты'
            ],
            'slug' => 'home',
        ]);
    }
}
