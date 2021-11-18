<?php

    namespace App\Models;

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Slider
     *
     * @method static Builder|Slider newModelQuery()
     * @method static Builder|Slider newQuery()
     * @method static Builder|Slider query()
     * @mixin Eloquent
     * @property int $id
     * @property string $featured_image
     * @property string $title
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read string|null $image_url
     * @method static Builder|Slider whereCreatedAt($value)
     * @method static Builder|Slider whereFeaturedImage($value)
     * @method static Builder|Slider whereId($value)
     * @method static Builder|Slider whereTitle($value)
     * @method static Builder|Slider whereUpdatedAt($value)
     * @property string|null $url
     * @method static Builder|Slider whereUrl($value)
     */
    class Slider extends Model
    {
        use HasFactory;

        protected $table = 'sliders';

        protected $fillable = ['title', 'featured_image', 'url'];

        /**
         * @return string|null
         */
        public function getImageUrlAttribute(): ?string
        {
            return asset('/uploads/images/slider/' . $this->featured_image);
        }

    }
