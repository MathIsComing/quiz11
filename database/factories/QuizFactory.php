<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Quiz;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence(rand(3,7));
        return [
            "title"=>$title,
            "slug"=>Str::slug($title),
            "description"=>$this->faker->text(200)

        ];
    }
}
