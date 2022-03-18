<?php

    namespace Modules\Tag\Observers;

    use Illuminate\Support\Str;
    use Modules\Tag\Models\Tag;

    class TagObserver
    {
        /**
         * Handle the tag "created" event.
         *
         * @param  Tag  $tag
         */
        public function creating(Tag $tag)
        {
            $tag->slug = Str::slug($tag->title);
        }

        /**
         * Handle the tag "updated" event.
         *
         * @param  Tag  $tag
         */
        public function updated(Tag $tag)
        {
            $tag->slug = Str::slug($tag->title);
        }

        /**
         * Handle the tag "deleted" event.
         *
         * @param  Tag  $tag
         */
        public function deleted(Tag $tag)
        {
            //
        }

        /**
         * Handle the tag "restored" event.
         *
         * @param  Tag  $tag
         */
        public function restored(Tag $tag)
        {
            //
        }

        /**
         * Handle the tag "force deleted" event.
         *
         * @param  Tag  $tag
         */
        public function forceDeleted(Tag $tag)
        {
            //
        }
    }