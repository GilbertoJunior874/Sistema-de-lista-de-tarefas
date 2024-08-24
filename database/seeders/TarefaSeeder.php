<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarefa;
use Faker\Factory as Faker;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker=Faker::create();

        for($i = 0; $i<10; $i++){
            Tarefa::create([
                'name' => $faker->sentence,
                'status' => $faker->boolean
            ]);
        }


    }
}
