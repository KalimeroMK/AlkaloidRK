<?php

    namespace Modules\Language\Models;

    use Database\Factories\LanguagePostFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class LanguagePost extends Model
    {
        use HasFactory;

        protected $table = 'language_post';
        protected $fillable = ['post_id', 'language_id', 'title', 'description'];

        protected static function Factory(): LanguagePostFactory
        {
            return LanguagePostFactory::new();
        }
    }
