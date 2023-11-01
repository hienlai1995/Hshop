<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            "id" => 1,
            "name" => "laithehien2@gmail.com",
            "password" => bcrypt("laithehien"),
            "create_at" => new DateTime(),
        ];
        DB::table("admins")->insert($data);
    }
}
