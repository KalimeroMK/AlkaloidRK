<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;
    use Modules\Tag\Models\Tag;

    class TagFactory extends Factory
    {
        protected $model = Tag::class;

        public function definition(): array
        {
            return [
                'title'      => $this->faker->word,
                'slug'       => $this->faker->slug,
                'views'      => $this->faker->randomNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
    }
