<?php

    namespace Modules\Post\Observers;

    use Illuminate\Support\Str;
    use Modules\Post\Models\Post;

    use function array_first;

    class PostObserver
    {
        /**
         * Handle the Post "created" event.
         *
         * @param  Post  $post
         *
         * @return void
         */
        public function creating(Post $post)
        {
            $post->slug = Str::slug(array_first((array)$post->title));
        }

        /**
         * Handle the Post "updated" event.
         *
         * @param  Post  $post
         *
         * @return void
         */
        public function updated(Post $post)
        {
            $post->slug = Str::slug(array_first((array)$post->title));
        }
    }
