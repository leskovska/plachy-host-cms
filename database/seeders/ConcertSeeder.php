<?php

namespace Database\Seeders;

use App\Models\Concert;
use Illuminate\Database\Seeder;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concerts = Concert::factory()
            ->count(4)
            ->create();

        $concerts->each(function ($concert) {
            $concert->addMediaFromUrl('https://picsum.photos/200/300')
                    ->toMediaCollection('concerts');
        });
    }
}
