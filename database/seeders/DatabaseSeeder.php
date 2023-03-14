<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccessCodeTypes;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('access_code_type')->insert([
            'id' => 1,
            'name' => 'Movil'
        ]);

        DB::table('access_code_type')->insert([
            'id' => 2,
            'name' => 'Web'
        ]);

    }
}
