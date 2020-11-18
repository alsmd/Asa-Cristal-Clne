<?php

namespace Database\Factories;

use App\Models\Jogo;
use Illuminate\Database\Eloquent\Factories\Factory;

class JogoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jogo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nome' => $this->faker->name,
            'slug' =>$this->faker->slug,
            'descricao' => 'Aqui vai Começar a sua Jornada',
            'foto'=> 'https://img.gamesow.com/image/2016/0308/1457436842.jpg'
        ];
    }
}
