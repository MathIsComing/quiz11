<?php

namespace Database\Factories;

use Answers;
use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\Answer;

class AnswerFactory extends Factory
{

    protected $model = Answer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            "user_id"=>rand(1,10),
            "question_id"=>rand(1,100),
            "answer"=>"answer".rand(1,4)

        ];
    }
}
