<?php

    namespace Database\Factories;

    use App\Models\LanguagePost;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class LanguagePostFactory extends Factory
    {
        protected $model = LanguagePost::class;

        public function definition(): array
        {
            return [
                'post_id'     => $this->faker->numberBetween(1, 500),
                'language_id' => $this->faker->numberBetween(1, 2),
                'title'       => $this->faker->title,
                'description' => $this->faker->text,

            ];
        }
    }
