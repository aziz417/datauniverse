<?php

namespace Database\Seeders;

use App\Models\TermsOfUse;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TermsOfUseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TermsOfUse::factory()->count(1)->create();
    }
}
