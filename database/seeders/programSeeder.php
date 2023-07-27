<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class programSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_names')->insert([
            'program_name'=>'Java',
            'slug_name'=>'java',
            'image'=>'1690011179.png',
        ]);
        DB::table('program_names')->insert([
            'program_name'=>'Python',
            'slug_name'=>'python',
            'image'=>'1690010220.png',
        ]);
        DB::table('program_names')->insert([
            'program_name'=>'C++',
            'slug_name'=>'c++',
            'image'=>'1690008760.png
            ',
        ]);
    }
}
