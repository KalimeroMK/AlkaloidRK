<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class LanguagePost extends Model
    {
        use HasFactory;

        protected $table = 'language_post';
        protected $fillable = ['post_id', 'language_id', 'title', 'description'];
    }
