<?php

	namespace Database\Seeders;

	use App\Models\Tag;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Seeder;

	class DatabaseSeeder extends Seeder {
		/**
		 * Run the database seeders.
		 *
		 * @return void
		 */
		public function run() {
			Model::unguard();
			$this->call( AdminSeeder::class );
//            Model::reguard();
			$this->call( LanguagesTableSeeder::class );
			$this->call( CategoriesTableSeeder::class );
			Tag::factory()->count( 100 )->create();
//            Post::factory()->count(500)->create();
//            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//            CategoryPost::factory()->count(5000)->create();
//            Gallery::factory()->count(5000)->create();
//            LanguagePost::factory()->count(500)->create();
//            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
	}
