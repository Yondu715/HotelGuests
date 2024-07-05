<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guests = [
            [
                'name' => "Максим",
                'surname' => 'Максимов',
                'phone' => '+79008001212',
                'email' => 'guest1@guest.ru',
                'country' => 'Россия'
            ],
            [
                'name' => "Сергей",
                'surname' => 'Сергеев',
                'phone' => '+79008005050',
                'email' => 'guest2@guest.ru',
                'country' => 'Россия'
            ],
            [
                'name' => "Олег",
                'surname' => 'Олегов',
                'phone' => '+79005551212',
                'email' => 'guest3@guest.ru',
                'country' => 'Россия'
            ]
        ];

        foreach ($guests as $guest) {
            Guest::query()->create($guest);
        }
    }
}
