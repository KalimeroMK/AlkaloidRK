<?php

    namespace Database\Factories;

    use App\Models\CategoryPost;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class CategoryPostFactory extends Factory
    {
        protected $model = CategoryPost::class;

        public function definition(): array
        {
            return [
                'category_id' => $this->faker->numberBetween(1, 6),
                'post_id'     => $this->faker->numberBetween(1, 500),

            ];
        }
    }
