<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;
    use Modules\Gallery\Models\Gallery;

    class GalleryFactory extends Factory
    {
        protected $model = Gallery::class;

        public function definition(): array
        {
            return [
                'post_id'    => $this->faker->numberBetween(1, 500),
                'image'      => $this->faker->imageUrl(1920),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
    }
