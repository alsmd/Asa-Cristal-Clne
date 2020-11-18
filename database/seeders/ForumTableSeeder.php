<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ForumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $foruns = \App\Models\Forum::all();
        foreach($foruns as $forum){
            \App\Models\Postagem::factory(100)->make()->each(function($postagem)use($forum){
                $forum->postagens()->save($postagem);
            });

        }
    }
}
