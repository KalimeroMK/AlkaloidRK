<?php

    namespace Database\Factories;

    use App\Models\Post;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class PostFactory extends Factory
    {
        protected $model = Post::class;

        public function definition(): array
        {
            return [
                'slug'             => $this->faker->slug,
                'featured'         => $this->faker->randomNumber(),
                'type'             => $this->faker->word,
                'meta_description' => $this->faker->text,
                'views'            => $this->faker->randomNumber(),
                'status'           => 1,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'rating_desc'      => $this->faker->word,
                'author_id'        => 1,
            ];
        }
    }
