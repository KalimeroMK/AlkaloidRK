<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Modules\Category\Models\CategoryPost;
    use Modules\Gallery\Models\Gallery;
    use Modules\Language\Models\LanguagePost;
    use Modules\Post\Models\Post;
    use Modules\Slider\Models\Slider;
    use Modules\Tag\Models\Tag;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Run the database seeders.
         *
         * @return void
         */
        public function run()
        {
            $this->call(AdminSeeder::class);
            Slider::factory()->count(3)->create();
            $this->call(LanguagesTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
            Tag::factory()->count(100)->create();
            Post::factory()->count(50)->create();
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            CategoryPost::factory()->count(500)->create();
            Gallery::factory()->count(5000)->create();
            LanguagePost::factory()->count(500)->create();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
