<?php

namespace Database\Factories;

use App\Models\Postagem;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class PostagemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postagem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->title,
            'conteudo' => $this->faker->paragraph(5,true),
            'autor' => $this->faker->name,
            'fk_id_categoria' => rand(1,9),
            'fk_id_user' => rand(1,39)
        ];
    }
}
