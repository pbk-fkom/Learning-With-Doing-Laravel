<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::insert([
            [
                "nama" => "Dikri Fauzan Amrulloh",
                "foto" => "default.jpg",
                "pengampu" => "Pemrograman level 999",
                "classroom_id" => '1',
            ]
        ]);
    }
}
