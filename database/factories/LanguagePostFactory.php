<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Modules\Language\Models\LanguagePost;

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
