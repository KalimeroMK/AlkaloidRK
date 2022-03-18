<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;
    use Modules\Post\Models\Post;
    use Modules\User\Models\User;

    class PostFactory extends Factory
    {
        protected $model = Post::class;

        public function definition(): array
        {
            return [
                'title'            => $this->faker->word(),
                'slug'             => $this->faker->slug(),
                'featured'         => $this->faker->numberBetween(1, 0),
                'type'             => $this->faker->word(),
                'meta_description' => $this->faker->text(),
                'featured_image'   => $this->faker->word(),
                'views'            => $this->faker->randomNumber(),
                'status'           => $this->faker->numberBetween(1, 0),
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'rating_desc'      => $this->faker->word(),

                'author_id' => User::factory(),
            ];
        }
    }
