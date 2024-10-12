<?php

namespace Database\Factories;

//10/11トライ　
// use Faker\Generator as Faker;
// use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
//10/12トライ
use Faker\Generator as Faker;

//10/12トライ　use App\Models\Post;
// use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //10/12 トライのため、一時コメントアウト
    public function definition(): array
    {
        return [
            'title'=>fake()->text(20),
            'body'=>fake()->text(50),
            'user_id'=>\App\Models\User::factory(),
        ];

    // 10/12 トライするのも意味がなかった
    //     public function definition():array
    //     {
    //         return [
    //             'title' => $this->faker->text(20),
    //             'body' => $this->faker->text(50),
    //             'user_id' => \App\Models\User::factory(),
    //         ];
    //     }
    // }
    }
}
