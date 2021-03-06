<?php

    namespace Modules\Tag\Models;

    use App\Traits\ClearsResponseCache;
    use Database\Factories\TagFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Support\Carbon;
    use Modules\Post\Models\Post;

    /**
     * App\Models\Tag
     *
     * @property int $id
     * @property string $title
     * @property string $slug
     * @property int $views
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read Collection|Post[] $posts
     * @property-read int|null $posts_count
     * @method static Builder|Tag newModelQuery()
     * @method static Builder|Tag newQuery()
     * @method static Builder|Tag query()
     * @method static Builder|Tag whereCreatedAt($value)
     * @method static Builder|Tag whereId($value)
     * @method static Builder|Tag whereSlug($value)
     * @method static Builder|Tag whereTitle($value)
     * @method static Builder|Tag whereUpdatedAt($value)
     * @method static Builder|Tag whereViews($value)
     * @mixin Eloquent
     */
    class Tag extends Model
    {
        use ClearsResponseCache;
        use HasFactory;

        protected $table = 'tags';
        protected $fillable = ['title', 'slug', 'views'];

        protected static function Factory(): TagFactory
        {
            return TagFactory::new();
        }

        public function posts(): BelongsToMany
        {
            return $this->belongsToMany(Post::class);
        }
    }
