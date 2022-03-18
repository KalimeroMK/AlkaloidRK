<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;
    use Modules\Slider\Models\Slider;

    class SliderFactory extends Factory
    {
        protected $model = Slider::class;

        public function definition(): array
        {
            return [
                'featured_image' => $this->faker->imageUrl(1920, 1208),
                'title'          => $this->faker->word(),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'url'            => $this->faker->url(),
            ];
        }
    }
