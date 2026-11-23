<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Termwind\Components\Li;

class DatabaseSeeder extends Seeder
{
   public function run(): void
    {
        $this->call(UsuarioDemoSeeder::class, LibroSeeder::class);
    }
}
