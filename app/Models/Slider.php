<?php

    namespace App\Models;

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    /**
     * App\Models\Slider
     *
     * @method static Builder|Slider newModelQuery()
     * @method static Builder|Slider newQuery()
     * @method static Builder|Slider query()
     * @mixin Eloquent
     */
    class Slider extends Model
    {
        use HasFactory;

        protected $table = 'sliders';

        protected $fillable = ['title', 'featured_image'];

        /**
         * @return string|null
         */
        public function getImageUrlAttribute(): ?string
        {
            return asset('/uploads/images/slider/' . $this -> featured_image);
        }

    }
