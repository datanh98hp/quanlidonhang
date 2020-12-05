<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use database\seeders\ThiepcuoiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ThiepcuoiSeeder::class,
        ]);
        
    }
}
