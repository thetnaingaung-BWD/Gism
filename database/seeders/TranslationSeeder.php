<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('translations')->insert([
            [
                'key' => 'welcome',
                'title' => 'president',
                'section' => 'home',
                'translations' => json_encode(['en' => 'Welcome from the President', 'th' => 'การต้อนรับจากท่านประธาน','zh' => '总统欢迎辞']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
