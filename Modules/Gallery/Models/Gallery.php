<?php

    namespace Modules\Gallery\Models;

    use App\Traits\ClearsResponseCache;
    use Database\Factories\GalleryFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Gallery
     *
     * @property int $id
     * @property int $post_id
     * @property string $image
     * @property int $priority
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static Builder|Gallery newModelQuery()
     * @method static Builder|Gallery newQuery()
     * @method static Builder|Gallery query()
     * @method static Builder|Gallery whereCreatedAt($value)
     * @method static Builder|Gallery whereId($value)
     * @method static Builder|Gallery whereImage($value)
     * @method static Builder|Gallery wherePostId($value)
     * @method static Builder|Gallery wherePriority($value)
     * @method static Builder|Gallery whereUpdatedAt($value)
     * @mixin Eloquent
     * @property-read mixed $gallery_url
     */
    class Gallery extends Model
    {
        use ClearsResponseCache;
        use HasFactory;

        protected $table = 'image_gallery';
        protected $fillable = ['post_id', 'image'];

        protected static function Factory(): GalleryFactory
        {
            return GalleryFactory::new();
        }

        public function getGalleryUrlAttribute($value): string
        {
            if ( ! empty($this->image)) {
                return asset('/uploads/images/gallery/'.$this->image);
            }

            return "no image";
        }
    }
