<?php

namespace Database\Seeders;

use App\Models\Introduction;
use App\Models\User;
use Illuminate\Database\Seeder;

class IntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = User::all()->first();
        if ($author) {
            Introduction::factory()
                ->create([
                    'author_id' => $author->id,
                ]);
        }
    }
}
