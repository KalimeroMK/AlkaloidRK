<?php

    namespace Modules\Category\Observers;

    use Illuminate\Support\Str;
    use Modules\Category\Models\Category;

    class CategoryObserver
    {
        /**
         * Handle the Category "created" event.
         *
         * @param  Category  $category
         *
         * @return void
         */
        public function creating(Category $category)
        {
            $category->slug = Str::slug($category->title);
        }

        /**
         * Handle the Category "updated" event.
         *
         * @param  Category  $category
         *
         * @return void
         */
        public function updating(Category $category)
        {
            $category->slug = Str::slug($category->title);
        }

        /**
         * Handle the Category "deleted" event.
         *
         * @param  Category  $category
         *
         * @return void
         */
        public function deleted(Category $category)
        {
            //
        }

        /**
         * Handle the Category "restored" event.
         *
         * @param  Category  $category
         *
         * @return void
         */
        public function restored(Category $category)
        {
            //
        }

        /**
         * Handle the Category "force deleted" event.
         *
         * @param  Category  $category
         *
         * @return void
         */
        public function forceDeleted(Category $category)
        {
            //
        }
    }
