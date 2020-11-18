<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Jogo::factory(10)->create()->each(function($jogo){
            $jogo->forum()->save(\App\Models\Forum::factory()->make()); 
            
        });
    }
}
