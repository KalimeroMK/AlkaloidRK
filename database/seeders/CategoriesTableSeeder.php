<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class CategoriesTableSeeder extends Seeder
    {

        /**
         * Auto generated seed file
         *
         * @return void
         */
        public function run()
        {
            DB::table('categories')->delete();

            DB::table('categories')->insert([
                0 =>
                    [
                        'id'         => 1,
                        'slug'       => 'team',
                        'title'      => 'EKIPA/TEAM',
                        'parent_id'  => null,
                        '_lft'       => 1,
                        '_rgt'       => 2,
                        'created_at' => null,
                        'updated_at' => null,
                    ],
                1 =>
                    [
                        'id'         => 2,
                        'slug'       => 'galleries',
                        'title'      => 'Галерија',
                        'parent_id'  => null,
                        '_lft'       => 1,
                        '_rgt'       => 2,
                        'created_at' => null,
                        'updated_at' => null,
                    ],
                2 =>
                    [
                        'id'         => 3,
                        'slug'       => 'рegruter',
                        'title'      => 'Регрутер',
                        'parent_id'  => null,
                        '_lft'       => 1,
                        '_rgt'       => 2,
                        'created_at' => null,
                        'updated_at' => null,
                    ],
                3 =>
                    [
                        'id'         => 4,
                        'slug'       => 'tv',
                        'title'      => 'TV',
                        'parent_id'  => null,
                        '_lft'       => 1,
                        '_rgt'       => 2,
                        'created_at' => null,
                        'updated_at' => null,
                    ],
                4 =>
                    [
                        'id'         => 5,
                        'slug'       => 'kl7',
                        'title'      => 'KL7',
                        'parent_id'  => null,
                        '_lft'       => 1,
                        '_rgt'       => 2,
                        'created_at' => null,
                        'updated_at' => null,
                    ],
                5 =>
                    [
                        'id'         => 6,
                        'slug'       => 'news',
                        'title'      => 'Vesti',
                        'parent_id'  => null,
                        '_lft'       => 1,
                        '_rgt'       => 2,
                        'created_at' => null,
                        'updated_at' => null,
                    ],
            ]);
        }
    }