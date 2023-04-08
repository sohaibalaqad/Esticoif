<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(2)->create();

        DB::table('user_types')->insert([
            'name' => ' مستخدم عادي',
        ]);
        DB::table('user_types')->insert([
            'name' => 'مزود خدمة',
        ]);
    }
}
