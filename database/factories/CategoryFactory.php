<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;
    use Modules\Category\Models\Category;

    class CategoryFactory extends Factory
    {
        protected $model = Category::class;

        public function definition(): array
        {
            return [
                'title'      => $this->faker->word,
                'slug'       => $this->faker->slug,
                'publish'    => $this->faker->randomNumber(),
                'parent_id'  => $this->faker->randomNumber(),
                '_lft'       => $this->faker->randomNumber(),
                '_rgt'       => $this->faker->randomNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
    }
